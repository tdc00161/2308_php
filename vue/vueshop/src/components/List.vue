<template lang="">
    <div v-for="(item, i) in data1" :key="i">
      <h4 @click="$emit('openModal',item)">{{item.name}}</h4>
      <p>{{item.price}} 원</p>
      <button @click="$emit('countDown', i)">허위 매물 신고</button>
      <span>신고수 : {{ item.reportCnt }}</span>
    </div>
</template>
<script>

export default {
    name: 'List',
    props: {
        data1: Object,
    }
    
}


</script>
<style lang="">
    
</style>