<template>
    <div>
        <div class="card border-0 rounded shadow">
            <div class="card-body">
                <h4>TAMBAH POST</h4>
                <hr />
                <form @submit.prevent="storeproduct">
                    <div class="mb-3">
                        <label class="form-label">product</label>
                        <select
                            class="form-control"
                            v-model="product.category_id"
                        >
                            <option selected disabled>
                                ---Pilih Category---
                            </option>
                            <option v-for="p in post" v-bind:value="p.id">
                                {{ p.title }}
                            </option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input
                            type="text"
                            class="form-control"
                            v-model="product.diamond"
                            placeholder="Masukkan diamond product"
                        />
                        <div
                            v-if="errors.diamond"
                            class="mt-2 alert alert-danger"
                        >
                            Nama tidak boleh kosong
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">price</label>
                        <input
                            type="text"
                            class="form-control"
                            v-model="product.price"
                            placeholder="Masukkan price product"
                        />
                        <div
                            v-if="errors.price"
                            class="mt-2 alert alert-danger"
                        >
                            Nama tidak boleh kosong
                        </div>
                    </div>
                    <div class="mb-3">
                        <button
                            type="submit"
                            class="btn btn-primary btn-md shadow-sm me-2"
                        >
                            SIMPAN
                        </button>
                        <button
                            type="reset"
                            class="btn btn-warning btn-md shadow-sm"
                        >
                            RESET
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
//import layout
import LayoutApp from "../../Layouts/App.vue";
import { reactive } from "vue";
import { Inertia } from "@inertiajs/inertia";

export default {
    //layout
    layout: LayoutApp,

    //props
    props: {
        errors: Object,
        post: [],
    },

    //define Composition Api
    setup() {
        //state posts
        const product = reactive({
            category_id: "",
            diamond: "",
            price: "",
        });

        //function storeproduct
        function storeproduct() {
            //define variable
            let category_id = product.category_id;
            let diamond = product.diamond;
            let price = product.price;

            //send data
            Inertia.post("/products/", {
                category_id: category_id,
                diamond: diamond,
                price: price,
            });
        }

        return {
            product,
            storeproduct,
        };
    },
};
</script>
