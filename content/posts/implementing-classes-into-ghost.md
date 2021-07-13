---
title: Implementing Classes Into Ghost
slug: implementing-classes-into-ghost
date: 2021-07-08
summary: Classes make up the heart of Ghost's object-oriented programming system. In this post, we'll look at how we implemented the system into the virtual machine.
published: false
---

## Introduction
Ghost up the point of this writing, currently supports all the basics of both procedural and functional programming. With it, programmers could even "program" their own class system using maps:

```dart
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

```dart
class Greeter {
    function greet(name) {
        print("Hello, " + name + "!")
    }
}

greeter := Greeter.new()
greeter.greet("Kai")

// Hello, Kai!
```

So strap yourself in, because this is going to probably be the most in-depth post written on Ghost's internals as we walk through things, step-by-step.

## Overview
\# Thing's were going to cover (ast, lexer, objects, evaluation, etc.)

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
func (cl *ClassStatement) statementNode()      {}

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

```dart
class Dog {
    speak() {
        print "Wan!"
    }

    fetch(item) {
        print "> Runs and fetches " + item + " for you."
    }
}
```

We've already defined our class AST, so now all we have to do is update our parser to walk through and fill it out.