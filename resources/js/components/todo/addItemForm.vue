<template>
    <div>
        <div class="addItem">
            <v-btn v-if="editing" @click="doEdit(false)" color="warning" dark ><v-icon>mdi-close</v-icon></v-btn>
            <v-btn v-else @click="doEdit(true)" color="success" dark ><v-icon>mdi-plus</v-icon></v-btn>
        </div>
        <div v-if="editing">
            <h5 class="mt-2">Lisää Uusi tehtävä</h5>
            <small>High Priority</small>
            <input type="checkbox" v-model="item.highpriority" 
            />
            <div class="addItem" >
                <input type="text" class="teksti" v-model="item.name"
                />
                <v-btn @click="addItem(item)" color="primary" fab small dark ><v-icon>mdi-check</v-icon></v-btn>
            </div>
        </div>
    </div> 
</template>

<script>
export default {
  data: () => ({
      /* Uuden tehtävän tiedot */
        item: {
            name: "",
            highpriority: false,
        },
        editing: false, //editin on defaulttina false, eli kiinni lomake
    }),
    methods: {
        addItem(item){
           this.$store.dispatch('todoHandler/setItem', item);  /* Uuden tehtävän tiedot lähetetään actioniin */ 
        },
        doEdit(editing){    /* editing lomake auki tai kiinni */
            this.editing = editing
            this.item.name = "";
        }
    },
}
</script>

<style scoped>
.addItem{
    margin-top: 20px;
    justify-content: center;
    align-items: center;
    margin-bottom: 30px;
}
/* Inputille */
.teksti{
    background: #ffffff;
    border: 1px solid black;
    padding: 5px;
    margin: 0 15px 0;
    width: 50%;
    text-align: center;
    border-radius: 5px;
}
</style>