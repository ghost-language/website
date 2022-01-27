<template>
    <div class="divide-y divide-slate-200">
        <div class="pt-6 pb-8 space-y-2 md:space-y-5">
            <h1 class="text-3xl leading-9 font-extrabold text-slate-900 tracking-tight sm:leading-10 md:leading-14">
                Example: {{ page.title }}
            </h1>
        </div>

        <div class="min-w-0 w-full flex-auto">
            <article class="prose prose-slate">
                <NuxtContent :document="page" />
            </article>

            <div class="divide-y xl:divide-y-0 divide-slate-200 xl:grid xl:grid-cols-4 xl:gap-x-6 pb-16 xl:pb-20" style="grid-template-rows: auto 1fr;">
                <div class="divide-y divide-slate-200 xl:pb-0 xl:col-span-3 xl:row-span-2">
                    <div class="max-w-none pb-8">
                        <div class="prose prose-slate">
                            <NuxtContent :document="page" />
                        </div>

                        <div class="w-full mt-6">
                            <table class="overflow-hidden mx-auto">
                                <tr v-for="example, index in example.body" :key="index">
                                    <td class="p-6 [width:420px] align-top" v-html="example.comment"></td>
                                    <td class="p-6 text-slate-900 font-mono [width:480px] align-top" :class="{ 'bg-slate-100': example.code !== '' }"><pre v-html="example.code"></pre></td>
                                </tr>
                            </table>
                        </div>

                        <div class="w-full mt-6">
                            <table class="overflow-hidden mx-auto">
                                <tr v-for="execute, index in execute.body" :key="index">
                                    <td class="p-6 [width:420px] align-top" v-html="execute.comment"></td>
                                    <td class="p-6 text-slate-900 font-mono [width:480px] align-top" :class="{ 'bg-slate-100': execute.code !== '' }"><pre v-html="execute.code"></pre></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <footer class="text-sm font-medium divide-y divide-slate-200 xl:col-start-1 xl:row-start-2 ">
                    <div class="space-y-8 py-8">
                        <!-- Next -->
                        <div v-if="next">
                            <h2 class="text-xs leading-5 tracking-wide uppercase text-slate-500">Next Example</h2>
                            <div class="text-indigo-600 hover:text-indigo-700">
                                <NuxtLink :to="{ name: 'example-slug', params: { slug: next.slug } }">{{ next.title }}</NuxtLink>
                            </div>
                        </div>

                        <!-- Previous -->
                        <div v-if="prev">
                            <h2 class="text-xs leading-5 tracking-wide uppercase text-slate-500">Previous Example</h2>
                            <div class="text-indigo-600 hover:text-indigo-700">
                                <NuxtLink :to="{ name: 'example-slug', params: { slug: prev.slug } }">{{ prev.title }}</NuxtLink>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        async asyncData({ $content, params }) {
            const page = await $content('examples', params.slug, 'index').fetch()
            const example = await $content('examples', params.slug, 'example').fetch()
            const execute = await $content('examples', params.slug, 'execute').fetch()

            const [prev, next] = await $content('examples', {
                deep: true,
            })
                .only(['title', 'slug', 'order'])
                .sortBy('order', 'asc')
                .where({ extension: '.md' })
                .surround(params.slug)
                .fetch()

            return { page, example, execute, prev, next }
        },
    }
</script>