---
title: Errors
date: 2020-05-02
slug: errors
---

_I am error._ Any unexpected condition that Ghost encounters raises an error. Errors occur when you (that is, your program) try to add values that are not numbers, to call values that are not functions, to assign on undefined variables, and so on. You can also explicitely raise an error calling the `error` function; its argument is the error message, and is required.

```javascript
var n = "3";

if (n != 3) {
    error("'n' must be a number.");
}
```