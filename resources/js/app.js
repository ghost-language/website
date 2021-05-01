import './bootstrap.js'
import { createApp } from 'vue'

const app = createApp({})
    .component('app-header', require('./components/Header.vue').default)

const vm = app.mount('#app')