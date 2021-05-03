<template>
    <div class="flex-1 h-full bg-red-100">
        <splitpanes horizontal>
            <pane>
                <splitpanes>
                    <pane key="editor">
                        <div class="flex items-center flex-none pl-5 pr-4 sm:pl-6 absolyte z-10 top-0 left-0 py-3 bg-gray-800 text-gray-100 border-b border-gray-700">
                            <div class="flex space-x-5">
                                <button @click.prevent="run" type="button" class="flex items-center text-sm font-medium focus:outline-none text-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-1 -ml-0.5 h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>

                                    Run
                                </button>
                            </div>
                        </div>

                        <textarea ref="editor" v-model="code" rows="14" class="block w-full h-full sm:text-sm p-4 font-mono bg-gray-800 border-0 text-gray-300 focus:outline-none focus:ring-0 ring-transparent" style="resize: none;"></textarea>
                    </pane>

                    <pane key="results" v-if="!isMobile">
                        <pre class="bg-gray-900 font-mono p-3 text-gray-100 w-full h-full" v-html="result"></pre>
                    </pane>
                </splitpanes>
            </pane>

            <pane key="results" v-if="isMobile">
                <pre class="bg-gray-900 font-mono p-3 text-gray-100 w-full h-full" v-html="result"></pre>
            </pane>
        </splitpanes>
    </div>
</template>

<script>
    import { Splitpanes, Pane } from 'splitpanes'
    import 'splitpanes/dist/splitpanes.css'
    import { debounce } from 'lodash'

    export default {
        mounted() {
            let vm = this
            debounce(function() {
                vm.run()
            }, 150)()
        },

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

        components: {
            Splitpanes,
            Pane,
        },

        computed: {
            isMobile() {
                return (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent))
            },
        },

        methods: {
            run() {
                let {out, result} = ghost_run_code(this.code)

                this.result = out
            },
        }
    }
</script>