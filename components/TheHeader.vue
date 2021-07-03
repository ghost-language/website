<template>
    <nav class="bg-white shadow">
        <div class="w-full max-w-7xl mx-auto px-6">
            <div class="flex justify-between h-16">
                <div class="flex px-2 lg:px-0">
                    <a href="/" class="flex-shrink-0 flex items-center" alt="Home">
                        <img class="block lg:hidden h-5 w-auto" src="/img/logo.svg" alt="Ghost" />
                        <img class="hidden lg:block h-5 w-auto" src="/img/logo-text.svg" alt="Ghost" />
                    </a>
                </div>

                <div class="flex items-center lg:hidden">
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
</template>

<script>
    export default {
        data() {
            return {
                open: false,
            }
        },
    }
</script>