<template>
    <div class="item">   
        <input type="checkbox" 
        @change="itemCompleted(item)"
        v-model="item.completed"
        onChange="true"
        />
        <span :class="[item.completed ? 'completed' : '', 'itemText']">{{item.name}}</span> <!-- jos item on completed niin käytetään class 'completed', muuten 'itemText' -->
        <v-btn plain small color="red" class="nappi" @click="poistaTehtava(item)">
        <v-icon>mdi-delete</v-icon>
        </v-btn>
    </div>
</template>

<script>
export default {
props: ['item'],    /* propsi joka saadaan käyttöön kun annettiin listView sivulla. Tällä sivulla pääsee käsiksi jokaiseen itemin id:hen */
methods: {
        itemCompleted(item){
            this.$store.dispatch('todoHandler/itemDone', item); /* Actionin lähetetään tämä id */
        },
        poistaTehtava(item) {
        this.$store.dispatch('todoHandler/deleteItem', item);
        },
    }
}
</script>

<style scoped>
.completed{
    text-decoration: line-through;
    color: #999999;
}
.itemText{
    width: 100%;
    margin-left:40px;
}
.item{
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>