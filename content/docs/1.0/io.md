---
title: IO
subtitle: Provides input and output facilities related to files.
category: Standard Library
order: 43
---

## Methods

### `io.append()`
Appends content to the specified file.

```typescript
io.append('./log.txt', 'message from ghost')
```

### `io.read()`
Reads and returns the contents of the specified file as a string.

```typescript
io.read('./log.txt')
```

### `io.write()`
Writes content to the specified file. This method completely overrides all content.

```typescript
io.write(content, './log.txt')
```