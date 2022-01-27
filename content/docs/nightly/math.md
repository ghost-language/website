---
title: Math
subtitle: Learn how to get Ghost up and running on your local machine.
category: Standard Library
order: 46
---

This library provides basic mathematical functions.

## math.abs

Returns the absolute, or non-negative value, of a given value.

```typescript
>>> math.abs(-100);
100
```

## math.acos

Returns the inverse cosine in radians of the given value.

```typescript
>>> math.acos(1);
0
>>> math.acos(0);
1.5708
```

## math.asin

Returns the inverse sine in radians of the given value.

```typescript
>>> math.asin(0);
0
>>> math.asin(1);
90
```

## math.atan

Returns the inverse tangent in radians.

```typescript
>>> var c = math.cos(0.8);
>>> var s = math.cos(0.8);
>>> math.atan(s/c);
45
```

## math.ceil

Returns the integer no greater than the given value (even for negatives).

```typescript
>>> math.ceil(0.5);
1
>>> math.ceil(-0.5);
-0
```

## math.cos

Return the cosine value for the given value in radians.

```typescript
>>> math.cos(math.pi() / 4);
0.999906
```

## math.floor

Returns the integer no less than the given value (even for negatives).

```typescript
>>> math.floor(0.5);
0
>>> math.floor(-0.5);
-1
```

## math.max

Return the maximum value from a variable length list of arguments.

```typescript
>>> math.max(1.2, -7, 3);
3
>>> math.max(1.2, 7, 3);
7
```

## math.pi

Returns a part of the constant Pi.

```typescript
>>> math.pi();
3.14159
```
