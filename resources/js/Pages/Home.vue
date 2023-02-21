<script setup>
import LayoutGeneral from "@/Pages/Layouts/LayoutGeneral.vue";
import { Carousel, Navigation, Slide } from "vue3-carousel";
import "vue3-carousel/dist/carousel.css";
import { ref } from "vue";
import CardProduct from "@/Pages/Components/CardProduct.vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps(["banner", "product"]);

const bannerConfig = ref({
    autoplay: 4000,
    "wrap-around": true,
});
</script>

<template>
    <LayoutGeneral>
        <div class="max-w-screen-xl mx-auto px-4 sm:px-6 md:px-8">
            <!-- Banner -->
            <Carousel v-bind="bannerConfig">
                <Slide v-for="banner in props.banner" :key="banner.id">
                    <div class="carousel__item">
                        <img
                            :src="banner.image"
                            alt="Banner"
                            class="rounded-lg"
                        />
                    </div>
                </Slide>

                <template #addons>
                    <Navigation />
                </template>
            </Carousel>
            <!-- End Banner -->

            <!-- Product -->
            <h1 class="font-semibold text-xl mt-5">Product yang kamu sukai!</h1>
            <p class="text-gray-500 text-sm">
                Yuk Checkout sekarang juga sebelum kehabisan stok.
            </p>

            <div class="grid grid-cols-2 md:grid-cols-5 gap-5 mt-5">
                <Link
                    v-for="product in props.product"
                    :key="product.id"
                    class="border shadow rounded-lg hover:shadow-md transition"
                    :href="'/product/' + product.slug"
                >
                    <CardProduct :product="product" />
                </Link>
            </div>
            <!-- End Product -->
        </div>
    </LayoutGeneral>
</template>
