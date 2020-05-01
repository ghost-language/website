---
title: Functions
date: 2020-04-30
slug: functions
---

Like Lua, functions are first-class values in Ghost. That means that functions can be stored in variables, passed as arguments to other functions, and returned as results. This gives great flexibility to the language.

Since Ghost is an object-oriented programming language, most of your code will live in methods on classes, but functional programming is also supported, including nested functions with proper lexical scoping.

## Defining Functions
You define functions using the `function` statement, followed by a list of parameters, and a body:

```javascript
function printSum(a, b) {
    print(a + b);
}
```

The body of a function is always a block. Inside it, you can return a value using a `return` statement.

```javascript
function returnSum(a, b) {
    return a + b;
}
```

If execution reaches the end of the block without hitting a `return`, it implicitly returns `nil`.

## Calling Functions
Once you have a function, calling it is as simple as passing the required parameters along with the function name:

```javascript
let value = returnSum(1, 2);
```

The assigned value is the result of the functions `return` statement. As mentioned earlier, if no `return` statement is found within the function, a value of `nil` will be returned implicitly.