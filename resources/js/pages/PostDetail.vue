<template>
  <div>
    <h3>Dettagli post</h3>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  name: 'PostDetail',
  data(){
    return{
      post:{},
    }
  },
   mounted(){
          //console.log(this.$route.params.slug);
           axios.get('http://127.0.0.1:8000/api/posts/'+this.$route.params.slug)
                .then(res => {
                    console.log(res.data);

                    
                })
                .catch(err => {
                    console.log(err);
                })
    }
}
</script>

<style>

</style>