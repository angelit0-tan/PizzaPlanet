<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Pizza;
use Illuminate\Http\Request;
use App\Http\Resources\PizzaResource;

class CheckOutController extends Controller
{
    public function index(Pizza $pizza) {
        return Inertia::render('CheckOut', [
            'pizza' => new PizzaResource($pizza)
        ]);
    }
}
