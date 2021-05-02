const go = new Go();

WebAssembly.instantiateStreaming(fetch("/js/ghost.wasm"), go.importObject).then((result) => {
    go.run(result.instance);
});