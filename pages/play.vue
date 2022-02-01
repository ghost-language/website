<template>
    <div class="divide-y divide-slate-200">
        <div class="pt-6 pb-8 space-y-2 md:space-y-5">
            <h1 class="text-3xl leading-9 font-extrabold text-slate-900 tracking-tight sm:leading-10 md:leading-14">
                Playground
            </h1>

            <div class="space-y-8 divide-y divide-gray-200">
                <div>
                    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                        <div class="sm:col-span-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">
                                Description
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input type="text" name="description" id="description" class="flex-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full min-w-0 rounded-md sm:text-sm border-gray-300" v-model="description">
                            </div>
                        </div>

                        <div class="sm:col-span-6">
                            <div class="mt-1">
                                <textarea id="code" name="code" v-model="code" rows="15" class="shadow-sm font-mono text-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full border border-gray-300 rounded-md"></textarea>
                            </div>
                        </div>

                        <div class="sm:col-span-6">

                        </div>
                    </div>

                    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-12">
                        <div class="sm:col-span-6">
                            <label for="description" class="block text-sm font-medium text-gray-700">
                                Result
                            </label>
                            <div class="mt-1">
                                <textarea id="result" name="result" rows="5" readonly class="shadow-sm font-mono text-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full border border-gray-300 rounded-md bg-slate-800 text-gray-200" v-model="result"></textarea>
                            </div>
                        </div>

                        <div class="sm:col-span-6">
                            <label for="description" class="block text-sm font-medium text-gray-700">
                                Object
                            </label>
                            <div class="mt-1">
                                <textarea id="object" name="object" rows="5" readonly class="shadow-sm font-mono text-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full border border-gray-300 rounded-md bg-slate-800 text-gray-200" v-model="object"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-5">
            <div class="flex">
                <button type="submit" class="mr-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" @click.prevent="run">
                    Run
                </button>

                <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" @click.prevent="share">
                    Share
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data() {
            const params = this.$route.query
            const share = params["share"]
            const data = {
                code: '',
                description: '',
                result: '',
                object: '',
            }

            if (share) {
                const value = JSON.parse(Buffer.from(share, 'base64').toString())

                data.code = value.code
                data.description = value.description
            }

            return data
        },

        head() {
            return {
                script: [
                    {
                        src: '/js/wasm_exec.js'
                    }
                ]
            }
        },

        methods: {
            run() {
                if (!go) {
                    go = new Go()

                    fetchWasmModule()
                }

                let { result, object } = ghost(this.code || 'null')

                this.result = result
                this.object = object
            },

            share() {
                const encoded = btoa(JSON.stringify({ description: this.description, code: this.code }))

                window.history.pushState({}, "", `?share=${encodeURIComponent(encoded)}`)
            },
        },

        mounted() {
            go = new Go()

            fetchWasmModule()
        },

    }

    let instance, go

    async function fetchWasmModule() {
        const response = await fetch("/js/ghost.wasm")
        const buffer = await response.arrayBuffer()
        const obj = await WebAssembly.instantiate(buffer, go.importObject)

        instance = obj.instance

        await go.run(instance)
    }
</script>