import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from './pages/Home.vue';
import Abaut from './pages/Abaut.vue';
import Blog from './pages/Blog.vue';
import Contact from './pages/Contact.vue';
import Error404 from './pages/Error404.vue';


const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [{
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/abaut',
            name: 'abaut',
            component: Abaut
        },
        {
            path: '/blog',
            name: 'blog',
            component: Blog
        },
        {
            path: '/contacts',
            name: 'contacts',
            component: Contact
        },
        {
            path: '/',
            name: 'error404',
            component: Error404
        },


    ]
});

export default router;