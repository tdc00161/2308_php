<template>
    <div>
        <HeaderComponent></HeaderComponent>
        <!-- <LoginComponent></LoginComponent> -->
        <MainComponent></MainComponent>
        <FooterComponent></FooterComponent>
    </div>
</template>
<script>

import HeaderComponent from './HeaderComponent.vue';
import FooterComponent from './FooterComponent.vue';
// import LoginComponent from './LoginComponent.vue';
import MainComponent from './MainComponent.vue';



export default {
    name:'AppComponent',
    components: {
        HeaderComponent,
        FooterComponent,
        // LoginComponent,
        MainComponent,
    },
    created() {
    this.$store.dispatch('actionGetBoardList');
  },
}
</script>
<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: black;
}
</style>