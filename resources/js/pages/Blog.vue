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
            <i>{{formatDate(post.date)}}</i> 
            <p class="card-text">{{ post.content }}</p>
            <a href="#" class="btn btn-primary">Go</a>
        </div>

      </div>

      <div>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
              <li 
                :class="{'disabled': pagination.current === 1}"            
                class="page-item">
               <button
                 @click="getPost(pagination.current -1)"
                 class="page-link">&laquo;</button>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li 
              :class="{'disabled': pagination.current === pagination.last}"
              class="page-item">
                <button 
                  @click="getPost(pagination.current +1)" 
                  class="page-link ">&raquo;</button>
                </li>
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
      posts: [],
      pagination: {}
    }
  },
  methods:{
    getPost(page = 1){
      axios.get('http://127.0.0.1:8000/api/posts',{
        params:{
          page: page
        }
      })
        .then(res => {
          this.posts = res.data.data;
           this.pagination = {
                current: res.data.current_page,
                last: res.data.last_page
             }
          //console.log(res.data.data);
        })
        .catch(err => {
          console.log(err);
        })
    },
    formatDate(date){
            console.log(date);
            let d = new Date(date);
            let dy = d.getDate();
            let m = d.getMonth() + 1;
            let y = d.getFullYear();

            if(dy < 10) dy = '0' + dy;
            if(m < 10) m = '0' + m;

            return `${dy}/${m}/${y}`;
        }
  },
  

        
  created(){
    this.getPost();
  }
}
</script>

<style lang="scss" scoped>
.badge-success{
  line-height: 30px;
}
  

</style>