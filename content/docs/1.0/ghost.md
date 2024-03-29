---
title: Ghost
subtitle: Provides access to the Ghost runtime.
category: Standard Library
order: 41
---

## Methods

### `ghost.abort()`

Creates a new runtime error and outputs the specified message. If the passed value is `null` no runtime error is generated.

```typescript
ghost.abort("A critical error was encountered. Aborting.")

// expected output: A critical error was encountered. Aborting.
```

### `ghost.execute()`

Executes Ghost code represented as a string. The string representation can include variables and properties of existing objects.

```typescript
print(ghost.execute('2 + 2'))

// expected output: 4
```

### `ghost.extend()`

Registers and executes a plugin compiled through Go, allowing the ability to dynamically extend Ghost with new native functionality. Plugins must be compiled against both the exact version of Ghost, and the version of Go used to compile Ghost.

| Ghost Version | Go Version |
|---------------|------------|
| `1.0-beta.1`  | `1.17.5`   |

To compile a plugin with Go, use the `-buildmode=plugin` build flag:

```
$ go build -buildmode=plugin -o example.so main.go
```

```typescript
ghost.extend('./example.so')
```

### `ghost.identifiers()`

Returns a list of all identifieris within the current scope.

```typescript
ghost.identifiers()
```

## Properties

### `ghost.version`

Returns the current version of Ghost.

```typescript
ghost.version
```