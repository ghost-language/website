---
title: Strings
subtitle: Represents a sequence of unicode characters.
category: Standard Objects
order: 34
---

Strings are useful for holding data that can be represented in text form.

## Creating Strings

Strings are created using either single or double quotes.

```typescript
string1 = "A string value"
string2 = "This is also a string value"
```

## Comparing Strings

Strings can be compared against each other using the `==` operator. This will compare strings in a case-sensitive manner.

```typescript
string1 = "a"
string2 = "b"

// false
result = string1 == string2
```

## Long Strings

Sometimes, your code will include strings which are very long. Rather than having lines that go on endlessly, or wrap at the whim of your editor, you may wish to specifically break the string into multiple lines in the source code without affecting the actual string contents.

You can achieve this using the `+` operator to append multiple strings together, like this:

```
longString = "This is a very long string which needs " +
              "to wrap across multiple lines because " +
              "otherwise the code will be unreadable."
```

## Methods

### `find()`

The `find()` method retrieves the result of matching a _string_ against a regular expression.

```typescript
pattern = "I need (.*)"
input = "I need coffee"

found = pattern.find(input)

// expected output: ["coffee"]
```

### `format()`

The `format()` method formats according to a format specifier and returns the resulting string.

```typescript
name = "Soma"
age = 3

message = "%s is %s years old.".format(name, age)

// expected value: "Soma is 3 years old."
```

| Formatter | Description |
|-----------|-------------|
| `%s` | a string value |

### `endsWith()`

The `endsWith()` method determines if the given string ends with the given value.

```typescript
result = "This is my name".endsWith("name")

// expected value: true
```

### `length()`

The `length()` method returns the length of the given string.

```typescript
length = "Ghost".length()

// expected value: 5
```

### `replace()`

The `replace()` method replaces a given string within the string.

```typescript
replaced = "Ghost 0.x".replace("0.x", "1.x")

// expected value: "Ghost 1.x"
```

### `split()`

The `split()` method splits a string into a list by the given delimiter.

```typescript
segments = "one, two, three".split(", ")

// expected value: ["one", "two", "three"]
```

### `startsWith()`

The `startsWith()` method determines if the given string begins wih the given value.

```typescript
result = "This is my name".startsWith("This")

// expected value: true
```

### `toLowerCase()`

The `toLowerCase()` method converts the given string to lowercase.

```typescript
value = "GHOST".toLowerCase()

// expected value: "ghost"
```

### `toUpperCase()`

The `toUpperCase()` method converts the given string to uppercase.

```typescript
value = "ghost".toUpperCase()

// expected value: "GHOST"
```

### `toString()`

The `toString()` method converts the given string to a string. May seem redundant in this instance but this method can be reliably called regardless of the type of value.

```typescript
value = "Ghost".toString()

// expected value: "Ghost"
```

### `toNumber()`

The `toNumber()` method converts the given string to a number if valid.

```typescript
value = "3.14"

// expected value: 3.14
```

### `trim()`

The `trim()` method trims the given string.

```typescript
value = "  Ghost  ".trim()

// expected value: "Ghost"
```

### `trimEnd()`

The `trimEnd()` method trims the end of the given string.

```typescript
value = "  Ghost  ".trimEnd()

// expected value: "  Ghost"
```

### `trimStart()`

The `trimStart()` method trims the start of the given string.

```typescript
value = "  Ghost  ".trimStart()

// expected value: "Ghost  "
```