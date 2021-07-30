<template>
    <div>
        <div class="mb-3">
            <label class="form-label">Sähköposti</label>
            <input type="email" class="form-control" v-model="user.email">
        </div>
        <div class="mb-3">
            <label class="form-label">Salasana</label>
            <input type="password" class="form-control" v-model="user.password">
        </div>
        <button type="submit" @click="login(user)" class="btn btn-primary">Kirjaudu</button>
    </div>
</template>

<script>
export default {
    data: () => ({
        /* Kirjautuneen käyttäjän tiedot */
        user: {
            email: '',
            password: ''
        }
    }),
    methods: {
        login(user) {
            this.$store.dispatch('currentUser/loginUser', user ); //Lätetetään actioniin käyttäjän tiedot
        }
    }
}
</script>
