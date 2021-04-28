<template>
   <div>
      <div class="container-fluid hero-section d-flex align-content-center justify-content-center flex-wrap ml-auto">
         <h2 class="title">Bem vindo a BigStore</h2>
      </div>

      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="row">
                   <div class="col-md-4 product-box" v-for="(produto,index) in produtos" @key="index">
                       <router-link :to="{ path: '/produtos/'+produto.id}">
                           <img :src="produto.image" :alt="produto.nome">
                           <h5><span v-html="produto.nome"></span>
                               <span class="small-text text-muted float-right">$ {{produto.preco}}</span>
                           </h5>

                           <button class="col-md-4 btn btn-sm btn-primary float-right">Comprar Agora</button>
                       </router-link>
                   </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</template>

<script>
  export default {
      data(){
          return {
              produtos : []
          }
      },

      mouted(){
        axios.get("api/products/").then(response => this.products = response.data)
      }
  }
</script>
<style scoped>
  .small-text{
      font-size: 14px;
  }
  .product-box{
      border: 1px solid #cccccc;
      padding: 10px 15px;
  }
  .hero-section{
      height: 30vh;
      background: #ababab;
      align-items: center;
      margin-bottom: 20px;
      margin-top: 20px;
  }
  .title{
      font-size: 60px;
      color: #ffffff;
  }
</style>
