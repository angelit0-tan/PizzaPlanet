<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Pizza;
use Illuminate\Http\Request;
use App\Http\Resources\PizzaResource;
use App\Http\Resources\ToppingResource;
use App\Models\Topping;

class CustomPizzaController extends Controller
{
    // Check for custom pizza
    public function index(Pizza $pizza) {

        $toppings = Topping::all();

        return Inertia::render('MakeYourOwn', [
            'pizza' => new PizzaResource($pizza),
            'toppings' => ToppingResource::collection($toppings)
        ]);
    }
}
