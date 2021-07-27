import axios from "axios";

const state = {
    /* käyttäjän tiedot laitetaan tähän arrayhin */
    user: []
    
};
const getters = {};


const actions = {

    /* Action joka tekee uuden käyttäjän */
    registerUser({}, user){
        //jos salasanat eivät ole sama
        if(user.password !=  user.confirm_password){
            console.log("Salasanat eivät täsmää");
            return;
        }
        //uuden käyttäjän tiedot lähetetään käyttäen axios
        axios
        .post('/api/register', {    
            first: user.first,
            last: user.last,
            email: user.email,
            password: user.password,
        })
        .then( response => {
            if( response.data.access_token ) {  //jos response.datassa on access_token
                //Tallentaa tokenin localStorageen. Controlleri luo tämä tokenin
                localStorage.setItem(
                    "login_token",              //tokenin uusi nimi
                    response.data.access_token  //response.datassa oleva tokeni
                )
                window.location.replace('/app#/todo');  //Siirretään käyttäjä
            }
        })
    },

    /* Kun kirjaudutaan sisälle */
    loginUser({}, user ) {
        axios
        .post('/api/login', { 
            email: user.email,
            password: user.password
        })
        .then( response => { //kun tulee vastaus(response)
            if( response.data.access_token ) {  //jos response.datassa on access_token

                //Tallentaa tokenin localStorageen. Controlleri luo tämä tokenin
                localStorage.setItem(
                    "login_token",              //tokenin uusi nimi
                    response.data.access_token  //response.datassa oleva tokeni
                )
                window.location.replace('/app#/todo');  //Siirretään käyttäjä
            }
        }) 
    },

    /* Kirjaudutaan ulos */
    logoutUser(){
        //poistaa tokenin localStoragesta
        localStorage.removeItem('login_token');
        window.location.replace('/login');  //käyttäjä laitetaan sivulle /login
    },
};
const mutations = {}; 



export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}