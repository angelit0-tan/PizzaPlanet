<template>
    <div>
        <div class="h3">
            Payment Method
        </div>
        <div class="mb-3">
            <select class="form-select" v-model="paymentType">
                <option selected value="card">Card</option>
                <option value="paypal">Paypal</option>
            </select>
        </div>
        <div>
            <button type="button" class="btn btn-success fs-4 w-100" @click="payNow">
                Pay Now
            </button>
        </div>
    </div>
</template>
<script setup>
    import axios from 'axios';
    import { ref } from 'vue';

    const paymentType = ref('card');

    const props = defineProps({
        price: {
            type: Number,
            default: 0
        },
        pizza: {
            type: Array,
            default: () => []
        }
    });

    const payNow = () => {
        axios.post(`/api/${props.pizza.id}/payment`, {
            price: props.price,
            payment_type: paymentType.value
        });

        alert('Success payment');
        
        window.location = '/';
    }
</script>