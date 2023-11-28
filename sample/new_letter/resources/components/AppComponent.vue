<template>
    <div>
        <Header></Header>
        <MainComponent></MainComponent>
        <Footer></Footer>
    </div>
</template>
<script>

import Header from './layout/Header.vue';
import Footer from './layout/Footer.vue';
import MainComponent from './MainComponent.vue';

export default {
    name:'AppComponent',
    components: {
    Header,
    Footer,
    MainComponent,
}
}
</script>
<style>
@import url('/css/common.css');
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>