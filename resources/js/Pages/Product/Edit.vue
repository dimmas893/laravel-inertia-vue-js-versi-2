<template>
    <div>
        <div class="card border-0 rounded shadow">
            <div class="card-body">
                <h4>EDIT product</h4>
                <hr />
                <form @submit.prevent="updateproduct">
                    <div class="mb-3">
                        <label class="form-label">diamond product</label>
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
                            {{ errors.diamond }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">category_id product</label>
                        <input
                            type="text"
                            class="form-control"
                            v-model="product.category_id"
                            placeholder="Masukkan category_id product"
                        />
                        <div
                            v-if="errors.category_id"
                            class="mt-2 alert alert-danger"
                        >
                            {{ errors.category_id }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">price product</label>
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
                            {{ errors.price }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <button
                            type="submit"
                            class="btn btn-primary btn-md shadow-sm me-2"
                        >
                            UPDATE
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
        product: Object,
        errors: Object,
    },

    //define Composition Api
    setup(props) {
        //state products
        const product = reactive({
            diamond: props.product.diamond,
            category_id: props.product.category_id,
            price: props.product.price,
        });

        //function updateproduct
        function updateproduct() {
            //define variable
            let diamond = product.diamond;
            let category_id = product.category_id;
            let price = product.price;

            //send data
            Inertia.put(`/products/${props.product.id}`, {
                diamond: diamond,
                category_id: category_id,
                price: price,
            });
        }

        return {
            product,
            updateproduct,
        };
    },
};
</script>
