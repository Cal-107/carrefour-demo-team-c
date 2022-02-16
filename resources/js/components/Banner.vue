<template>
    <section class="mt-5">
        <!-- hero image -->
        <div>
            <div class="container-fluid heroContainer">
                <img
                    src="https://www.carrefour.it/on/demandware.static/-/Sites/default/dwa3efb334/banner/suggestion-banner/carrefour-club-novita/NOVITA_CRF_CLUB_sconto_pdv_ecom_Inner_D.jpg"
                    alt=""
                />
            </div>
        </div>

        <!-- promo banner -->
        <div class="mt-5">
            <div class="container PromoContainer">
                <div class="row">
                    <div class="col-6">
                        <img
                            class="mb-2"
                            src="https://www.carrefour.it/on/demandware.static/-/Sites/default/dw79599c54/banner/main-carousel/food/placeholder/carrefour-bio/Bannerpiccolo_BIO_Placheholder_mob.jpg"
                            alt="carrefour-promo"
                        />
                        <img
                            src="https://www.carrefour.it/on/demandware.static/-/Sites/default/dwc4c591fc/banner/main-carousel/food/banner_piccolo/capitan-findus/HOMEPAGE_MOBILE_768X200_2.jpg"
                            alt="carrefour-promo"
                        />
                    </div>

                    <div class="col-6">
                        <img
                            src="https://www.carrefour.it/on/demandware.static/-/Sites/default/dwc815521a/banner/main-carousel/food/placeholder/terre-d-italia/Bannergrande_mob_02.jpg"
                            alt=""
                        />
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "Banner",
};
</script>

<style lang="scss" scoped>
section {
    .heroContainer {
        text-align: center;

        img {
            width: 80%;
        }
    }

    .PromoContainer {
        img {
            width: 100%;
            border-radius: 15px;
        }
    }
}
</style>
