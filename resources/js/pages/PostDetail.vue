<template>
<div>
  <div v-if="!loaded">
    <Loader />
  </div>
  <div v-else class="card mb-3">

      <div class="card-body">
        
           <div class="d-flex justify-content-between">
                <h5 class="card-title">{{post.title}}</h5>
                <span v-if="post.category" class="badge badge-success ">{{ post.category.name }}</span>
          </div>

         <i>{{ (post.created_at) }}</i> 
         <p class="card-text">{{post.content }}</p>
         <div>
           tag:
            <i
            tag
            v-for="tag in post.tags"
            :key="'t'+tag.id"
            >{{ tag.name }}</i>
         </div>
           
        </div>
        <div>
          <router-link class="nav-link" :to="{name: 'blog'}">Blog</router-link>
        </div>

   </div>

</div>

 
</template>

<script>
import axios from 'axios';
import formatDate from '../classes/FormatDate';
import Loader from '../components/Loader.vue';
export default {
  name: 'PostDetail',
  components:{
    Loader
  },
  data(){
    return{
      post:{},
      loaded: false,
      formatDate
    }
  },
   mounted(){
          //console.log(this.$route.params.slug);
           axios.get('http://127.0.0.1:8000/api/posts/'+this.$route.params.slug)
                .then(res => {
                    console.log(res.data);
                    if(res.data.success){
                      this.post = res.data.data;
                      this.loaded = true;
                    }else{
                      this.$router.push({name: 'error404'})
                    }
                    
                })
                .catch(err => {
                    console.log(err);
                })
    },
    
}
</script>

<style lang="scss">
  .badge-success{
  line-height: 30px;
  }
</style>