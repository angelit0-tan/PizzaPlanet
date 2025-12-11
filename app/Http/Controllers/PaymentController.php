<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use App\Models\Order;
use App\Services\Payment\PaymentGateway;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function __construct(private PaymentGateway $paymentGateway) {}

    // Process the order / payment
    public function processPayment(Request $request, Pizza $pizza) {

        $order = Order::create([
            'pizza_id' => $pizza->id,
            'amount' => $request->price,
            'is_customized' => 1,
            'payment_type' => $request->payment_type
        ]);

        $this->paymentGateway->process($order, $order->amount);

        return response()->json([
            'success' => true,
        ]); 
    }
}
