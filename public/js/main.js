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

//var mykey = config.MY_KEY;

//Vue.use(VueGoogleMaps, {
    //vue library plugin rules
    //load: {
     // key: mykey,
     // v: '3.26'
    //},
    //installComponents: true
  //})

const vm = new Vue({
    data: {
        showTopMenu: false,
        isActive: false,
        clinics: [],
        homeContent: [],
    },
    methods: {
        closeMenu(){
            this.showTopMenu = false;
            this.isActive = false;
        },
        pullClinics(){
            let url = "./admin/clinics.php";
            fetch(url)
            .then(res => res.json())
            .then(data => {
                for(var i=0;i<data.length;i++){
                    this.clinics.push(data[i]);
                }
            })
            .catch(err => console.log(err))
            console.log(this.clinics);
        },
        fetchHomeContent(){
            let url = `./admin/home.php`;
            fetch(url)
            .then(res => res.json())
            .then(data => {
                console.log(data);
                for(var i=0; i<data.length; i++){
                    this.homeContent.push(data[i]);
                }
            })
            .catch(err => console.log(err))
        },
    },
    created: function(){
        this.pullClinics();
        this.fetchHomeContent();
    },
    router
}).$mount("#app");