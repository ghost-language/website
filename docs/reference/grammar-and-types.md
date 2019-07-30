---
title: Grammar and Types
---

# Grammar and Types

## Basics
Ghost borrows a lot of its syntax from other languages. Most notably from JavaScript, PHP, Python, and C.

Ghost uses the **Unicode** character set. For example, the word どうぶつ (which means "animal" in Japanese) could be used as a variable name.

```
どうぶつ = 'dog';
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

## Variables
You use variables as symbolic names for values in your application.

```
answer = 42;
favoriteColor = "black";
pi = 3.14;
```

Variables must be explicitely declared with an initial value.

## Data Types
Ghost defines five data types:

- Arrays
- Booleans
- Numbers
- Objects
- Strings

### Arithmetic Operators
Ghost supports the following operators:

- Addition (`+`)
- Subtraction (`-`)
- Multiplication (`*`)
- Division (`/`)
- Modulo (`%`)
- Exponentiation (`^`)

### Bitwise Operators
Ghost supports the following bitwise operators:

- And (`and`)
- Or (`or`)
- Not (`not`)

These operators always result in a Boolean value, `true` or `false`.

### Relational Operators
Ghost supports the following relational operators:

- Equal (`==`)
- Inequality (`!=`)
- Less than (`<`)
- Greater than (`>`)
- Less than or equal (`<=`)
- Greater than or equal (`>=`)

These operators always result in a Boolean value, `true` or `false`.