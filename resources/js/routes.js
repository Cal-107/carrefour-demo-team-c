//dipendenze
import Vue from 'vue';
import VueRouter from 'vue-router';

// componenti per rotta
import Home from './pages/Home';

// attivazione router in vue
Vue.use(VueRouter);


const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home,
        },
    ]
});


// export rotte 
export default router;