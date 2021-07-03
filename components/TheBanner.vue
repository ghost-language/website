<template>
    <div class="h-12 bg-gray-800 text-white text-xs flex items-center leading-none font-semibold font-mono border-t-4 border-indigo-500">
        <div class="mx-auto max-w-7xl w-full flex flex-row-reverse justify-between items-center px-6 leading-none">
            {{ latestVersion }}
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                latestVersion: this.$config.latestVersion,
            }
        },
    }
</script>