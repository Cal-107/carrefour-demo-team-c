<template>
    <section class="category-slider">
        <div class="category-slider-container">
            <div class="category-slider-scroll">
                <CategoryCard
                    v-for="category in categories"
                    :key="`category${category.id}`"
                    :name="category.category_name"
                    :image="category.img"
                />
            </div>
        </div>
        <div class="category-button left active">
            <button @click="moveSlideRight()">
                <i class="fa-solid fa-angle-left"></i>
            </button>
        </div>
        <div class="category-button right">
            <button @click="moveSlideLeft()">
                <i class="fa-solid fa-angle-right"></i>
            </button>
        </div>
    </section>
</template>

<script>
import CategoryCard from "../components/CategoryCard.vue";
import axios from "axios";
export default {
    name: "CategorySlider",
    components: {
        CategoryCard,
    },

    created() {
        this.getCategories();
    },

    data() {
        return {
            categories: null,
            activeSlider: 0,
        };
    },

    methods: {
        getCategories() {
            axios
                .get("http://localhost:8000/api/categories")
                .then((res) => {
                    this.categories = res.data;
                })
                .catch((err) => {
                    console.log(err);
                });
        },

        moveSlideRight() {
            this.activeSlider++;
            if (this.activeSlider > 12) {
                this.activeSlider = 12;
            }
            console.log(this.activeSlider);
        },

        moveSlideLeft() {
            this.activeSlider--;
            if (this.activeSlider < 0) {
                this.activeSlider = 0;
            }
            console.log(this.activeSlider);
        },
    },
};
</script>

<style lang="scss" scoped>
.category-slider {
    height: 160px;
    width: 100%;
    background-color: #f8fafc;
    position: relative;
    padding: 0px 40px;
    overflow: auto;
    overflow: hidden;
    .category-slider-container {
        height: 100%;
        width: 100%;
        .category-slider-scroll {
            height: 100%;
            width: calc(120px * 27);
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }
    }

    .category-button {
        height: 100%;
        width: 70px;
        position: absolute;
        top: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        button {
            height: 30px;
            width: 30px;
            background-color: #0970e6;
            color: white;
            border: none;
            border-radius: 100%;
        }
    }

    .left {
        left: 0;
        background-image: linear-gradient(
            to right,
            #f8fafc,
            #f8fafc,
            #f8fafc,
            #f8fafc,
            rgba(255, 255, 255, 0)
        );
    }

    .right {
        right: 0;
        background-image: linear-gradient(
            to left,
            #f8fafc,
            #f8fafc,
            #f8fafc,
            #f8fafc,
            rgba(255, 255, 255, 0)
        );
    }

    .category-button.active button {
        background-color: #d1d1d1;
    }
}
</style>
