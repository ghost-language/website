<template>
    <div class="divide-y divide-slate-200">
        <div class="pt-6 pb-8 space-y-2 md:space-y-5">
            <h1 class="text-3xl leading-9 font-extrabold text-slate-900 tracking-tight sm:leading-10 md:leading-14">
                Ghost by Example
            </h1>

            <p class="text-lg leading-7 text-slate-500">A hands-on introduction to Ghost using annotated example programs.</p>
        </div>

        <div class="min-w-0 w-full flex-auto">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 mt-10">
                <div v-for="example in examples" :key="example.slug" class="relative rounded-lg border border-slate-300 bg-white px-6 py-5 shadow-sm flex items-center space-x-3 hover:border-slate-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                    <div class="flex-1 min-w-0">
                        <NuxtLink :to="{ name: 'example-slug', params: { slug: example.slug } }" class="focus:outline-none">
                            <span class="absolute inset-0" aria-hidden="true"></span>
                            <p class="text-sm font-medium text-slate-900">
                                {{ example.title }}
                            </p>
                        </NuxtLink>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        async asyncData({ $content, params }) {
            let examples = await $content('examples', {
                deep: true,
            })
                .only(['title', 'slug', 'order'])
                .sortBy('order', 'asc')
                .where({ extension: '.md' })
                .fetch()

            return { examples }
        },
    }
</script>