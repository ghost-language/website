import './bootstrap.js'
import './ghost.js'

import { createApp } from 'vue'

const app = createApp({})
    .component('app-header', require('./components/Header.vue').default)
    .component('app-play', require('./components/Play.vue').default)

const vm = app.mount('#app')