<template>
    <div class="divide-y divide-gray-200">
        <div class="pt-6 pb-8 space-y-2 md:space-y-5">
            <h1 class="text-3xl leading-9 font-extrabold text-gray-900 tracking-tight sm:text-4xl sm:leading-10 md:text-6xl md:leading-14">
                Download
            </h1>

            <p class="text-lg leading-7 text-gray-500">All releases of Ghost, in chronological order.</p>
        </div>

        <div class="lg:grid lg:grid-cols-2 lg:gap-24 lg:items-start pt-12">
            <div class="relative divide-y divide-gray-200">
                <div class="space-y-2 md:space-y-5 pb-10">
                    <h2 class="text-3xl text-gray-900 font-extrabold tracking-tight sm:text-4xl">
                        Compiled Binaries
                    </h2>

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div v-for="asset of latest.assets" :key="asset.id" class="relative rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm flex items-center space-x-3 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                            <div class="flex-1 min-w-0">
                                <a :href="asset.browser_download_url" class="focus:outline-none">
                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                    <p class="text-sm font-medium text-gray-900">
                                        {{ asset.name }}
                                    </p>

                                    <p class="text-sm text-gray-500 truncate">
                                        {{ bytesToHuman(asset.size) }}
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-2 md:space-y-5 py-10">
                    <h2 class="text-3xl text-gray-900 font-extrabold tracking-tight sm:text-4xl">
                        Brew
                    </h2>

                    <article class="prose">
                        <NuxtContent :document="brew" />
                    </article>
                </div>

                <div class="space-y-2 md:space-y-5 py-10">
                    <h2 class="text-3xl text-gray-900 font-extrabold tracking-tight sm:text-4xl">
                        Go Install
                    </h2>

                    <article class="prose">
                        <NuxtContent :document="goInstall" />
                    </article>
                </div>

                <div class="space-y-2 md:space-y-5 py-10">
                    <h2 class="text-3xl text-gray-900 font-extrabold tracking-tight sm:text-4xl">
                        Build From Source
                    </h2>

                    <article class="prose">
                        <NuxtContent :document="buildFromSource" />
                    </article>
                </div>

                <div class="space-y-2 md:space-y-5 py-10">
                    <h2 class="text-3xl text-gray-900 font-extrabold tracking-tight sm:text-4xl">
                        Versioning Scheme
                    </h2>

                    <article class="prose">
                        <NuxtContent :document="versioningScheme" />
                    </article>
                </div>

            </div>

            <div class="relative">
                <ul class="bg-gray-50 rounded-3xl p-2 sm:p-5 xl:p-6">
                    <li v-for="(release, index) of releases" :key="release.name">
                        <article>
                            <a :href="`https://github.com/ghost-language/ghost/releases/tag/${release.name}`" target="_blank" class="grid md:grid-cols-8 xl:grid-cols-9 items-start relative rounded-xl p-3 sm:p-5 xl:p-6 overflow-hidden hover:bg-white">
                                <h3 class="font-semibold text-gray-900 md:col-start-3 md:col-span-6 xl:col-start-3 xl:col-span-7 mb-1 ml-9 md:ml-0">
                                    {{ release.name }}
                                </h3>

                                <time datetime="" class="md:col-start-1 md:col-span-2 row-start-1 md:row-end-3 flex items-center font-medium mb-1 md:mb-0">
                                    <svg v-if="index == 0" viewBox="0 0 12 12" class="w-3 h-3 mr-6 overflow-visible text-indigo-400"><circle cx="6" cy="6" r="6" fill="currentColor"></circle><circle cx="6" cy="6" r="11" fill="none" stroke="currentColor" stroke-width="2"></circle><path d="M 6 18 V 500" fill="none" stroke-width="2" stroke="currentColor" class="text-gray-200"></path></svg>
                                    <svg v-if="index > 0 && index < releases.length - 1" viewBox="0 0 12 12" class="w-3 h-3 mr-6 overflow-visible text-gray-300"><circle cx="6" cy="6" r="6" fill="currentColor"></circle><path d="M 6 -6 V -30" fill="none" stroke-width="2" stroke="currentColor" class="text-gray-200"></path><path d="M 6 18 V 500" fill="none" stroke-width="2" stroke="currentColor" class="text-gray-200"></path></svg>
                                    <svg v-if="index == releases.length - 1" viewBox="0 0 12 12" class="w-3 h-3 mr-6 overflow-visible text-gray-300"><circle cx="6" cy="6" r="6" fill="currentColor"></circle><path d="M 6 -6 V -30" fill="none" stroke-width="2" stroke="currentColor" class="text-gray-200"></path></svg>

                                    <!-- Jun 17, 2021 -->
                                </time>
                            </a>
                        </article>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        async asyncData({ $content }) {
            const brew = await $content('pages', 'downloads', 'brew').fetch()
            const buildFromSource = await $content('pages', 'downloads', 'build-from-source').fetch()
            const goInstall = await $content('pages', 'downloads', 'go-install').fetch()
            const versioningScheme = await $content('pages', 'downloads', 'versioning-scheme').fetch()

            return { brew, buildFromSource, goInstall, versioningScheme }
        },

        computed: {
            releases() {
                return this.$store.getters['getReleases']
            },

            latest() {
                return this.$store.getters['getLatestRelease']
            }
        },

        methods: {
            bytesToHuman(bytes) {
                if (bytes < 1024) {
                    return bytes + ' B';
                }

                if (bytes < 1048576) {
                    return (bytes / 1024).toFixed(2) + ' KB';
                }

                if (bytes < 1073741824) {
                    return (bytes / 1048576).toFixed(2) + ' MB';
                }

                return (bytes / 1073741824).toFixed(2) + ' GB';
            }
        }
    }
</script>