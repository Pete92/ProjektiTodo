<template>
    <div>
        <div v-for="item in items" :key="item.id">  <!-- v-for vähä niinkuin foreach. looppaa tietokannassa oleva items id:n mukaan -->
            <list-item :item="item"
            :class="[item.highpriority ? 'itemHighpriority': '', 'item']"
            />  <!-- :item="item" voidaan käyttää tätä ListItem.vue sivulla. tällä saadaan muokattua ja poistettua haluttu id  -->
        </div> <!-- jos item.highpriority on käytössä niin class on itemHighpriority muuten defaulttina item -->
    </div>
</template>

<script>
import listItem from './listItem.vue' /* listitem lisäys */
export default {
    components: {
        listItem    //komponenttiin lisäys jotta näkyy sivulla
    },
    mounted() { //Lisätään sivulle actioni joska hakee tietokannasta olevat items
        this.$store.dispatch('todoHandler/getItems');
    },
    computed: { /* Computed, statessa on items ja tällä saadaan tulostettua sivulle olevat itemsit käyttäen v-for */
        items(){
            return this.$store.state.todoHandler.items; //Tämä store state todoHandler items
        },
    }
}
</script>

<style scoped>
.item{
    background: #ffffff;
    padding: 5px;
    margin-top: 5px;
    border-radius: 5px;
    border: 1px solid black;
}
.itemHighpriority{
    background: #ffffff;
    padding: 5px;
    margin-top: 5px;
    border-radius: 5px;

    font-size: 15px;
    text-transform: uppercase;
    color: #ffa500;
}
</style>