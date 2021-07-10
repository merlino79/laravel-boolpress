<template>
  <div>
      <h1>
        blog
      </h1>

      <!-- loader -->

      <div v-if="!loader" class="container text-center mt-5">
        <div class="lds-hourglass"></div>
      </div>
      <!-- wrapper post -->
      <div v-if="loader">

     
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
                  <li 
                  v-for="i in pagination.last"
                  :key="'i'+i"
                  :class="{'active' : pagination.current === i}"
                  class="page-item"><button
                  @click="getPost(i)"
                  class="page-link">{{ i }}</button></li>
                  
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
      <!-- fine wrapper post -->
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
      pagination: {},
      loader: false
    }
  },
  methods:{
    getPost(page = 1){
      this.loader = false;
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
             this.loader = true;
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
}.lds-hourglass {
  display: inline-block;
  position: relative;
  width: 80px;
  height: 80px;
}
.lds-hourglass:after {
  content: " ";
  display: block;
  border-radius: 50%;
  width: 0;
  height: 0;
  margin: 8px;
  box-sizing: border-box;
  border: 32px solid #fff;
  border-color: rgb(223, 73, 73) transparent rgb(234, 236, 113) transparent;
  animation: lds-hourglass 1.2s infinite;
}
@keyframes lds-hourglass {
  0% {
    transform: rotate(0);
    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
  }
  50% {
    transform: rotate(900deg);
    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
  }
  100% {
    transform: rotate(1800deg);
  }
}

  

</style>