<template>
  <v-app id="inspire">
    <v-navigation-drawer
      v-model="drawer"
      app
    >
      <v-list dense>
          <v-list-item to="/todo" link> <!-- Kun tätä painetaan näytetään v-mainissa todo sisältö, Router kansiossa on määritetty reitti  -->
              <v-list-item-action>
                  <v-icon>mdi-home</v-icon>
              </v-list-item-action>
              <v-list-item-content>
                  <v-list-item-title>ToDo List</v-list-item-title>
              </v-list-item-content>
          </v-list-item>

          <v-list-item to="/info" link>
              <v-list-item-action>
                  <v-icon>mdi-contact-mail</v-icon>
              </v-list-item-action>
              <v-list-item-content>
                  <v-list-item-title>Info</v-list-item-title>
              </v-list-item-content>
          </v-list-item>

          <v-list-item link @click="logout">
              <v-list-item-action>
                  <v-icon>mdi-power</v-icon>
              </v-list-item-action>
              <v-list-item-content>
                  <v-list-item-title>Log Out</v-list-item-title>
              </v-list-item-content>
          </v-list-item>
      </v-list>
    </v-navigation-drawer>
    
    <v-app-bar app>
      <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>
      <v-toolbar-title>Application</v-toolbar-title>
    </v-app-bar>

    <v-main>
    <router-view></router-view> <!-- Tähän tulee sisältö joko se on todo tai info -->
    </v-main>
  </v-app>
</template>

<script>
  export default {
    data: () => ({ drawer: null }),
    methods: {
        //kun painetaan @click="logout"
        logout(){
           this.$store.dispatch("currentUser/logoutUser"); //kutsuu actionin joka loggaa ulos käyttäjän
        },
    },
    //Created tarkoitta kun esinmmäisen kerran ladataan sivu
    created() {
      //jos localStrogaessa on tokeni nimeltä login_token 
      if( localStorage.hasOwnProperty("login_token") ) {
        //Jos vaihdetaan sivua niin tämä tokeni pysyy localStoragessa. esim jos mennää info sivulle, niin tokeni pysyy
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('login_token');
      } else {
        window.location.replace("/login"); //muuten palataan /login sivulle
      }
    }
  }
</script>