import Vue from 'vue'
import Vuex from 'vuex'


//Kirjautuneen käyttäjä store
import currentUser from './modules/currentUser'
//todo handler store
import todoHandler from './modules/todoHandler'



Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        currentUser,    
        todoHandler
    }
})