<template>
    <div>
        <CategorySlider />

        <section class="delivery">
            <span
                >Imposta <strong>metodo</strong> e <strong>indirizzo</strong> di
                consegna</span
            >
        </section>
        <div class="contrinaer-fluid">
            <Banner />
            <div class="mt-5 p-5">
                <h2>I NOSTRI PRODOTTI</h2>

                <ul class="product-cont flex-wrap d-flex">
                    <li
                        v-for="product in products"
                        :key="`product-${product.id}`"
                    >
                        <router-link
                            :to="{
                                name: 'detail',
                                params: { slug: product.slug },
                            }"
                        >
                            <div class="productCard">
                                <!-- brand -->
                                <h5 class="mt-2">{{ product.brand }}</h5>

                                <!-- name -->
                                <div class="mt-2">{{ product.name }}</div>

                                <!-- img -->
                                <figure class="product-image">
                                    <img
                                        :src="product.image"
                                        :alt="product.name"
                                    />
                                </figure>

                                <!-- price for kg/weight -->
                                <div class="productKg">
                                    € {{ product.price_per_kg }} al kg/{{
                                        product.weight
                                    }}
                                    kg
                                </div>

                                <!-- price -->
                                <div class="price">€ {{ product.price }}</div>

                                <!-- btn-carrello -->
                                <div class="bottonContainer">
                                    <button class="product-btn btn ms-3">
                                        <i
                                            class="fa-solid fa-cart-shopping"
                                        ></i>
                                    </button>
                                </div>
                            </div>
                        </router-link>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    </div>
</template>

<script>
import axios from "axios";
import CategorySlider from "../components/CategorySlider.vue";
import Banner from "../components/Banner";

export default {
    name: "Home",
    components: {
        CategorySlider,
        Banner,
    },
    data() {
        return {
            products: null,
        };
    },

    created() {
        this.getProducts();
    },

    methods: {
        getProducts() {
            axios.get(`http://127.0.0.1:8000/api/products`).then((res) => {
                console.log(res.data);
                this.products = res.data;

                //  if(res.data.not_found) {
                //      this.$router.push({ name: 'not-found'})
                //  }else{
                //      this.post = res.data;
                //  }
            });
            //  .catch(err => log.error(err));
        },
    },
};
</script>

<style lang="scss" scoped>
ul {
    margin: 0;
}

h2 {
    margin-left: 15%;
    color: #0e3368;
}

h5 {
    font-weight: bold;
}

.product-cont {
    width: 70%;
    margin: 50px auto;
    color: #0e3368;

    li {
        width: 245px;
        margin: 10px 5px 10px 5px;
        padding: 15px;
        list-style: none;
        border: 1px solid rgb(202, 202, 202);
        border-radius: 10px;

        a {
            text-decoration: none;
            color: currentColor;
        }

        .product-image {
            width: 60%;
            height: 140px;
            margin: 15px auto;

            img {
                width: 100%;
                height: 100%;
                object-fit: contain;
            }
        }

        .productKg {
            margin-top: 30px;
            color: grey;
        }

        .price {
            font-size: 1.2rem;
            font-weight: bolder;
        }

        .bottonContainer {
            text-align: right;
        }
        .product-btn {
            color: white;
            margin-top: 20px;
            padding: 3px 25px;
            font-size: 1.2rem;
            background-color: #0970e6;
            border-radius: 25px;
            transition: background-color 0.4s;

            &:hover {
                background-color: #0e3368;
            }
        }
    }
}

.delivery {
    background-color: #eef5fb;
    padding: 0.5rem;
    color: #1b3d79;
    .toggler {
        content: "";
        display: block;
        width: 22px;
        height: 22px;
        border-radius: 50%;
        background: transparent;
        cursor: pointer;
        position: absolute;
        box-shadow: 0 0 0 #0970e6;
        left: 17px;
        animation: pulse 4s infinite;
    }
}
</style>
