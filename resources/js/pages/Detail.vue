<template>
    <div class="product-wrapper">
        <section class="product-main">
            <!-- img section -->
            <div class="product-images">
                <div class="alternative-images">
                    <img
                        :src="product.image"
                        :alt="product.name"
                    />
                </div>
                <div class="product-main-image">
                    <img
                        :src="product.image"
                        :alt="product.name"
                    />
                </div>
            </div>

            <!-- info section -->
            <div class="info-section">
                <div class="product">
                    <div class="offer">
                        <p>Offerta</p>
                    </div>
                    <h2 class="name">{{ product.brand }}</h2>
                    <h3 class="info-product">{{ product.name }}</h3>
                    <h5 v-if="(product.category)">
                        {{ product.category.category_name}}
                    </h5>
                </div>

                <div class="price">
                    <div class="wrap-info-discount">
                        <div class="discount-percentage">45%</div>

                        <div class="pricebook-valid-date">
                            Fino al giorno 20/05/2002
                        </div>

                        <div class="sales">
                            <span class="unit-price">€ {{ product.price_per_kg }} al kg/ {{ product.weight }} kg</span>
                            <span class="value discounted">€ {{ product.price }}</span>
                        </div>
                    </div>
                    <div class="bottonContainer">
                        <button class="product-btn btn">
                            <span>Aggiungi</span>
                            <i class="fa-solid fa-cart-shopping"></i>
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "Detail",
    components: {},

    data() {
        return {
            product: null,
        };
    },

    created() {
        this.getProducts();
    },

    methods: {
        getProducts() {
            axios
                .get(`http://127.0.0.1:8000/api/products/${this.$route.params.slug}`)
                .then((res) => {
                    // this.product = res.data
                    // if (res.data.not_found) {
                    //     this.$router.push({ name: "not-found" });
                    // } else {
                        this.product = res.data;
                        console.log(`here ${this.product}`);
                    // }
                })
                .catch((err) => log.error(err));
        },
    },
};
</script>

<style lang="scss" scoped>
.product-wrapper {
    background-color: #f7f7f7;
    margin-top: 30px;
    padding: 30px;

    .product-main {
        margin-top: 0 auto;
        display: flex;
        justify-content: center;
        padding-top: 30px;
        padding-bottom: 40px;

        .product-images {
            display: flex;
            justify-content: center;
            margin-left: 20px;
            .alternative-images {
                width: 64px;
                margin-right: 47px;
                min-height: 100%;
                padding-top: 30px;
                padding-bottom: 30px;
                min-width: 70px;
                img {
                    width: 100%;
                }
            }

            .product-main-image {
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
        .info-section {
            margin-top: 10px;
            margin-left: 80px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            flex-shrink: 0;
            .product {
                font-size: 16px;
                .offer {
                    p {
                        color: #e81e26;
                        text-transform: uppercase;
                        font-weight: 600;
                    }
                }
                .name {
                    font-weight: bold;
                }
            }
            .price {
                margin-bottom: 50px;
                display: flex;
                align-items: center;
                .product-btn {
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
                    span {
                        font-size: 15px;
                        margin-right: 10px;
                    }

                    &:hover {
                        background-color: #0e3368;
                    }
                }

                .wrap-info-discount {
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
                .sales {
                    display: flex;
                    flex-direction: column;
                    margin-top: 10px;
                    font-size: 0.75rem;
                    .value {
                        font-size: 2.3rem;
                        color: #e81e26;
                    }
                }
            }
        }
    }
}
</style>
