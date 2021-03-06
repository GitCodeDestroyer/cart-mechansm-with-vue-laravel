import './bootstrap'
import Vue from 'vue'
import VueRouter from 'vue-router'
import { router } from './routes'

Vue.use(VueRouter)
// Vue.component('test-view', require('./components/Home.vue').default)

const routes = new VueRouter(router)

routes.beforeResolve((to, from, next) => {
    // If this isn't an initial page load.
    if (to.name) {
        // Start the route progress bar.
        NProgress.start()
    }
    next()
})

routes.afterEach((to, from) => {
    // Complete the animation of the route progress bar.
    NProgress.done()
    document.getElementById('cart-open-btn').addEventListener('click', function() {
        document.getElementById('cart-menu').classList.toggle('active')
        document.body.classList.toggle('cart-menu-opened')
    })
})

const app = new Vue({
    el: '#app',
    router: routes
})
