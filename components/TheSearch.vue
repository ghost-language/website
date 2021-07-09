<template>
    <div>
        <label for="search" class="sr-only">Search</label>

        <div class="mt-1 relative rounded-md shadow-sm">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <!-- Heroicon name: solid/mail -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>

            <input type="search" name="query" v-model="query" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 sm:text-sm border-gray-300 rounded-md" placeholder="Search...">
        </div>
    </div>
    <!-- <div class="flex-1 flex items-center justify-center px-2 lg:ml-6 lg:justify-end">
        <div class="max-w-lg w-full lg:max-w-xs">
            <label for="search" class="sr-only">Search</label>

            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                    </svg>
                </div>

                <input type="search" v-model="query" autocomplete="off" placeholder="Search..." class="block w-full pl-10 pr-3 py-2 truncate leading-5 placeholder-gray-500 border border-gray-500 text-gray-700 focus:border-gray-300 rounded-md focus:outline-none focus:bg-white bg-white">

                <ul v-if="docs.length" class="z-10 absolute w-auto flex-1 bg-white dark:bg-gray-900 rounded-md border border-gray-300 overflow-hidden">
                    <li v-for="doc of docs" :key="doc.slug">
                        {{ doc.title }}
                    </li>
                </ul>
            </div>
        </div>
    </div> -->
</template>

<script>
    export default {
        data() {
            return {
                query: '',
                docs: []
            }
        },

        watch: {
            async query(query) {
                if (! query) {
                    this.docs = []
                    return
                }

                this.docs = await this.$content('docs', 'nightly')
                    .limit(6)
                    .search(query)
                    .fetch()
            }
        }
    }
</script>