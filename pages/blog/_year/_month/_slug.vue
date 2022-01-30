<template>
    <article class="xl:divide-y xl:divide-slate-200">
        <header class="pt-6 xl:pb-10">
            <div class="space-y-1 text-center">
                <dl class="space-y-10">
                    <div>
                        <dt class="sr-only">Published on</dt>
                        <dd class="text-base leading-6 font-medium text-slate-500">{{ formatDate(post.date) }}</dd>
                    </div>
                </dl>

                <div>
                    <h1 class="text-3xl leading-9 font-extrabold text-slate-900 tracking-tight sm:text-4xl sm:leading-10 md:text-5xl md:leading-14">{{ post.title }}</h1>
                </div>
            </div>
        </header>

        <div class="divide-y xl:divide-y-0 divide-slate-200 xl:grid xl:grid-cols-4 xl:gap-x-6 pb-16 xl:pb-20" style="grid-template-rows: auto 1fr;">
            <dl class="pt-6 pb-10 xl:pt-11 xl:border-b xl:border-slate-200">
                <dt class="sr-only">Authors</dt>
                <dd>
                    <ul class="flex justify-center xl:block space-x-8 sm:space-x-12 xl:space-x-0 xl:space-y-8">
                        <li class="flex items-center space-x-2">
                            <img src="https://avatars.githubusercontent.com/u/355659?v=4" alt class="w-10 h-10 rounded-full border border-slate-200">
                            <dl class="text-sm font-medium leading-5 whitespace-no-wrap">
                                <dt class="sr-only">Name</dt>
                                <dd class="text-slate-900">Shea "Kai" Lewis</dd>
                                <dt class="sr-only">Twitter</dt>
                                <dd>
                                    <a href="https://twitter.com/kai___desu" class="text-indigo-500 hover:text-indigo-600">@kai___desu</a>
                                </dd>
                            </dl>
                        </li>
                    </ul>
                </dd>
            </dl>

            <div class="divide-y divide-slate-200 xl:pb-0 xl:col-span-3 xl:row-span-2">
                <div class="prose prose-slate max-w-none pb-8">
                    <Callout secondary v-if="post.isOutdated">
                        This post was originally written for {{ post.version }} and may not reflect the current state of Ghost anymore.
                    </Callout>

                    <NuxtContent :document="post" />
                </div>
            </div>

            <footer class="text-sm font-medium divide-y divide-slate-200 xl:col-start-1 xl:row-start-2 ">
                <div class="py-8" v-if="post.toc.length">
                    <h5 class="text-slate-900 uppercase tracking-wide font-semibold mb-3 text-sm lg:text-xs">On this page</h5>

                    <ul class="on-this-page overflow-x-hidden text-slate-500 font-medium list-none">
                        <li v-for="link of post.toc" :key="link.id">
                            <NuxtLink
                                :to="`#${link.id}`"
                                class="block transform transition-colors duration-200 py-2 hover:text-slate-900"
                                :class="{ 'py-2': link.depth === 2, 'ml-4 pb-2': link.depth === 3 }"
                            >
                                {{ link.text }}
                            </NuxtLink>
                        </li>
                    </ul>
                </div>

                <div class="space-y-8 py-8">
                    <!-- Next -->
                    <div v-if="next">
                        <h2 class="text-xs leading-5 tracking-wide uppercase text-slate-500">Next Post</h2>
                        <div class="text-indigo-600 hover:text-indigo-700">
                            <NuxtLink :to="{ name: 'blog-year-month-slug', params: { year: getYear(next), month: getMonth(next), slug: next.slug } }">{{ next.title }}</NuxtLink>
                        </div>
                    </div>

                    <!-- Previous -->
                    <div v-if="prev">
                        <h2 class="text-xs leading-5 tracking-wide uppercase text-slate-500">Previous Post</h2>
                        <div class="text-indigo-600 hover:text-indigo-700">
                            <NuxtLink :to="{ name: 'blog-year-month-slug', params: { year: getYear(prev), month: getMonth(prev), slug: prev.slug } }">{{ prev.title }}</NuxtLink>
                        </div>
                    </div>

                    <!-- Version -->
                    <div v-if="post.version">
                        <h2 class="text-xs leading-5 tracking-wide uppercase text-slate-500">Version</h2>
                        <div class="text-slate-600">
                            {{ post.version }}
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </article>
</template>

<script>
    import semver from 'semver'

    export default {
        async asyncData({ $content, $config, params }) {
            const post = await $content('posts', params.slug).fetch()

            post.isOutdated = false

            if (post.version) {
                post.isOutdated = !semver.satisfies(post.version.substring(1), $config.latestVersion.substring(1))
            }

            const [prev, next] = await $content('posts')
                .only(['title', 'slug', 'date', 'version'])
                .sortBy('date', 'asc')
                .surround(params.slug)
                .fetch()

            return { post, prev, next }
        },

        methods: {
            formatDate(date) {
                date = new Date(date)
                const month = new Intl.DateTimeFormat('en-US', { month: 'long' }).format(date)
                const weekDay = new Intl.DateTimeFormat('en-US', { weekday: 'long' }).format(date)
                const day = new Intl.DateTimeFormat('en-US', { day: 'numeric' }).format(date)
                const year = new Intl.DateTimeFormat('en-US', { year: 'numeric' }).format(date)
                return `${weekDay}, ${month} ${day}, ${year}`
            },

            getYear(post) {
                const date = new Date(post.date)
                return new Intl.DateTimeFormat('en-US', { year: 'numeric' }).format(date)
            },

            getMonth(post) {
                const date = new Date(post.date)
                return new Intl.DateTimeFormat('en-US', { month: '2-digit' }).format(date)
            }
        }
    }
</script>