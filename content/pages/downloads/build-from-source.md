Ghost is implemented in Go. It is very easy to build locally from source directly off of GitHub:

```
$  git clone git@github.com:ghost-language/ghost.git
$  cd ghost
$  make
```

Ghost comes shipped with a few make commands available for common build and test tasks:

- `make` -- Compiles and runs Ghost directly through Go
- `make build` -- Builds Ghost for macOS, Linux, WASM, and Windows
- `make build-mac` -- Builds Ghost for macOS
- `make build-linus` -- Builds Ghost for Linux
- `make build-wasm` -- Builds Ghost for WASM
- `make build-windows` -- Builds Ghost for Windows
- `make test` -- Runs all of Ghost's tests
- `make clean` -- Cleans the distribution directory