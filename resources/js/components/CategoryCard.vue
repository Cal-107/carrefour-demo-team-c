<template>
    <section class="card" :class="{red: (classStyle === 'red'), green: (classStyle === 'green')}">
        <div class="logo">
            <img :src="image" alt="">
        </div>
        <div class="title">
            <h4>{{name}}</h4>
        </div>
    </section>
</template>

<script>
export default {
    name: 'CategoryCards',
    props: {
        name: String,
        image: String,
        classStyle: String,
    }
}
</script>

<style lang="scss" scoped>

.card {
    height: 105px;
    width: 105px;
    border-radius: 10px;
    margin: 0px 5px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    position: relative;
    box-shadow: 0 8px 20px rgba(0,0,0,.1);
    cursor: pointer;
    transition: transform .3s ease-in-out;
    .logo {
        height: 60%;
        width: 100%;

        display: flex;
        align-items: center;
        justify-content: center;
        img {
            height: 60%;
        }
    }
    .title {
        height: 40%;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 5px;
       h4 {
           font-size: 12px;
           font-weight: 600;
           color: #617185;
           text-align: center;
           
           
       }
    }

    &:hover {
       transform: translateY(-10px);
       .logo {
           img {
               filter: invert(42%) sepia(93%) saturate(1352%) hue-rotate(200deg) brightness(83%) contrast(119%);
           }
       }
       .title {
           h4 {
               color: #0970e6;
           }
       }
    }

}

.red {
    background-color: #981f2d;
    .logo {
        img {
            height: 150%;
            height: 150%;
            margin-top: 35px;
        }
    }
        .title {
            h4 {
                color: white;
            }
        }
    &:hover {
        .logo {
            img {
                filter: none
            }
        }
        .title {
            h4 {
                color: white;
            }
        }
    }
}

.green {
    background-color: #7c7d31;
    .logo {
        img {
            height: 150%;
            height: 150%;
            margin-top: 35px;
        }
    }
    .title {
        h4 {
            color: white;
        }
    }
       &:hover {
        .logo {
            img {
                filter: none
            }
        }
        .title {
            h4 {
                color: white;
            }
        }
    }

}
</style>

