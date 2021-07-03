<template>
    <div class="prism">
        <pre class="line-numbers relative mx-auto language-javascript rounded shadow text-sm" :class="`language-${lang}`"><code><slot></slot></code></pre>
    </div>
</template>

<script>
    import 'clipboard'
    import Prism from 'prismjs'
    // import 'prism-themes/themes/prism-material-oceanic.css'
    import 'prismjs/components/prism-dart'
    import 'prismjs/plugins/copy-to-clipboard/prism-copy-to-clipboard'

    export default {
        props: {
            lang: {
                type: String,
                default: 'dart'
            },
        },

        mounted() {
            Prism.highlightAll()
        }
    }
</script>
