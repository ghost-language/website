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