<template>

    <div class="container-fluid mt-5 p-5">
        <h2> I NOSTRI PRODOTTI </h2>

        <ul class=" product-cont flex-wrap d-flex">
            <li>
                <a href="/">
                    <div class="productCard">
                        <!-- brand -->
                        <h5 class="mt-2">Carrefour</h5>

                        <!-- name -->
                        <div class="mt-2">Nome del prodotto</div>

                        <!-- img -->
                        <div class="product-image">
                            <img src="https://picsum.photos/id/237/200/300" alt="product-image">
                        </div>

                        <!-- prise for kg -->
                        <div class="productKg">927 euro al kg dfjhh</div>

                        <!-- prise -->
                        <div class="price">$ 5,56</div>

                        <!-- btn-carrello -->
                        <div class="bottonContainer">
                            <button class="product-btn btn"><i class="fa-solid fa-cart-shopping"></i></button>
                        </div>

                    </div>
                </a>
            </li>
            <li>
                <a href="/">
                    <div class="productCard">
                        dihisujhdfiuhgkih
                        <!-- brand -->
                        <!-- name -->
                        <!-- img -->
                        <!-- prise for kg -->
                        <!-- prise -->
                    </div>
                </a>
            </li>
        </ul>
    </div>

</template>

<script>
import axios from 'axios';

export default {
     name: 'App',
     components: {},
     data() {
        return {
            products: null,
        }
    },
    created() {
        this.getProducts();
    },
    methods: {
        getProducts() {
            axios.get(`http://127.0.0.1:8000/api/product`)
                 .then(res => {
                     console.log(res.data);
                     console.log('ciidty');

                    //  if(res.data.not_found) {
                    //      this.$router.push({ name: 'not-found'})
                    //  }else{
                    //      this.post = res.data;
                    //  }
                 })
                 .catch(err => log.error(err));
        }
    }
}
</script>

<style lang="scss">

ul{
    margin: 0;
}

h2{
    margin-left: 15%;
    color: #0e3368;
}

h5{
    font-weight: bold;
}

.product-cont{
    width: 70%;
    margin: 50px auto;
    color: #0e3368;

    li{
        width: 245px;
        margin: 10px 5px 10px 5px;
        padding: 15px;
        list-style: none;
        border: 1px solid rgb(202, 202, 202);
        border-radius: 10px;

        a{
            text-decoration: none;
            color: currentColor;
        }

        .product-image{
            width: 60%;
            height:140px;
            margin: 15px auto;

            img{
               width: 100%;
               height: 100%;
               object-fit: contain;
            }
        }

        .productKg{
            margin-top: 30px;
            color: grey;
        }

        .price{
            font-size: 1.2rem;
            font-weight: bolder;
        }

        .bottonContainer{
            text-align: right;
        }
        .product-btn{
            color: white;
            margin-top: 20px;
            padding: 3px 25px;
            font-size: 1.2rem;
            background-color: #0970e6;
            border-radius: 25px;
            transition: background-color 0.4s;
            
            &:hover{
                background-color: #0e3368;
            }
        }
        
    }
}


</style>