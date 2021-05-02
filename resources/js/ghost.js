if (!WebAssembly.instantiateStreaming) {
    WebAssembly.instantiateStreaming = async (response, importObject) => {
        const source = await (await response).arrayBuffer();

        return await WebAssembly.instantiate(source, importObject);
    };
}

const go = new Go();

WebAssembly.instantiateStreaming(fetch("/js/ghost.wasm"), go.importObject).then((result) => {
    go.run(result.instance);
});