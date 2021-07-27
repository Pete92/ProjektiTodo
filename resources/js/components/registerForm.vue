<template>
    <div>   
        <div class="mb-3">
            <label class="form-label">Etunimi</label>
            <input type="text" v-model="user.first" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Sukunimi</label>
            <input type="text" v-model="user.last" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Sähköposti</label>
            <input type="email" v-model="user.email" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Salasana</label>
            <input type="password" v-model="user.password" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Salasana Uudelleen</label>
            <input type="password" v-model="user.confirm_password" class="form-control">
        </div>
        <button type="submit" @click="register(user)" class="btn btn-primary">Submit</button>
    </div>
</template>



<script>


export default {
    data: () => ({
        /* v-modeleista tiedot */
        user: {
            first: '',
            last: '',
            email: '',
            password: '',
            confirm_password: ''
        }
    }),
    methods: {
        register(user) {
            this.$store.dispatch('currentUser/registerUser',user); //uuden käyttäjän tiedot lähetetään actioniin
        }
    }
}
</script>
