<template>
  <div>
      <h1>
        blog
      </h1>
      <div
      v-for="post in posts"
      :key="'p'+post.id"
       class="card mb-3">
        
        <div class="card-body">
            <h5 class="card-title">{{post.title}}</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>

      </div>
      
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'blog',
  data(){
    return{
      post: []
    }
  },
  methods:{
    getpost(){
      axios.get('http://127.0.0.1:8000/api/posts')
        .then(res => {
          this.post = res.data.data;
          //console.log(res.data.data);
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