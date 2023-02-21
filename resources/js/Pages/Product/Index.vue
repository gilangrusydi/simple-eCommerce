<script setup>
import Layout from "@/Pages/Layouts/LayoutGeneral.vue";
import CardProduct from "@/Pages/Components/CardProduct.vue";
import { Link, router } from "@inertiajs/vue3";
import { computed, ref } from "vue";

const props = defineProps(["products", "categories", "request"]);
const selectedCategory = ref(props.request.category || null);
const categories = computed(() => props.categories);
const selectedPrice = ref(props.request.price || null);
const prices_range = ref([
    {
        value: 1,
        text: "Rp.0 - Rp.50.000",
    },
    {
        value: 2,
        text: "Rp.100.000 - Rp.200.000",
    },
    {
        value: 3,
        text: "Rp.500.000 - Rp1.000.000",
    },
    {
        value: 4,
        text: "> Rp.1.000.000",
    },
]);

const setCategory = (category) => {
    selectedCategory.value =
        selectedCategory.value === category ? null : category;
    replaceData();
};
const setPrice = (price) => {
    selectedPrice.value = selectedPrice.value === price ? null : price;
    replaceData();
};

const replaceData = () => {
    const categoryParam = selectedCategory.value
        ? `?category=${selectedCategory.value}`
        : "";
    const priceParam = selectedPrice.value
        ? (categoryParam ? "&" : "?") + `price=${selectedPrice.value}`
        : "";
    router.get(
        `/product${categoryParam + priceParam}`,
        {},
        {
            replace: true,

            preserveState: true,
            preserveScroll: true,
        }
    );
};
</script>

<template>
    <Layout>
        <div
            class="max-w-screen-xl mx-auto px-4 sm:px-6 md:px-8 grid grid-cols-12 gap-5"
        >
            <div class="col-span-3">
                <div class="shadow-md border px-2 py-3 rounded-md divide-y">
                    <div>
                        <label
                            for=""
                            class="text-sm font-extrabold text-gray-700"
                            >Urutkan Berdasarkan Kategori</label
                        >
                        <div class="mt-2">
                            <button
                                type="button"
                                v-for="category in categories"
                                :key="category"
                                class="px-4 py-2 rounded-xl cursor-pointer inline-block mr-2 mb-2"
                                @click="setCategory(category)"
                                :class="{
                                    'bg-blue-100':
                                        category === selectedCategory,
                                    'bg-slate-100':
                                        category !== selectedCategory,
                                }"
                            >
                                {{ category }}
                            </button>
                        </div>
                    </div>
                    <div class="pt-3">
                        <label
                            for=""
                            class="text-sm font-extrabold text-gray-700"
                            >Urutkan Berdasarkan Harga</label
                        >
                        <div class="mt-2">
                            <button
                                type="button"
                                v-for="price in prices_range"
                                class="px-4 py-2 rounded-lg cursor-pointer mb-2"
                                @click="setPrice(price.value)"
                                :class="{
                                    'bg-blue-100':
                                        price.value === selectedPrice,

                                    'bg-slate-100':
                                        price.value !== selectedPrice,
                                }"
                            >
                                {{ price.text }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-9">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-5 mt-5">
                    <Link
                        v-for="product in props.products"
                        :key="product.id"
                        class="border shadow rounded-lg hover:shadow-md transition"
                        :href="'/product/' + product.slug"
                    >
                        <CardProduct :product="product" />
                    </Link>
                </div>
            </div>
        </div>
    </Layout>
</template>
