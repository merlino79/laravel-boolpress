import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from './pages/Home.vue';
import Abaut from './pages/Abaut.vue';

const router = new VueRouter({
    mode: 'history',
    routes: [{
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/abaut',
            name: 'abaut',
            component: Abaut
        }

    ]
});

export default router;