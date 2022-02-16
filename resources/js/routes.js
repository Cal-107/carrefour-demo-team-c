//dipendenze
import Vue from 'vue';
import VueRouter from 'vue-router';

// componenti per rotta
import Home from './pages/Home';
import Detail from './pages/Detail';

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
        {
            path: '/products/:slug',
            name: 'detail',
            component: Detail,
        },
    ]
});


// export rotte 
export default router;