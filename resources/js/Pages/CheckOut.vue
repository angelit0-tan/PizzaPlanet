<template>
   <div>
        <div class="my-5">
            <div class="mb-3 h4">
                <a href="/"> Planet Pizza</a>
            </div>
            <div class="h1">
                Make your own pizza!
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Pizza: {{ pizza.name }}</h2>
                <h3>Price: {{ pizza.price }}</h3>
                <template v-if="pizza.toppings.length">
                    <div class="d-flex flex-wrap gap-1 mb-3">
                        Toppings: 
                        <span class="badge text-bg-danger rounded-pill" v-for="topping in pizza.toppings" :key="topping.id">
                            {{ topping.name }} Pizza
                        </span>
                    </div>
                </template>
                <div class="mt-4">
                    <payment-form :pizza="pizza" :price="pizza.price"/>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
    import { ref } from 'vue';
    import PaymentForm from '@js/Components/PaymentForm.vue';

    const props = defineProps({
        pizza: {
            type: Array,
            default: () => []
        }
    });

    const pizza = ref(props.pizza.data);
</script>