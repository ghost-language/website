---
title: Grammar and Types
---

# Grammar and Types

## Basics
Ghost borrows a lot of its syntax from other languages. Most notably from JavaScript, PHP, Python, and C.

Ghost uses the **Unicode** character set. For example, the word どうぶつ (which means "animal" in Japanese) could be used as a variable name.

```
let どうぶつ = 'dog';
```

Ghost is also case-sensitive, so the variable `Message` is not the same as `message`.

In Ghost, instructions are called statements and are separated by semicolons (`;`).

The source text of Ghost is scanned from left to right and is converted into a sequence of input elements which are tokens, comments, and whitespace.

## Comments
The syntax of comments is the same as in languages within the C family:

```
// This is an inline comment.

/**
 * This is a block comment.
 * 
 * It can span multiple lines.
 */
```

Comments behave like whitespace and are discarded during execution.

## Dynamically Typed
Ghost is dynamically typed. Variables can store values of any type, and a single variable can even store values of different types at different times.

## Variables
You use variables as symbolic names for values in your application. Variables are declared using the `let` statement. Once declared, variables may be naturally accessed and reassigned by referencing its name.

```
let answer = 3;

let favoriteColor = "black";
print favoriteColor; // "black"

answer = 42;
print answer; // 42
```

Variables must be explicitely declared with an initial value.

## Data Types
Ghost defines five data types:

### Booleans
This is the simplest data type by representing logic. A **boolean** expresses a truth value. It can either be `true` or `false`.

::: tip DID YOU KNOW
The term "boolean" comes from the name of one of the first Englishmen to write on logic, George Boole (November 2, 1815 -- December 8, 1864).

Boole was an English mathematician who helped establish modern symbolic logic and whose algebra on logic, now called Boolean algebra, is basic to the design of digital computer circuits.

[source](https://www.britannica.com/biography/George-Boole)
:::

To specify a **boolean**, use the literals `true` or `false`.

```
true
false
```

### Lists
A **List** is a simple collection of elements identified by an integer index.

To specify a **list**, place a sequence of comma-separated expressions inside square brackets.

```
["red", "orange", "yellow", "green", "blue", "indigo", "violet"]
```

### Maps
A **map** is an associative collection. It holds a set of entries, each of which maps a _key_ to a _value_.

To specify a **map**, place a series of comma-separated entries inside curly braces. Each entry is a key and a value separated by a colon.

```
{
    "name": "Motoko Kusenagi",
    "rank": "Major",
    "description": "Kusenagi is almost completely cyberized, except for part of her brain and spinal cord. Because of this, she has a reputation as an emotionless commander. However, she clings fiercely to what remains of her humanity and bases her self on her memories of life before the cyberbody.",
}
```

### Numbers
A number is a double-precision floating point.

To specify a number, simply specify the integer or float directly.

```
123   // Integer
3.14  // Float
```

### Strings
A string is an series of bytes. Strings may contain any byte value.

To specify a string, simply surround characters by double quotes.

```
"hello, world!"
```

## Arithmetic Operators
Ghost supports the following operators:

- Addition (`+`)
- Subtraction (`-`)
- Multiplication (`*`)
- Division (`/`)
- Modulo (`%`)
- Exponentiation (`^`)

## Bitwise Operators
Ghost supports the following bitwise operators:

- And (`and`)
- Or (`or`)
- Not (`not`)

These operators always result in a Boolean value, `true` or `false`.

## Relational Operators
Ghost supports the following relational operators:

- Equal (`==`)
- Inequality (`!=`)
- Less than (`<`)
- Greater than (`>`)
- Less than or equal (`<=`)
- Greater than or equal (`>=`)

These operators always result in a Boolean value, `true` or `false`.