<template>
        <div class="main_card">
            <div v-for="item in $store.state.boardData" :key="item" class="div_card">
                <img class="card_img" :style="{backgroundImage : `url('${item.img}')`}">
                <div class="div_content">
                    <h3>{{item.title}}</h3>
                    <div>{{item.created_at}}</div>
                    <div>{{item.category_name}}</div>
                    <br>
                    <div><img class="div_img" src="/css/img/eye.png" alt="">{{item.views}}</div>
                    <div><img class="div_img" src="/css/img/heart.png" alt="">{{item.heart}}</div>
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
        // mounted() {
        //     this.fetchItems();
        // },
    }

</script>
<style>
.main_card {
    display: table;
    border-collapse: collapse;
    width: 60%;
    max-width: 60%;
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(3,1fr);
    grid-template-rows: repeat(4, 1fr);
}

.div_content {
    padding: 5px;
}

.div_card {
    width: 350px;
    height: 350px;
    border: 1px solid black;
    display: table-cell;
}

.card_img {
    width: 100%;
    height: 190px;
}

.div_img {
    width: 15px;
    height: 15px;
    box-sizing: border-box;
    justify-content: center;
    margin-right: 5px;
}
</style>