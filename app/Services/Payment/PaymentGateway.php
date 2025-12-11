<?php

namespace App\Services\Payment;

use App\Contracts\PaymentGatewayInterface;
use App\Enums\PaymentMethod;
use App\Models\Order;
use InvalidArgumentException;

class PaymentGateway
{
    private array $gateways = [];

    public function __construct()
    {
        $this->registerGateway(PaymentMethod::CARD->value, new CardPayment());
        $this->registerGateway(PaymentMethod::PAYPAL->value, new PayPalPayment());
    }

    public function registerGateway(string $method, PaymentGatewayInterface $gateway): void
    {
        $this->gateways[$method] = $gateway;
    }

    public function getGateway(string $method): PaymentGatewayInterface
    {
        if (!isset($this->gateways[$method])) {
            throw new InvalidArgumentException("Payment gateway for method {$method} not found");
        }

        return $this->gateways[$method];
    }

    public function process(Order $order, int $amount): bool
    {
        $gateway = $this->getGateway($order->payment_type);
        
        return $gateway->processPayment($order, $amount);
    }
}