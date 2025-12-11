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
                <h3>Price: {{ price }}</h3>
                <div class="mb-2 text-danger fs-4">
                    <strong>Choose your own Toppings: </strong>
                </div>
                <div class="d-flex flex-wrap gap-1 mb-5">
                    <button type="button" class="btn"
                        :class="selectedToppings.includes(topping.id) ? 'btn-primary' : 'btn-secondary'"
                        @click="selectToppings(topping.id)"
                        v-for="topping in toppings" :key="topping.id">
                        {{ topping.name }}
                    </button>
                </div>
                <div>
                    <payment-form :pizza="pizza" :price="price"/>
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
        },
        toppings: {
            type: Object,
            default: () => {}
        }
    });

    const pizza = ref(props.pizza.data);
    const toppings = ref(props.toppings.data);
    const price = ref(parseInt(pizza.value.price));
    const selectedToppings = ref(pizza.value.toppings.map((i) => i.id));

    const selectToppings = (id) => {
        
        const toppingPrice = toppings.value.find((i) => i.id == id);

        if (selectedToppings.value.includes(id)) {
            selectedToppings.value = selectedToppings.value.filter((i) => i !== id);
            price.value -= parseInt(toppingPrice.price);
        } else {
            selectedToppings.value.push(id)
            price.value += parseInt(toppingPrice.price);
        }
    }
</script>