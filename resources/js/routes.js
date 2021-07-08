import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from './pages/Home.vue';
import Abaut from './pages/Abaut.vue';
import Blog from './pages/Blog.vue';
import Contact from './pages/Contact.vue';


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
        },
        {
            path: '/blog',
            name: 'blog',
            component: Blog
        },
        {
            path: '/contacts',
            name: 'contcts',
            component: Contact
        },


    ]
});

export default router;