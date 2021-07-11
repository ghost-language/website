<template>
    <header>
        <TheBanner />

        <nav class="bg-white border-b border-gray-200">
            <div class="w-full max-w-7xl mx-auto px-6">
                <div class="flex justify-between h-16">
                    <div class="flex px-6 w-72">
                        <a href="/" class="flex-shrink-0 flex items-center" alt="Home">
                            <img class="block lg:hidden h-5 w-auto" src="/img/logo.svg" alt="Ghost" />
                            <img class="hidden lg:block h-5 w-auto" src="/img/logo-text.svg" alt="Ghost" />
                        </a>
                    </div>

                    <div class="ghost-header hidden lg:flex lg:space-x-4">
                        <!-- Current: "border-indigo-500 text-gray-900", Default: "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700" -->
                        <NuxtLink to="/blog" class="inline-flex items-center px-1 pt-1 text-sm font-medium border-b-2 border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700">
                            Blog
                        </NuxtLink>

                        <NuxtLink to="/docs" class="inline-flex items-center px-1 pt-1 text-sm font-medium border-b-2 border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700">
                            Documentation
                        </NuxtLink>

                        <NuxtLink to="/download" class="inline-flex items-center px-1 pt-1 text-sm font-medium border-b-2 border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700">
                            Download
                        </NuxtLink>

                        <NuxtLink to="/play" class="inline-flex items-center px-1 pt-1 text-sm font-medium border-b-2 border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700">
                            Playground
                        </NuxtLink>
                    </div>

                    <div class="flex items-center justify-end px-3 w-72">
                        <TheSearch />

                        <!-- Mobile menu button -->
                        <!-- <DisclosureButton class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                            <span class="sr-only">Open main menu</span>
                            <MenuIcon v-if="!open" class="block h-6 w-6" aria-hidden="true" />
                            <XIcon v-else class="block h-6 w-6" aria-hidden="true" />
                        </DisclosureButton> -->
                    </div>
                </div>
            </div>
        </nav>
    </header>
</template>

<script>
    export default {
        data() {
            return {
                open: false,
                latestVersion: this.$config.latestVersion,
            }
        },
    }
</script>