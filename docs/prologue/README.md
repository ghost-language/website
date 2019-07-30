---
title: Introduction
---

# Introduction
Ghost is a cross-platform, object-oriented programming language with an emphasis on clean and legible syntax. Ghost is a general programming language, with a simple and compact design.

The goal for the underlying interpretor and compiler is to write it in C, striking a balance in speed and performance while maintaining legibility and ease of use. The first version of Ghost, to be able to interact with and experiment with the design of the language, will be written in PHP. It will be a simple interpretor, and slower than its C counter-part that will come in later down the road.

## Guiding Principals
The goals of the language boil down to a few key principals. Each of which I'll go into detail.

### Readability
Ghost takes readability to the next level. It favors being explicit with its terminology versus using shortened forms for the sake of "saving" time and space. Let's look at a few examples:

- `function` vs. `fn`
- `print` vs. `println`
- `integer` vs. `int`
- `string` vs. `str`

Basically take the readability of Python and combine it with the syntax structure of C, and you get Ghost.

### General Purpose
Ghost is a truly general purpose programming language. With a solid set of standard libraries, it can be expanded to cover a variety of fields such as machine learning, game development, and web development; just to name a few.

### Performance
While Ghost is in its early stages of design and development, it will be ran off of an interpretor written in PHP. Once the language has matured and materialized into its "final" stable form, development will be shifted to writing a compiler in C to bootstrap Ghost. Using C will allow Ghost to run closer to metal and squeeze much more out of its resources than a simple interpretor would.