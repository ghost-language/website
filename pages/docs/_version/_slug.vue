<template>
    <div class="lg:flex">
        <TheSidebar />

        <div class="min-w-0 w-full flex-auto lg:max-h-full lg:overflow-visible">
            <div class="w-full flex">
                <div class="min-w-0 flex-auto px-4 sm:px-6 xl:px-8 pt-10 pb-24 lg:pb-16">
                    <div class="pb-10 border-b border-gray-200 mb-10">
                        <h1 class="inline-block text-3xl font-extrabold text-gray-900 tracking-tight">{{ page.title }}</h1>
                        <p class="pt-1 text-lg text-gray-500">
                            {{ page.subtitle }}
                        </p>
                    </div>

                    <div class="prose">
                        <NuxtContent :document="page"/>
                    </div>

                </div>

                <OnThisPage :document="page" />
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        async asyncData({ $content, params }) {
            const page = await $content('docs', params.version, params.slug).fetch()

            return { page }
        },
    }
</script>TheSidebar