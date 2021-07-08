<template>
  <main class="container">

    <Header />
    <!-- tag vue che riceve tutti i componenti ignettanti dal router -->
    <router-view>

    </router-view>
    
  </main>

</template>

<script>
import Header from './components/Header.vue'

export default {
  name: 'App',
  components: {
    Header
  },
  data(){
    return{

    }
  },
  methods:{

  },
  created(){

  },
  mounted(){

  },
  
}
</script>

<style lang="scss">
  @import '../sass/frontoffice/global';
</style>