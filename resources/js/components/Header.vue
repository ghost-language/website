<template>
    <Disclosure as="nav" class="bg-white shadow" v-slot="{ open }">
        <div class="w-full mx-auto px-6" :class="{'max-w-7xl': !fullWidth}">
            <div class="flex justify-between h-16">
                <div class="flex px-2 lg:px-0">
                    <a href="/" class="flex-shrink-0 flex items-center" alt="Home">
                        <img class="block lg:hidden h-5 w-auto" src="/img/logo.svg" alt="Ghost" />
                        <img class="hidden lg:block h-5 w-auto" src="/img/logo-text.svg" alt="Ghost" />
                    </a>

                    <div class="hidden lg:ml-6 lg:flex lg:space-x-8">
                        <!-- Current: "border-indigo-500 text-gray-900", Default: "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700" -->
                        <a href="/blog" class="inline-flex items-center px-1 pt-1 text-sm font-medium border-b-2" :class="{'border-indigo-500 text-gray-900': isActive('blog'), 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700': !isActive('blog')}">
                            Blog
                        </a>

                        <a href="/docs" class="inline-flex items-center px-1 pt-1 text-sm font-medium border-b-2" :class="{'border-indigo-500 text-gray-900': isActive('docs'), 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700': !isActive('docs')}">
                            Documentation
                        </a>

                        <a href="/play" class="inline-flex items-center px-1 pt-1 text-sm font-medium border-b-2" :class="{'border-indigo-500 text-gray-900': isActive('play'), 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700': !isActive('play')}">
                            Play
                        </a>
                    </div>
                </div>

                <!-- <div class="flex-1 flex items-center justify-center px-2 lg:ml-6 lg:justify-end">
                    <div class="max-w-lg w-full lg:max-w-xs">
                        <label for="search" class="sr-only">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <SearchIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                            </div>

                            <input id="search" name="search" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Search" type="search" />
                        </div>
                    </div>
                </div> -->

                <div class="flex items-center lg:hidden">
                    <!-- Mobile menu button -->
                    <DisclosureButton class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                        <span class="sr-only">Open main menu</span>
                        <MenuIcon v-if="!open" class="block h-6 w-6" aria-hidden="true" />
                        <XIcon v-else class="block h-6 w-6" aria-hidden="true" />
                    </DisclosureButton>
                </div>

                <div class="hidden lg:ml-4 lg:flex lg:items-center">
                    <!-- <button class="flex-shrink-0 bg-white p-1 text-gray-400 rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <span class="sr-only">View notifications</span>
                        <BellIcon class="h-6 w-6" aria-hidden="true" />
                    </button> -->

                    <!-- Profile dropdown -->
                    <!-- <Menu as="div" class="ml-4 relative flex-shrink-0">
                        <div>
                            <MenuButton class="bg-white rounded-full flex text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                            </MenuButton>
                        </div>

                        <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                            <MenuItems class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
                                <MenuItem v-slot="{ active }">
                                    <a href="#" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">Your Profile</a>
                                </MenuItem>
                                <MenuItem v-slot="{ active }">
                                    <a href="#" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">Settings</a>
                                </MenuItem>
                                <MenuItem v-slot="{ active }">
                                    <a href="#" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">Sign out</a>
                                </MenuItem>
                            </MenuItems>
                        </transition>
                    </Menu> -->
                </div>
            </div>
        </div>

        <DisclosurePanel class="lg:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <!-- Current: "bg-indigo-50 border-indigo-500 text-indigo-700", Default: "border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800" -->
                <!--
                    base:     block pl-3 pr-4 py-2 border-l-4 text-base font-medium
                    active:   bg-indigo-50 border-indigo-500 text-indigo-700
                    inactive: border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800
                 -->
                <a href="/" class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium" :class="{'bg-indigo-50 border-indigo-500 text-indigo-700': isExact('/'), 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800': !isExact('/')}">Home</a>
                <a href="/blog" class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium" :class="{'bg-indigo-50 border-indigo-500 text-indigo-700': isActive('blog'), 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800': !isActive('blog')}">Blog</a>
                <a href="/docs" class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium" :class="{'bg-indigo-50 border-indigo-500 text-indigo-700': isActive('docs'), 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800': !isActive('docs')}">Documentation</a>
                <a href="/play" class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium" :class="{'bg-indigo-50 border-indigo-500 text-indigo-700': isActive('playground'), 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800': !isActive('playground')}">Play</a>
            </div>

            <div class="pt-4 pb-3 space-y-1 border-t border-gray-200">
                <a href="/docs/nightly/getting-started" class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium" :class="{'bg-indigo-50 border-indigo-500 text-indigo-700': isExact('docs/nightly/getting-started'), 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800': !isExact('docs/nightly/getting-started')}">Getting Started</a>
                <a href="/docs/nightly/syntax" class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium" :class="{'bg-indigo-50 border-indigo-500 text-indigo-700': isExact('docs/nightly/syntax'), 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800': !isExact('docs/nightly/syntax')}">Syntax</a>
                <a href="/docs/nightly/values" class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium" :class="{'bg-indigo-50 border-indigo-500 text-indigo-700': isExact('docs/nightly/values'), 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800': !isExact('docs/nightly/values')}">Values</a>
                <a href="/docs/nightly/variables" class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium" :class="{'bg-indigo-50 border-indigo-500 text-indigo-700': isExact('docs/nightly/variables'), 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800': !isExact('docs/nightly/variables')}">Variables</a>
                <a href="/docs/nightly/operators" class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium" :class="{'bg-indigo-50 border-indigo-500 text-indigo-700': isExact('docs/nightly/operators'), 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800': !isExact('docs/nightly/operators')}">Operators</a>
                <a href="/docs/nightly/control-flow" class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium" :class="{'bg-indigo-50 border-indigo-500 text-indigo-700': isExact('docs/nightly/control-flow'), 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800': !isExact('docs/nightly/control-flow')}">Control Flow</a>
                <a href="/docs/nightly/functions" class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium" :class="{'bg-indigo-50 border-indigo-500 text-indigo-700': isExact('docs/nightly/functions'), 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800': !isExact('docs/nightly/functions')}">Functions</a>
                <a href="/docs/nightly/error-handling" class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium" :class="{'bg-indigo-50 border-indigo-500 text-indigo-700': isExact('docs/nightly/error-handling'), 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800': !isExact('docs/nightly/error-handling')}">Error Handling</a>
                <a href="/docs/nightly/classes" class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium" :class="{'bg-indigo-50 border-indigo-500 text-indigo-700': isExact('docs/nightly/classes'), 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800': !isExact('docs/nightly/classes')}">Classes</a>
                <a href="/docs/nightly/method-calls" class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium" :class="{'bg-indigo-50 border-indigo-500 text-indigo-700': isExact('docs/nightly/method-calls'), 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800': !isExact('docs/nightly/method-calls')}">Method Calls</a>
                <a href="/docs/nightly/modules" class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium" :class="{'bg-indigo-50 border-indigo-500 text-indigo-700': isExact('docs/nightly/modules'), 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800': !isExact('docs/nightly/modules')}">Modules</a>
                <a href="/docs/nightly/lists" class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium" :class="{'bg-indigo-50 border-indigo-500 text-indigo-700': isExact('docs/nightly/lists'), 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800': !isExact('docs/nightly/lists')}">Lists</a>
                <a href="/docs/nightly/maps" class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium" :class="{'bg-indigo-50 border-indigo-500 text-indigo-700': isExact('docs/nightly/maps'), 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800': !isExact('docs/nightly/maps')}">Maps</a>
                <a href="/docs/nightly/strings" class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium" :class="{'bg-indigo-50 border-indigo-500 text-indigo-700': isExact('docs/nightly/strings'), 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800': !isExact('docs/nightly/strings')}">Strings</a>
                <a href="/docs/nightly/math" class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium" :class="{'bg-indigo-50 border-indigo-500 text-indigo-700': isExact('docs/nightly/math'), 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800': !isExact('docs/nightly/math')}">Math</a>
                <a href="/docs/nightly/style-guide" class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium" :class="{'bg-indigo-50 border-indigo-500 text-indigo-700': isExact('docs/nightly/style-guide'), 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800': !isExact('docs/nightly/style-guide')}">Style Guide</a>
            </div>

            <!-- <div class="pt-4 pb-3 border-t border-gray-200">
                <div class="flex items-center px-4">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                    </div>

                    <div class="ml-3">
                        <div class="text-base font-medium text-gray-800">Tom Cook</div>
                        <div class="text-sm font-medium text-gray-500">tom@example.com</div>
                    </div>

                    <button class="ml-auto flex-shrink-0 bg-white p-1 text-gray-400 rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <span class="sr-only">View notifications</span>
                        <BellIcon class="h-6 w-6" aria-hidden="true" />
                    </button>
                </div>

                <div class="mt-3 space-y-1">
                    <a href="#" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">Your Profile</a>
                    <a href="#" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">Settings</a>
                    <a href="#" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">Sign out</a>
                </div>
            </div> -->
        </DisclosurePanel>
    </Disclosure>
</template>

<script>
    import { ref } from 'vue'
    import { Disclosure, DisclosureButton, DisclosurePanel, Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
    import { SearchIcon } from '@heroicons/vue/solid'
    import { BellIcon, MenuIcon, XIcon } from '@heroicons/vue/outline'

    export default {
        props: {
            active: String,
            fullWidth: Boolean,
        },

        components: {
            Disclosure,
            DisclosureButton,
            DisclosurePanel,
            Menu,
            MenuButton,
            MenuItem,
            MenuItems,
            BellIcon,
            MenuIcon,
            SearchIcon,
            XIcon,
        },

        setup() {
            const open = ref(false)

            return {
                open,
            }
        },

        methods: {
            isActive(path) {
                let segments = this.active.split('/')

                return segments[0] == path
            },

            isExact(path) {
                return this.active == path
            },
        }
    }
</script>