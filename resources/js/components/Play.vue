<template>
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
        <div class="space-y-3">
            <textarea ref="editor" v-model="code" rows="14" class="shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md p-4 font-mono"></textarea>

            <button @click.prevent="run" type="button" class="inline-flex items-center px-3 py-2 border border-transparent shadow-sm text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <!-- Heroicon name: solid/mail -->
                <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 -ml-0.5 h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>

                Run
            </button>
        </div>

        <div class="bg-gray-900 font-mono p-3 text-gray-100 w-full rounded-md" v-html="result"></div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                code: `function reverseString(str) {
    reversed := []

    for (i := str.length() - 1; i >= 0; i := i - 1) {
        reversed.push(str[i])
    }

    return reversed.join('')
}

print(reverseString("abc"))
print(reverseString("hello world"))`,
                result: '',
            }
        },

        methods: {
            run() {
                console.log('running...' + this.code)
                let {out, result} = ghost_run_code(this.code)

                this.result = out
            }
        }
    }
</script>