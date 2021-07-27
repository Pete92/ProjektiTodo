import Vue from 'vue'
import VueRouter from 'vue-router'
/* Router tänne lisätään uudet sivun reitit jos halutaan lisätä projektiin */
Vue.use(VueRouter)


import Todo from '../components/todo/container' /* Todo container(etusivu) */
import Info from '../components/info/container'  /* Info container(etusivu) */

const routes = [
    {
        component: Todo,
        name: "todo",
        path: "/todo"
    },
    {
        component: Info,
        name: "info",
        path: "/info"
    }
];

export default new VueRouter({
    routes  //lyhennetty routes: routes
});