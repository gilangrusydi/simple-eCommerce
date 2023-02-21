<script setup>
import LayoutGeneral from "@/Pages/Layouts/LayoutGeneral.vue";
import { Link } from "@inertiajs/vue3";
import { computed, ref, watch } from "vue";

const props = defineProps(["product"]);
const product = computed(() => props.product);
const qty = ref(1);

const productDescription = computed(() => {
    return product.value.description
        .split("\n")
        .map((s) => (s.length < 1 ? "<br /><br />" : s)).join``;
});
const format_price = (price) => {
    return parseFloat(price).toLocaleString("id-ID");
};

watch(qty, () => {
    if (`${qty.value}`.length < 1) qty.value = 1;
    else if (qty.value > product.value.qty_remain)
        qty.value = product.value.qty_remain;
});

const setQty = (state) => {
    state === "increase" ? qty.value++ : qty.value--;
};
</script>

<template>
    <LayoutGeneral>
        <div class="max-w-screen-xl mx-auto px-4 sm:px-6 md:px-8">
            <!-- Breadcrumb -->
            <div class="flex gap-x-2 text-sm">
                <Link href="/product" class="text-blue-500 hover:underline"
                    >Product</Link
                >
                <div>
                    <svg
                        aria-hidden="true"
                        class="w-6 h-6 text-gray-400"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"
                        ></path>
                    </svg>
                </div>
                <div class="text-gray-500">
                    {{ product.name }}
                </div>
            </div>

            <div class="grid grid-cols-12 gap-x-6 mt-8">
                <div class="col-span-3">
                    <img :src="'/' + product.image" class="rounded" />

                    <button
                        class="w-full border border-blue-500 py-2 rounded-md mt-5 bg-blue-500 text-white font-semibold"
                        type="button"
                    >
                        (+) Tambahkan Ke Keranjang
                    </button>
                </div>
                <div class="col-span-6">
                    <div
                        class="bg-blue-300 inline-block px-2 py-1 rounded-lg font-extrabold text-sm"
                    >
                        {{ product.category }}
                    </div>
                    <h1 class="font-bold text-2xl">{{ product.name }}</h1>
                    <div
                        class="break-words mt-2"
                        v-html="productDescription"
                    ></div>
                </div>
                <div class="col-span-3">
                    <div class="border px-5 py-3 rounded shadow">
                        <div class="text-sm font-bold">
                            Stok sisa {{ product.qty_remain }}
                        </div>
                        <div class="font-bold text-2xl mt-2">
                            Rp.{{ format_price(product.price) }}
                        </div>
                        <div class="grid grid-cols-6 px-8 my-4">
                            <div
                                class="bg-slate-200 px-2 py-1 text-3xl text-center col-span-1 w-full cursor-pointer select-none"
                                @click="setQty('decrease')"
                            >
                                -
                            </div>
                            <input
                                type="number"
                                min="1"
                                class="border rounded px-2 col-span-4"
                                v-model="qty"
                            />
                            <div
                                class="bg-slate-200 px-2 py-1 text-3xl text-center col-span-1 w-full cursor-pointer select-none"
                                @click="setQty('increase')"
                            >
                                +
                            </div>
                        </div>
                        <div>
                            <button
                                type="button"
                                class="bg-blue-500 w-full text-white py-2 rounded-md font-extrabold"
                            >
                                Beli Sekarang
                            </button>
                        </div>

                        <div class="text-gray-400 text-sm text-center mt-5">
                            {{ qty }} Barang x Rp.{{
                                format_price(product.price)
                            }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </LayoutGeneral>
</template>
