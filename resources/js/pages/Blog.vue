<template>
  <div>
    <h1>
      blog
    </h1>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'blog',
  data(){
    return{

    }
  },
  methods:{
    getpost(){
      axios.get('http://127.0.0.1:8000/api/posts')
        .then(res => {
          console.log(res);
        })
        .catch(err => {
          console.log(err);
        })
    }
  },
  created(){
    this.getpost();
  }
}
</script>

<style>

</style>