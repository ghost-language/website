export default async function ({ store }) {
    if (process.server || process.static) {
        await store.dispatch('fetchCategories')
    }

    // SPA support
    if (process.client && !store.state.categories) {
        await store.dispatch('fetchCategories')
    }

    // Hot reload support
    if (process.client && process.dev) {
        window.onNuxtReady(() => {
            window.$nuxt.$on('content:update', async () => {
                await store.dispatch('fetchCategories')
            })
        })
    }
}