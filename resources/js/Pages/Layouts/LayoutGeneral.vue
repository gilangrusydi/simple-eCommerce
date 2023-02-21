<script setup>
import { computed } from "vue";
import { usePage, Link } from "@inertiajs/vue3";

const user = computed(() => usePage().props.user);
</script>

<template>
    <!-- Navbar -->
    <div class="shadow-md py-4 mb-7">
        <div class="max-w-screen-xl mx-auto px-4 sm:px-6 md:px-8">
            <div class="flex justify-between items-center">
                <Link href="/" class="text-2xl tracking-tight">
                    <strong class="italic">Simple</strong>Market
                </Link>
                <form action="" method="GET" class="hidden sm:block basis-1/2">
                    <input
                        type="search"
                        name="search"
                        class="shadow w-full px-4 py-2 rounded outline-slate-200"
                        placeholder="Cari Product"
                    />
                </form>

                <div v-if="user">
                    <Link href="/profile" class="mx-3 text-slate-600">{{
                        user.name
                    }}</Link>
                </div>
                <div v-else>
                    <Link href="/login" class="mx-3 text-slate-600">Masuk</Link>
                    <Link href="" class="mx-3 text-slate-600">Daftar</Link>
                </div>
            </div>
        </div>
    </div>

    <slot />

    <!-- Footer -->
    <footer class="text-center text-sm text-slate-500 mt-20 mb-5">
        @2023 SimpleMarket. Created By Gilang Rusydi
    </footer>
</template>
