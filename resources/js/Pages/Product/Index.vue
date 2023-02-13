<template>
    <div class="mt-5">
        <!-- flash message -->
        <div
            v-if="$page.props.flash.message"
            class="alert alert-success"
            role="alert"
        >
            {{ $page.props.flash.message }}
        </div>
        <!-- flash message -->
        <div class="mb-3">
            <Link href="/products/create" class="btn btn-md btn-primary"
                >TAMBAH DATA</Link
            >
        </div>
        <div class="card border-0 rounded shadow-sm">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Category</th>
                            <th scope="col">diamond</th>
                            <th scope="col">price</th>
                            <th scope="col">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="p in products" :key="p.id">
                            <td>{{ p.category_id }}</td>
                            <td>{{ p.diamond }}</td>
                            <td>{{ p.price }}</td>
                            <td class="text-center">
                                <Link
                                    :href="`/products/${p.id}/edit`"
                                    class="btn btn-sm btn-primary me-2"
                                    >EDIT</Link
                                >
                                <button
                                    @click.prevent="deletePost(`${p.id}`)"
                                    class="btn btn-sm btn-danger"
                                >
                                    DELETE
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
//import layout
import LayoutApp from "../../Layouts/App.vue";

//import Link dari inertia
import { Link } from "@inertiajs/inertia-vue3";

import { Inertia } from "@inertiajs/inertia";

export default {
    //layout
    layout: LayoutApp,

    //register Link di component
    components: {
        Link,
    },

    //props
    props: {
        products: Array, // <- nama props yang dibuat di controller saat parsing data
    },

    //define Composition Api
    setup() {
        //method deletePost
        function deletePost(id) {
            Inertia.delete(`/products/${id}`);
        }

        return {
            deletePost,
        };
    },
};
</script>

<style></style>
