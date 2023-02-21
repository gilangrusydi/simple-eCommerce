<script setup>
import LayoutGeneral from "@/Pages/Layouts/LayoutGeneral.vue";
import { computed, ref } from "vue";
import { usePage } from "@inertiajs/vue3";

const user = computed(() => usePage().props.user);

const selectedTab = ref("transaksi");
const setTab = (tab) => {
    selectedTab.value = tab;
};

const profileImage = ref(_base_url + "/images/bighead.svg");
</script>

<template>
    <LayoutGeneral>
        <div
            class="max-w-screen-xl mx-auto px-4 sm:px-6 md:px-8 grid grid-cols-12 gap-4"
        >
            <div class="col-span-4">
                <div class="text-center">
                    <img
                        :src="profileImage"
                        class="profile-picture"
                        alt="Profile Picture"
                    />
                </div>
                <div class="text-2xl font-bold mt-2">
                    {{ user.name }}
                </div>
                <div class="text-gray-500 -mt-1">{{ user.email }}</div>
            </div>
            <div class="col-span-8">
                <div class="flex gap-x-7 border-b-2 border-slate-200">
                    <div
                        class="cursor-pointer pb-1 transition"
                        :class="{
                            'border-b-2 border-black font-bold':
                                selectedTab === 'transaksi',
                        }"
                        @click="setTab('transaksi')"
                    >
                        Transaksi
                    </div>
                    <div
                        class="cursor-pointer pb-1 transition"
                        :class="{
                            'border-b-2 border-black font-bold':
                                selectedTab === 'cart',
                        }"
                        @click="setTab('cart')"
                    >
                        Cart
                    </div>
                </div>
                <div class="pt-4">
                    <template v-if="selectedTab === 'transaksi'">
                        <div class="filter flex gap-x-2">
                            <div
                                class="bg-blue-200 font-semibold px-4 py-2 rounded-xl cursor-pointer"
                            >
                                Semua
                            </div>
                            <div
                                class="bg-slate-100 px-4 py-2 rounded-xl cursor-pointer"
                            >
                                Menunggu Pembayaran
                            </div>
                            <div
                                class="bg-slate-100 px-4 py-2 rounded-xl cursor-pointer"
                            >
                                Diproses
                            </div>
                            <div
                                class="bg-slate-100 px-4 py-2 rounded-xl cursor-pointer"
                            >
                                Selesai
                            </div>
                        </div>
                        <div>
                            <div
                                v-for="i in 3"
                                class="border my-3 px-4 py-4 rounded-lg"
                            >
                                <div
                                    class="text-sm font-extrabold inline-block"
                                >
                                    INV20101231-009
                                </div>

                                <div
                                    class="inline-block bg-orange-200 px-2 py-1 rounded-lg text-sm ml-2 font-bold -mt-3"
                                >
                                    Belum Dibayar
                                </div>
                                <div class="pl-3 mt-2">
                                    <h1>
                                        Tas Selempang Torch Nikaho Caviar Black
                                        / Sling Bag Torch / Tas Pria
                                    </h1>
                                    <div class="text-sm text-gray-500">
                                        Rp.250.0000 (1 Barang)
                                    </div>
                                </div>
                            </div>
                            <div
                                v-for="i in 3"
                                class="border my-3 px-4 py-4 rounded-lg"
                            >
                                <div
                                    class="text-sm font-extrabold inline-block"
                                >
                                    INV20101231-009
                                </div>

                                <div
                                    class="inline-block bg-green-200 px-2 py-1 rounded-lg text-sm ml-2 font-bold -mt-3"
                                >
                                    Selesai
                                </div>
                                <div class="pl-3 mt-2">
                                    <h1>
                                        Tas Selempang Torch Nikaho Caviar Black
                                        / Sling Bag Torch / Tas Pria
                                    </h1>
                                    <div class="text-sm text-gray-500">
                                        Rp.250.0000 (1 Barang)
                                    </div>
                                </div>
                            </div>
                            <div
                                v-for="i in 3"
                                class="border my-3 px-4 py-4 rounded-lg"
                            >
                                <div
                                    class="text-sm font-extrabold inline-block"
                                >
                                    INV20101231-009
                                </div>

                                <div
                                    class="inline-block bg-blue-200 px-2 py-1 rounded-lg text-sm ml-2 font-bold -mt-3"
                                >
                                    Diproses
                                </div>
                                <div class="pl-3 mt-2">
                                    <h1>
                                        Tas Selempang Torch Nikaho Caviar Black
                                        / Sling Bag Torch / Tas Pria
                                    </h1>
                                    <div class="text-sm text-gray-500">
                                        Rp.250.0000 (1 Barang)
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                    <template v-else-if="selectedTab === 'cart'">
                        aaa
                    </template>
                </div>
            </div>
        </div>
    </LayoutGeneral>
</template>

<style scoped>
.profile-picture {
    width: 300px;
}
</style>
