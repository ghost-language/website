<template>
    <div class="divide-y divide-slate-200">
        <div class="pt-6 pb-8 space-y-2 md:space-y-5">
            <h1 class="text-3xl leading-9 font-extrabold text-slate-900 tracking-tight sm:leading-10 md:leading-14">
                Blog
            </h1>

            <p class="text-lg leading-7 text-slate-500">All the latest Ghost news and deep dives, straight from the team.</p>
        </div>

        <ul class="divide-y divide-slate-200">
            <li v-for="post in posts" :key="post.slug" class="py-12">
                <article class="space-y-2 xl:grid xl:grid-cols-4 xl:space-y-0 xl:items-baseline">
                    <dl>
                        <dt class="sr-only">Published on</dt>
                        <dd class="text-base leading-6 font-medium text-slate-500">
                            {{ formatDate(post.date) }}
                        </dd>
                    </dl>

                    <div class="space-y-5 xl:col-span-3">
                        <div class="space-y-6">
                            <h2 class="text-2xl leading-8 font-bold tracking-tight">
                                <NuxtLink :to="{ name: 'blog-year-month-slug', params: { year: getYear(post), month: getMonth(post), slug: post.slug } }" class="text-slate-900">{{ post.title }}</NuxtLink>
                            </h2>

                            <div class="prose prose-slate max-w-none text-slate-500">
                                {{ post.summary }}
                            </div>
                        </div>

                        <div class="text-base leading-6 font-medium">
                            <NuxtLink :to="{ name: 'blog-year-month-slug', params: { year: getYear(post), month: getMonth(post), slug: post.slug } }" class="text-indigo-500 hover:text-indigo-600">Read more →</NuxtLink>
                        </div>
                    </div>
                </article>
            </li>
        </ul>
    </div>
</template>

<script>
    import config from '@/nuxt.config.js'

    export default {
        async asyncData({ $content, params }) {
            let posts

            if (config.dev) {
                posts = await $content('posts')
                    .only(['title', 'slug', 'date', 'summary'])
                    .sortBy('date', 'desc')
                    .fetch()
            } else {
                posts = await $content('posts')
                    .only(['title', 'slug', 'date', 'summary'])
                    .sortBy('date', 'desc')
                    .where({'published': true})
                    .fetch()
            }

            return { posts }
        },

        methods: {
            formatDate(date) {
                date = new Date(date)
                const month = new Intl.DateTimeFormat('en-US', { month: 'long' }).format(date)
                const day = new Intl.DateTimeFormat('en-US', { day: 'numeric' }).format(date)
                const year = new Intl.DateTimeFormat('en-US', { year: 'numeric' }).format(date)
                return `${month} ${day}, ${year}`
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