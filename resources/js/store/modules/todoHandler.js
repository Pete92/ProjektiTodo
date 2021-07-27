import axios from "axios";

const state = {
    /* array käytetään kun tehdään uusi tehtävä */
    item: [],
    /* Array johon haetaan kaikki tehtävät tietokannasta */
    items: [],
};

const getters = {
};

const actions = {
    //Tekee uuden tehtävän
    setItem({commit}, item) {
        //Jos v-model:"item.name" on tyhjä
        if(item.name == ''){
            return;
        }
        /* Uuden tehtävän teko käyttäen axios ja post */
       axios
        .post('/api/application/todo/', {
            name: item.name,
            highpriority: item.highpriority,
        })
        .then( response => {
            if(response = 201){ /* jos response on 201 eli onnistui. Laitetaan inputit tyhjiksi uutta tehtävää varten */
                item.name = "",
                item.highpriority = false
            }
        })
        commit('ADD_ITEM', item); /* Kutsuu mutationia */
    },


    /* Hakee tehtävät tietokannasta */
    getItems( {commit} ){
        axios
        .get('api/application/todo') //reitti jossa kaikki tehtävät on
        .then( response =>{
            commit('ITEMS', response.data); //Mutation joka laittaa response.datassa olevat itemit items arrayhin
        })
    },

     
    //Tehtävä tehty
    itemDone({commit}, item){
        axios
        .put('api/application/todo/' + item.id)
        .then(response => {
            console.log(response.data)
        })
        commit('UPDATE_ITEM', item);       
    },
    
    //Tietyn tehtävän poistaminen
    deleteItem({commit}, item) {
        axios
        .delete('api/application/todo/' + item.id)
        .then(res => console.log(res))
        commit('DELETE_ITEM', item);
    },
   

};

const mutations = {
    //Laitetaan itemit array items stateen
    ITEMS(state, items){
      state.items = items;
    },

    //Lisää tehtävä, unshift laittaa stateen ylimmäiseksi
    ADD_ITEM(state, item ) {
        state.items.unshift({
        id: item.id,        //Tähän pitäisi saada uusi id jotta jos muokataan niin tallentuu tietokantaan. Tällä hetkellä id on undefined
        name: item.name,
        highpriority: item.highpriority
    })
    },
 

    //Poistaa tietyn id:en statesta
    DELETE_ITEM(state, item) {
    var index = state.items.findIndex(i => i.id == item.id);
    state.items.splice(index, 1);
    },

    //Päivittää halutun id:en stateen
    UPDATE_ITEM(state, item) {
        state.items.find(i => i.id == item.id); 
    } 
};




export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}