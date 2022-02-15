<template>
<header>
     <!-- headerBunner  -->
    <div class="headerBunner d-flex justify-content-between align-items-center p-1 px-4">
        <div class="HeaderBunnerLeft">
            <a href="/">Lavora con noi</a>
        </div>
        <div class="HeaderBunnerRight ">
            <ul class="d-flex align-items-center">
                <li>
                    <a href="/">Serve aiuto?</a>
                </li>
                <li>
                    <a href="/">Volantini</a>
                </li>
                <li>
                    <a href="/">Punti vendita</a>
                </li>
                <li>
                    <a href="/">Servizi</a>
                </li>
                <li>
                    <a href="/">Carta Carrefour Findomestic</a>
                </li>
            </ul>
        </div>
    </div>


    <!-- header-top -->
    <div class="d-flex pt-4 pb-2 px-3 mx-3 justify-content-between align-items-center">
        <div class="header-logo ">
            <a href="/" class="d-flex">
                <img class="img-fluid" src="https://cdn.worldvectorlogo.com/logos/carrefour-supermarket-logo.svg" alt="">
            </a>
        </div>
        <!-- search-bar -->
        <div class="search-bar-container mx-2">
            <form class="searchForm">
                 <input class="SearchBar Search" id="search" type="text" placeholder="Di cosa hai bisogno?" required>
                 <input class="SearchBar" id="submit" type="submit" value="Search">
            </form>
        </div>

        <!-- header-right -->
        <div class="right-header d-flex align-items-center">
            <!--badge  -->
             <div class="paybackBadge mx-5">
                 <a href="/">
                    <div class="payback-top">PAYBACK</div>
                    <div class="payback-bottom">Scopri Payback</div>
                 </a>
            </div>
            <!-- carrello -->
            <div class="minicart mx-4">
                <a href="/">
                      <i class="fas fa-shopping-cart"></i>
                </a>
            </div>
        </div>
    </div>
    
    <!-- header-bottom -->

    <div class="p-2 mx-2">
        <div class="headerNavRight">
            <ul class="d-flex align-items-center">
                <li>
                    <router-link class="link-header" :to="{name: 'home'}">Spesa Online</router-link>
                    
                </li>
                <li>
                    <a href="\">Promozioni</a>
                </li>
            </ul>
        </div>
    </div>
</header>


</template>

<script>
export default {
    name: 'Header',
}
</script>

<style lang="scss" scoped>

header{

    a{
        color: black;
        text-decoration: none;
        text-decoration: none;

        &:hover {
            color: currentColor;
            text-decoration: none;
        }
    }

    ul{
        list-style: none;
        margin: 0;
    }

    .headerBunner{
        background-color: #1b3d79;
        color: white;
        font-size: 14px;

        a {
            color: white;

            &:hover{
                color: #0970e6;
            }
        }

        .HeaderBunnerRight{
            ul{


                li{
                    margin: 0 10px;

                    a{
                        padding-right: 20px;
                        border-right: 1px solid white;
                        transition: color 0.4s;

                        &:hover{
                            color: #0970e6;
                        }
                    }
                }
            }
        }
    }

    
    
    .header-logo{
        a{
            img{
                width: 200px;
            }
        }
    }

    .search-bar-container{
        max-width: 836px;
        width: 50%;

        .searchForm{
            max-width: 100%;

            .Search{
                width: 80%;
            }

            .SearchBar{
                padding: 7px 10px 7px 10px;
                color: #929292;
                border: 1px solid #d2d2d2;
                border-radius: 50px;
                
            }
        }
    }


    .paybackBadge{
        line-height: 1;

        .payback-top{
            font-size: 12px;
            color: #4c6696;
        }
        .payback-bottom{
            color: #0970e6;
            font-size: 18px;
            font-weight: bold;
        }
    }

    .minicart{
        a{
            i{
                font-size: 25px;
                margin-right: 10px;
                color: #0970e6;
            }
        }
    }


    .headerNavRight{
        font-size: 17px;


        li{       
            margin-right: 25px;   
            .link-header{
                color: #0e3368;
                transition: color 0.4s;
                &:hover{
                    color: #0970e6;
            }

            }
        }
    }       
}

</style>