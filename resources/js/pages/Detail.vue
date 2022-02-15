

<template>
    <div class="product-wrapper">

    <section class="product-main">

        <!-- img section -->
        <div class="product-images">
            <div class="alternative-images">
                <img src="https://m.media-amazon.com/images/I/A1vuFgRv4xL._AC_SX522_.jpg" alt="">
            </div>
            <div class="product-main-image">
                <img src="https://m.media-amazon.com/images/I/A1vuFgRv4xL._AC_SX522_.jpg" alt="">
            </div>
        </div>

        <!-- info section -->
        <div class="info-section">

            <div 
                class="product">
                <div class="offer">
                    <p>Offerta</p>
                </div>
                <div class="name">Nome Product</div>
                <div class="info-product">Info product</div>
                <div>category Product</div>
            </div>

            <div class="price">
                <div class="wrap-info-discount">

                    <div class="discount-precentage">
                        45%
                    </div>

                    <div class="pricebook-valid-date">
                        Fino al giorno 20/05/2002
                    </div>

                    <div class="sales">
                        <span class="unit-price">$8,64 al kg/960.0g</span>
                        <span class="value discounted">$ 8,29</span>
                    </div>
                    
                </div>
                <div class="bottonContainer">
                            <button class="product-btn btn">
                                <span>Aggungi</span>
                                <i class="fa-solid fa-cart-shopping"></i>
                            </button>
                </div>
            </div>

        </div>

        </section>

    </div>
</template>

<script>
import axios from 'axios';


export default {
    name: 'Home',
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
            axios.get(`http://127.0.0.1:8000/api/products`)
                 .then(res => {
                     console.log(res.data);

                     if(res.data.not_found) {
                         this.$router.push({ name: 'not-found'})
                     }else{
                         this.products = res.data;
                         console.log(this.products);
                     }
                 })
                 .catch(err => log.error(err));
        }
    }
}
</script>

<style lang="scss" scoped>
    .product-wrapper{
        background-color:#f7f7f7;
        margin-top:30px;
        padding: 30px;

        .product-main{
            width: 80%;
            margin-top: 0 auto;
            display: flex;
            justify-content: center;
            padding-top: 30px;
            padding-bottom: 40px;

            .product-images{
                display: flex;
                justify-content: center;
                margin-left: 20px;
                .alternative-images{
                width: 64px;
                margin-right: 47px;
                min-height: 100%;
                padding-top: 30px;
                padding-bottom: 30px;
                min-width: 70px;
                img{
                    width: 100%;
                }
            }
            
            .product-main-image{

                border: 2px solid #0970e6;
                background-color: #fff;
                border-radius: 6px;
                position: relative;
                font-size: 0;
                max-width: 360px;
                max-height: 360px;
                cursor: zoom-in;
                overflow: hidden;
            }

            }
            .info-section{
                margin-top: 10px;
                margin-left: 80px;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                flex-shrink: 0;
                .product{
                    font-size: 16px;
                    .offer{
                        p{
                            color: #e81e26;
                            text-transform: uppercase;
                            font-weight: 600;
                        }
                    }
                    .name{
                        font-weight: bold;
                    }
                }
                .price{
                    margin-bottom: 50px;
                    display: flex;
                    align-items:center;
                    .product-btn{
                    margin-left: 40px;
                    color: white;
                    margin-top: 20px;
                    padding: 3px 25px;
                    font-size: 1.2rem;
                    background-color: #0970e6;
                    border-radius: 25px;
                    transition: background-color 0.4s;
                    display: flex;
                    align-items: center;
                        span{
                            font-size: 15px;
                            margin-right: 10px;
                        }
    
                        &:hover{
                            background-color: #0e3368;
                        }
                    }
                    
                    .wrap-info-discount{
                        padding: 10px 0;
                        .discount-precentage {
                            display: inline-block;
                            background-color: #e81e26;
                            font-size: 1.2rem;
                            color: #fff;
                            padding: 0 6px;
                            font-weight: 600;
                        }
                        .pricebook-valid-date {
                            display: inline-block;
                            font-size: 1.1rem;
                            color: #e81e26;
                            margin-left: 5px;
                        }
                    }
                    .sales{
                        display: flex;
                        flex-direction: column;
                        margin-top: 10px;
                        font-size: 0.75rem;
                        .value{
                            font-size: 2.3rem;
                            color: #e81e26;
                        }
                    }
                }
            }
        }
    }
</style>