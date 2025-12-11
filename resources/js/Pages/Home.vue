<template>
    <div>
        <div class="my-5">
            <h2> Pizza Planet </h2>
            <label>Taste our best planet pizzas!!!</label>
        </div>
        <div class="row gap-2">
            <div class="col card" v-for="pizza in pizzas.data" :key="pizza.id">
                <div class="card-body">
                    <h3 class="card-title">Pizza: {{ pizza.name }}</h3>
                    <template v-if="pizza.toppings.length">
                        <div class="d-flex flex-wrap gap-1 mb-3">
                            Toppings: 
                            <span class="badge text-bg-danger rounded-pill" v-for="topping in pizza.toppings" :key="topping.id">
                                {{ topping.name }} Pizza
                            </span>
                        </div>
                    </template>
                    <div class="mb-2">
                        <strong class="h3">{{ pizza.price }}</strong>
                    </div>
                    <div class="d-flex flex-wrap gap-2">
                        <a :href="`${pizza.id}/make-your-own`" class="btn btn-primary">Make your own</a>
                        <a :href="`${pizza.id}/checkout`" class="btn btn-primary">Order now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
    const props = defineProps({
        pizzas: {
            type: Object,
            default: () => {}
        }
    });
</script>