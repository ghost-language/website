<script>
    export default {
        async asyncData(context) {
            context.redirect(`/docs/${context.$config.defaultVersion}/getting-started`)

            return {}
        }
    }
</script>
