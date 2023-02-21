<script setup>
const props = defineProps(["product"]);

const str_limit = (str, limit, suffix) => {
    return str.slice(0, limit) + (limit >= str.length ? "" : suffix);
};

const format_price = (price) => {
    return parseFloat(price).toLocaleString("id-ID");
};
</script>

<template>
    <img :src="product.image" class="w-full rounded-lg" alt="Gambar Produk" />
    <div
        class="mt-3 px-2 text-sm font-extrabold bg-blue-100 inline-block rounded-r"
    >
        {{ product.category }}
    </div>
    <div class="px-2 mt-1 text-gray-600">
        {{ str_limit(product.name, 45, "...") }}
    </div>
    <div class="my-2 px-2 text-lg text-gray-600 font-bold">
        Rp.{{ format_price(product.price) }}
    </div>
    <div class="text-sm px-2 mb-3 text-gray-400">Terjual 1000+</div>
</template>
