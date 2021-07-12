<template>
  <div>
      <h1>
        blog
      </h1>

      <!-- loader -->

      <div v-if="!loader" class="container text-center mt-5">
      <Loader />
      </div>
      <!-- wrapper post -->
      
      <div v-if="loader">

          <Card 
           v-for="post in posts"
          :key="'p'+post.id"
          :title="post.title"
          :content="post.content"
          :category="post.category"
          :date="FormatDate.format(post.date)"
          :slug="post.slug"
          />
         
          <!-- paginazione -->
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
import Loader from '../components/Loader.vue';
import Card from '../components/Card.vue';
import FormatDate from '../classes/FormatDate.js';


export default {
  name: 'Blog',
  components:{
    Loader,
    Card
  },
  data(){
    return{
      posts: [],
      pagination: {},
      FormatDate,
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
    // formatDate(date){
    //         //console.log(date);
    //         let d = new Date(date);
    //         let dy = d.getDate();
    //         let m = d.getMonth() + 1;
    //         let y = d.getFullYear();

    //         if(dy < 10) dy = '0' + dy;
    //         if(m < 10) m = '0' + m;

    //         return `${dy}/${m}/${y}`;
    //     }
  },
  

        
  created(){
    this.getPost();
  }
}
</script>

<style lang="scss" scoped>

  

</style>