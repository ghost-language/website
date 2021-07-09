import groupBy from 'lodash.groupby'

export const state = () => ({
    categories: {},
})

export const getters = {
    getCategories(state) {
        return state.categories
    }
}

export const mutations = {
    SET_CATEGORIES(state, categories) {
        state.categories = categories
    }
}

export const actions = {
    async fetchCategories({ commit, state }) {
        // Avoid re-fetching in production
        if (process.dev === false && state.categories) {
            return
        }

        const docs = await this.$content('docs', 'nightly', { deep: true })
            .only([
                'title',
                'slug',
                'category',
            ])
            .sortBy('order', 'asc')
            .fetch()

        const categories = groupBy(docs, 'category')

        commit('SET_CATEGORIES', categories)
    }
}