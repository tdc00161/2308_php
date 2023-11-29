<template>
        <div class="main_card">
                <div v-for="item in $store.state.boardData" :key="item" class="main_divcard">
                    <img class="main_cardimg" :style="{backgroundImage : `url('${item.img}')`}">
                    <div>
                        <h3>{{item.title}}</h3>
                        <div>{{item.created_at}}</div>
                        <div>{{item.category_name}}</div>
                        <br>
                        <div><img class="main_ulimg" src="/css/img/eye.png" alt="">{{item.views}}</div>
                        <div><img class="main_ulimg" src="/css/img/heart.png" alt="">{{item.heart}}</div>
                    </div>
                </div>
        </div>
</template>
<script>
    export default {
        name:'CardComponent',
        data() {
        return {
            item: [],
            };
        },
        mounted() {
            this.fetchItems();
        },
    }

</script>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

a {
    text-decoration: none;
    color: black;
}

body {
    box-sizing: border-box;
    width: 100vw;
    height: 100vh;
}
</style>