import HomeComponent from "./modules/HomeComponent.js";
import StatComponent from "./modules/StatComponent.js";
import ContactComponent from "./modules/ContactComponent.js";
import ErrorComponent from "./modules/ErrorComponent.js";

const routes = [
    { path: '/', name: 'home', component: HomeComponent },
    { path: '/stat', name: 'stat', component: StatComponent },
    { path: '/contact', name: 'contact', component: ContactComponent },
    { path: '/*', name: 'error', component: ErrorComponent },
]

const router = new VueRouter({
    routes
})

const vm = new Vue({
    data: {

    },

    methods: {

    },

    router
}).$mount("#app");