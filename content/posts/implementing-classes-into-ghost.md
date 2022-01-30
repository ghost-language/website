---
title: Implementing Classes Into Ghost
date: 2021-07-08
summary: Classes make up the heart of Ghost's object-oriented programming system. In this post, we'll look at how we implemented the system into the virtual machine.
published: false
version: v0.0.16
---

## Introduction

Ghost up the point of this writing (v0.16.0), currently supports all the basics of both procedural and functional programming. With it, programmers could even "program" their own class system using maps:

```typescript
function Greeter() {
    this := {}

    this.greet := function(name) {
        print("Hello, " + name + "!")
    }

    return this
}

greeter := Greeter()
greeter.greet("Kai")

// Hello, Kai!
```

But, this is just not good enough. As programmers, we are creatures of comfort, and most of us are all to familiar with class object-oriented systems through other languages like PHP, Ruby, Python, and JavaScript. Instead, this would be much easier to work with and maintain:

```typescript
class Greeter {
    greet(name) {
        print("Hello, " + name + "!")
    }
}

greeter := Greeter()
greeter.greet("Kai")

// Hello, Kai!
```

So strap yourself in, because this is going to probably be the most in-depth post written on Ghost's internals as we walk through things, step-by-step.

## Overview

Much like our previous blog post on [implementing a range operator](/blog/2020/10/implementing-a-range-operator-into-ghost), we'll be touching on a lot of the core inner workings of how our code goes from raw text to executable code:

- **Updating our available tokens:** We will be registering a new `class` token, used as a keyword to declare a new class.
- **Updating the AST:** The **A**bstract **S**yntax **T**ree (AST) builds a representation of our code that is easier to parse and work with later on in our evaluation step. We will need to create a new syntax for our new `class` structure.
- **Updating our available objects:** Once we've declared a class, we're able to create any number of instances of the class and store it under a new identifier. We need a new object to properly work with and pass our class instance around our code.
- **Updating the parser:**
- **Updating the evaluator:**
- **Writing tests:**

## Internal Representation

The first step to implementing classes into Ghost is to define the representation of them. We will be doing this by adding our **token**, updating the **AST**, and adding a new **object** to represent our classes.

### Token

Within the `token/token.go` file, we want to update our list of keywords to include our new `class` syntax. First up are the list of all tokens within the main `const`:

```go
// token/token.go

// The list of tokens.
const (
    ...
    IMPORT   = "IMPORT"
    CLASS    = "CLASS"
    ...
```

Next up, we need to add `class` to our list of keywords:

```go
// token/token.go

var keywords = map[string]TokenType{
    ...
    "class":    CLASS,
}
```

And with that, we've registered our `class` token with the scanner! To cap things off here, we'll update the lexer tests to ensure it properly returns a `CLASS` token:

```go
// lexer/lexer_test.go

func TestNextToken(t *testing.T) {
    input := `five := 5;
    ...
    class
    `

    tests := []struct {
        expectedType    token.TokenType
        expectedLiteral string
    }{
        ...
        {token.CLASS, "class", 54},
        {token.EOF, ""},
    }
    ...
```

### AST

Once we have our tokens in place, it's time to build the abstract syntax of our `class` statement. For starters, our classes will consist of a `name` and list of `methods`:

```go
// ast/ast.go

...
ClassStatement struct {
    Token      token.Token
    Name       string
    Methods    map[string]FunctionLiteral
}

...
func (cs *ClassStatement) statementNode()      {}

...
func (cs *ClassStatement) TokenLiteral() string {
    return cs.Token.Literal
}

...
func (cs *ClassStatement) String() string {
	var out bytes.Buffer

	out.WriteString("class ")
	out.WriteString(cs.Name)
	out.WriteString(" {\n")
	out.WriteString("\n}")

	return out.String()
}
```

### Object

Finally, we need a new class object that we can pass around our evaluator.

```go
// object/object.go

...

// ----------------------------------------------------------------------------
// Constants
const (
    ...
	CLASS_OBJ        = "CLASS"
)

...

// ----------------------------------------------------------------------------
// Interfaces

...

Class struct {
    Env *Environment
}

...

// ----------------------------------------------------------------------------
// Types

...

func (c *Class) Type() ObjectType		 { return CLASS_OBJ }

...

// ----------------------------------------------------------------------------
// Inspections

...

func (c *Class) Inspect() string {
	var out bytes.Buffer

	out.WriteString("class {\n")
	out.WriteString("}\n")

	return out.String()
}
```

## Class Declarations

Now that we have our internal representation defined, we can move on to building our class declarations. Much like functions in Ghost, a class declaration is the `class` keyword, followed by it's name, then a curly-braced body.

```typescript
class Dog {
    speak() {
        print "Wan!"
    }

    fetch(item) {
        print "> Runs and fetches " + item + " for you."
    }
}
```

We've already defined our class AST, so now all we have to do is update our parser to walk through and fill it out. To start, we need to register a new `prefix` rule so our parser knows how to handle the new `class` token we created earlier.

```go
// parser/parser.go

func New(l *lexer.Lexer) *Parser {
    ...

    p.registerPrefix(token.CLASS, p.parseClassLiteral)
    ...
}
```

To keep things tidy within our codebase, we're going to create a new `parser/class.go` file to hold everything we need to properly parse classes. Inside there, we will create our `parseClassLiteral` method:

```go
// parser/class.go

package parser

import (
	"ghostlang.org/x/ghost/ast"
	"ghostlang.org/x/ghost/token"
)

func (p *Parser) parseClassLiteral() ast.Expression {
    class := &ast.ClassLiteral{Token: p.currentToken}

	p.nextToken()

	class.Name = p.currentToken.Literal

	if !p.expectPeek(token.LBRACE) {
		return nil
	}

	class = p.parseClassBlock(class)

	return class
}
```

At this stage this is nearly identical to how we parse Function literals:

1. Bootstrap our class AST
2. Consume the `class` token
3. Grab the name of our class and store it
4. Check that we have an opening curly brace, and consume it
5. Pass our class into a magical `parseClassBlock` method - we'll go over this next
6. Return our built `class` AST instance

## Creating Instances

Nice! We can now declare classes in our code. Albiet, our classes can't store anything useful, but it's still a step in the right direction. Right now if we try creating a new instance, we get an error:

```typescript
class Dog {}

soma := Dog()
```

```
RUNTIME ERROR: not a function: CLASS on line 3
```

This is because Ghost is attempting to evaluate `Dog()` as a _function_ call expression. We'll need to update how Ghost handles call expressions to support classes now as well. This is handled by the `ApplyFunction` method within the evaluator. You'll find that it too is also a simple switch statement. So we'll add a new case for our new class object and have it return a new class _instance_:

```go
func applyFunction(tok token.Token, fn object.Object, env *object.Environment, arguments []object.Object) object.Object {
    switch fn := fn.(type) {
    ...
    case *object.Class:
		instance := &object.Instance{Class: fn}

		return instance
    }
}
```

This leads us to a new object, `object.Instance`. Instances are the runtime representation of our class. We'll create our new object within `object/instance.go`:

```go
package object

import (
	"bytes"
	"fmt"
)

const INSTANCE_OBJ = "INSTANCE"

type Instance struct {
	Class *Class
}

func (c *Instance) Type() ObjectType {
	return INSTANCE_OBJ
}

func (i *Instance) Inspect() string {
	var out bytes.Buffer

	out.WriteString(i.Class.Name + " instance {}\n")

	return out.String()
}

func (i *Instance) CallMethod(method string, args []Object) Object {
	switch method {
	case "toString":
		return &String{Value: i.Inspect()}
	}

	return &Error{Message: fmt.Sprintf(NoMethodFound, method, i.Type())}
}
```

We're going to keep instances simple for now; only containing a reference to the class object. We'll expand on this further once we get to properties and methods. With this though, our program no longer errors out and we have an empty class instance good to go!

```typescript
class Dog {}
soma := Dog()
print(soma)    // Dog instance {}
```

## Properties

...

## Methods

...

## This

...

## Constructors

...
