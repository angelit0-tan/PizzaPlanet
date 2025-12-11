<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Order;
use App\Models\Pizza;
use App\Services\Payment\PaymentGateway;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderTest extends TestCase
{
    protected $paymentGateway;

    protected function setUp(): void
    {
        parent::setUp();
        $this->paymentGateway = new PaymentGateway;

    }

    /**
     * Test for ordering for payment card
     */
    public function test_order_payment_card_success(): void
    {

        $pizza = Pizza::inRandomOrder()->first();

        $data = [
            'price' => $pizza->price,
            'payment_type' => 'card'
        ];

        $response = $this->postJson("/api/{$pizza->id}/payment", $data);

        $response->assertOk();
    }

    /**
     * Test for ordering for payment paypal
     */    
    public function test_order_payment_paypal_success(): void
    {

        $pizza = Pizza::inRandomOrder()->first();

        $data = [
            'price' => $pizza->price,
            'payment_type' => 'paypal'
        ];

        $response = $this->postJson("/api/{$pizza->id}/payment", $data);

        $response->assertOk();
    }
}
