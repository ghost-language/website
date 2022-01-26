<template>
    <div class="flex-1 h-full bg-red-100">
        <splitpanes horizontal>
            <pane>
                <splitpanes>
                    <pane key="editor">
                        <div class="flex h-full flex-col-reverse lg:flex-row">
                            <nav aria-label="sidebar" class="block flex-shrink-0 bg-gray-800 overflow-y-auto">
                                <div class="relative w-14 flex flex-col p-3 space-y-3">
                                    <a href="#" @click.prevent="run" class="text-gray-400 hover:bg-gray-700 hover:text-gray-100 flex-shrink-0 inline-flex items-center justify-center h-8 w-8 rounded-lg">
                                        <span class="sr-only">Archive</span>
                                        <!-- Heroicon name: outline/archive -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                </div>
                            </nav>

                            <monaco-editor class="w-full h-full" theme="vs-dark" v-model="code" language="dart"></monaco-editor>
                        </div>
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
                let {result, object} = ghost(this.code)

                this.result = result
            },
        }
    }
</script>