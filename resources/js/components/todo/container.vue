<template>
    <div class="todoListContainer">
        <div class="heading">
            <h2>Todo List</h2>
            <add-item-form />
        </div>
        <list-view />
    </div>
</template>



<script>
/* Pääsivu todo apille, lisätään additemForm ja ListView */
import addItemForm from './addItemForm.vue' 
import listView from './listView.vue'

export default {
    components: {
        listView,   //komponenttiin lisäys jotta voidaan renderöidä sivulla
        addItemForm
    },
}
</script>



<style scoped>
.todoListContainer{
    display: table;
    width: 550px;
    height: 300px;
    margin: 10% auto;
    padding: 10px;
    box-shadow: 5px 10px 8px 10px #888888;
}

.heading{
    margin-top: 20px;
    width: 100%;
    text-align: center;
}
</style>