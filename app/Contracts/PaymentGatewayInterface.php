<?php

namespace App\Contracts;

use App\Models\Order;
use BcMath\Number;

interface PaymentGatewayInterface
{
    public function processPayment(Order $order, int $amount): bool;
}