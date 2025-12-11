<?php

namespace App\Enums;

enum PaymentMethod: string
{
    case CARD = 'card';
    case PAYPAL = 'paypal';

    public function name(): string
    {
        return match($this) {
            self::CARD => 'Credit Card',
            self::PAYPAL => 'PayPal',
        };
    }
}
