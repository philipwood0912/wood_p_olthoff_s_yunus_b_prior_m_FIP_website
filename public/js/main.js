import HomeComponent from "./modules/HomeComponent.js";
import AboutComponent from "./modules/AboutComponent.js";
import LoginComponent from "./modules/LoginComponent.js";
import LearnComponent from "./modules/LearnComponent.js";
import ErrorComponent from "./modules/ErrorComponent.js";

const routes = [
    { path: '/', name: 'home', component: HomeComponent },
    { path: '/about', name: 'about', component: AboutComponent },
    { path: '/learn', name: 'learn', component: LearnComponent },
    { path: '/login', name: 'login', component: LoginComponent },
    { path: '/*', name: 'error', component: ErrorComponent },
]

const router = new VueRouter({
    routes
})

const vm = new Vue({
    data: {
        showTopMenu: false,
        isActive: false
    },
    methods: {
        closeMenu(){
            this.showTopMenu = false;
            this.isActive = false;
        }
    },

    router
}).$mount("#app");