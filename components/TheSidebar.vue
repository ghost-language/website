<template>
    <div class="fixed z-40 inset-0 flex-none h-full bg-black bg-opacity-25 lg:bg-white lg:static lg:h-auto lg:overflow-y-visible lg:pt-0 w-52 lg:block hidden">
        <div class="h-full overflow-y-auto scrolling-touch lg:h-auto lg:block lg:sticky lg:bg-transparent overflow-hidden lg:top-18 bg-white mr-24 lg:mr-0">
            <nav class="px-1 pt-6 overflow-y-auto font-medium text-base lg:text-sm pb-10 lg:pt-10 lg:pb-14 sticky?lg:h-(screen-18)">
                <li class="mb-8 list-none" v-for="(docs, category) in categories" :key="category">
                    <h5 v-if="category" class="mb-3 uppercase tracking-wide font-semibold text-sm lg:text-xs text-gray-900">{{ category }}</h5>
                    <ul class="list-none">
                        <li v-for="doc of docs" :key="doc.slug">
                            <NuxtLink
                                :to="{ name: 'docs-version-slug', params: { version: 'nightly', slug: doc.slug } }"
                                class="py-2 transition-colors duration-200 relative block hover:text-gray-900 text-gray-500"
                            >
                                {{ doc.title }}
                            </NuxtLink>
                        </li>
                    </ul>
                </li>
            </nav>
        </div>
    </div>
</template>

<script>
    export default {
        computed: {
            categories() {
                return this.$store.getters['getCategories']
            }
        }
    }
</script>
