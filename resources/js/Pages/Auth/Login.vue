<script setup>
import LayoutGeneral from "@/Pages/Layouts/LayoutGeneral.vue";
import { reactive, watch, ref, onMounted, computed } from "vue";
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    email: "",
    password: "",
});

const submit = () => {
    loading.value = true;
    form.post("/login", {
        preserveScroll: true,
        onFinish: () => {
            loading.value = false;
            form.reset("password");
        },
    });
};

const disabled = ref(false);
const loading = ref(false);

watch(form, () => {
    setDisabled();
});

const setDisabled = () => {
    if (form.email?.trim().length < 1 || form.password?.trim().length < 1) {
        disabled.value = true;
    } else {
        disabled.value = false;
    }
};

const isError = computed(() => Object.keys(form.errors).length > 0);

onMounted(() => setDisabled());
</script>

<template>
    <LayoutGeneral>
        <div class="flex justify-center items-center mt-24">
            <div class="max-w-sm w-full">
                <h1 class="font-extrabold text-2xl">Masuk</h1>
                <p class="text-sm text-gray-600">
                    Belum punya akun? Yuk
                    <a href="" class="font-bold underline">Daftar</a> sekarang
                    juga
                </p>
                <div
                    class="alert border border-red-400 bg-red-100 my-3 px-3 py-2 rounded"
                    v-if="isError"
                >
                    <ul>
                        <li v-for="error in form.errors">{{ error }}</li>
                    </ul>
                </div>
                <div class="my-6">
                    <form @submit.prevent="submit" autocomplete="off">
                        <div>
                            <label for="" class="text-gray-600"
                                >Email atau Username</label
                            >
                            <input
                                type="text"
                                class="block border w-full px-2 py-2 rounded-md placeholder:text-sm mt-1"
                                placeholder="Masukan Email atau Username"
                                v-model="form.email"
                                required
                                autocomplete="off"
                            />
                        </div>
                        <div class="mt-3">
                            <label for="" class="text-gray-600">Password</label>
                            <input
                                type="password"
                                class="block border w-full px-2 py-2 rounded-md placeholder:text-sm mt-1"
                                placeholder="Masukan Password"
                                v-model="form.password"
                                required
                                autocomplete="off"
                            />
                            <div class="text-right">
                                <a
                                    href=""
                                    class="text-sm text-gray-600 mt-2 inline-block font-semibold underline"
                                    >Lupa Password?</a
                                >
                            </div>
                        </div>
                        <div class="mt-4">
                            <button
                                type="submit"
                                class="w-full bg-blue-500 text-white rounded-md py-2.5 font-bold disabled:bg-gray-200 disabled:text-slate-400 disabled:cursor-not-allowed hover:bg-blue-600 transition-all"
                                :disabled="disabled"
                            >
                                <template v-if="loading">
                                    <svg
                                        class="animate-spin -ml-1 mr-3 h-5 w-5 text-white text-center inline-block"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                    >
                                        <circle
                                            class="opacity-25"
                                            cx="12"
                                            cy="12"
                                            r="10"
                                            stroke="currentColor"
                                            stroke-width="4"
                                        ></circle>
                                        <path
                                            class="opacity-75"
                                            fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                                        ></path>
                                    </svg>
                                    Loading...
                                </template>
                                <template v-else>Masuk</template>
                            </button>
                        </div>
                    </form>
                    <div class="text-center text-sm mt-4 text-gray-600">
                        Ada kendala?
                        <a href="" class="font-bold underline"
                            >Hubungi Bantuan</a
                        >
                    </div>
                </div>
            </div>
        </div>
    </LayoutGeneral>
</template>
