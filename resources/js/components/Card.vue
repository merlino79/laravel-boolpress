<template>
   <div class="card mb-3">

      <div class="card-body">
        
           <div class="d-flex justify-content-between">
                <h5 class="card-title">{{title}}</h5>
                <span class="badge badge-success ">{{ category }}</span>
          </div>

         <i>{{ date}}</i> 
         <p class="card-text">{{ truncateText }}</p>
          <router-link class="btn btn-primary" :to="{name: 'PostDetail', params:{slug}}">Vedi post</router-link>
        </div>

   </div>
</template>

<script>
export default {
  name: 'Card',
  props:[
    'title',
    'category',
    'date',
    'content',
    'slug'
  ],
  data(){
    return {
       maxTextLength:50
    }
  },
  computed:{
        truncateText(){
            let text = this.content;
            if(text.length > this.maxTextLength){
                return text.substr(0,this.maxTextLength) + '...';
            }
            return text;
        }
    }
}
</script>

<style lang="scss" scoped>
  .badge-success{
  line-height: 30px;
}
</style>