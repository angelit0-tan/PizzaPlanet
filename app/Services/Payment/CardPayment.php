<?php

namespace App\Services\Payment;

use App\Contracts\PaymentGatewayInterface;
use App\Models\Order;
use Illuminate\Support\Facades\Log;

class CardPayment implements PaymentGatewayInterface
{
    public function processPayment(Order $order, int $amount): bool
    {
        // Payment processing
        Log::info('Processing Card Payment', [
            'pizza' => $order->pizza->name,
            'order_id' => $order->id,
            'amount' => $amount
        ]);

        return true;
    }
}