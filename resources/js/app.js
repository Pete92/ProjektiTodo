/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

import Vuetify from '../plugins/vuetify'    //liitetään vuetify
import store from './store'                 //store vuex
import router from './router'               //router spa
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component('register-form', require('./components/registerForm.vue').default);   /* Rekisteriröinti tapahtuu vuejs avulla ja nyt voidaan lisätä tämä */
Vue.component('login-form', require('./components/loginForm.vue').default);         /* Sama homma kirjautumisella */
Vue.component('app-container', require('./components/appContainer.vue').default);   /* AppContainer joka toimii SPA etusivuna */

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    vuetify: Vuetify, /* Vuetify käyttöön */
    store,            /* Store käyttöön vuex */
    router,           /* Router SPA*/
    el: '#app',       /* Mihin tulee tämä uusi vue, niin määritetään id="app"*/
});
