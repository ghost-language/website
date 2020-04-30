---
title: Control Flow
date: 2020-04-29
slug: control-flow
---

Control flow is used to determine which blocks of code are executed and how many times. _Branching_ statements and expressions decide whether or not to execute some code and _looping_ ones execute something more than once.

## Truthiness

## Logical Operators
Unlike most other operators in Ghost which are just a special syntax for method calls, the `and` and `or` operators are special. This is because they only conditionally evaluate right operand--they short-circuit.

An `and` ("logical and") expression evaluates the left-hand argument. If it's false, it returns that value. Otherwise it evaluates and returns the right-hand argument.

```javascript
print(false and 1);
print(1 and 2);
```

An `or` ("logical or") expression is reversed. If the left-hand argument is _true_, it's returned, otherwise the right-hand argument is evaluated and returned:

```javascript
print(false or 1);
print(1 or 2);
```

## If Statements

## While Statements

## For Statements
