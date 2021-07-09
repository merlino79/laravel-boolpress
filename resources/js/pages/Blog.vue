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
          <div class="d-flex justify-content-between">
            <h5 class="card-title">{{post.title}}</h5>
            <span class="badge badge-success ">{{ post.category }}</span>
          </div>
            <i>{{ post.date }}</i> 
            <p class="card-text">{{ post.content }}</p>
            <a href="#" class="btn btn-primary">Go</a>
        </div>

      </div>

      <div>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
              <li class="page-item"><a class="page-link" href="#">Previous</a></li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
          </nav>
      </div>
      
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'Blog',
  data(){
    return{
      posts: []
    }
  },
  methods:{
    getpost(){
      axios.get('http://127.0.0.1:8000/api/posts')
        .then(res => {
          this.posts = res.data.data;
          //console.log(res.data.data);
        })
        .catch(err => {
          console.log(err);
        })
    }
  },
  formatDate(date){
            let d = new Date(date);
            let dy = d.getDate();
            let m = d.getMonth() + 1;
            let y = d.getFullYear();

            if(dy < 10) dy = '0' + dy;
            if(m < 10) m = '0' + m;

            return `${dy}/${m}/${y}`;
        },
        
  created(){
    this.getpost();
  }
}
</script>

<style>

</style>