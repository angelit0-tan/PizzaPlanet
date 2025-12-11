<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pizza;
use App\Models\Topping;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Toppings
        Topping::firstOrCreate([
            'name' => 'Ham',
            'price' => 1,
        ]);
        Topping::firstOrCreate([
            'name' => 'Olives',
            'price' => 1,
        ]);
        Topping::firstOrCreate([
            'name' => 'Mushrooms',
            'price' => 1,
        ]);
        Topping::firstOrCreate([
            'name' => 'Bacon',
            'price' => 1,
        ]);
        Topping::firstOrCreate([
            'name' => 'Mince',
            'price' => 1,
        ]);
        Topping::firstOrCreate([
            'name' => 'Pepperoni',
            'price' => 1,
        ]);
        Topping::firstOrCreate([
            'name' => 'Spicy mince',
            'price' => 1,
        ]);
        Topping::firstOrCreate([
            'name' => 'Onion',
            'price' => 1,
        ]);
        Topping::firstOrCreate([
            'name' => 'Green pepper',
            'price' => 1,
        ]);
        Topping::firstOrCreate([
            'name' => 'Jalapenos',
            'price' => 1,
        ]);

        // Pizzas
        Pizza::firstOrCreate([
            'name' => 'Margherita',
            'price' => 10,
        ]);

        Pizza::firstOrCreate([
            'name' => 'Romana',
            'price' => 13,
        ])->toppingPizzas()->sync(Topping::whereIn('name', ['Ham','Olives','Mushrooms'])->pluck('id'));

        Pizza::firstOrCreate([
            'name' => 'Americana',
            'price' => 13,
        ])->toppingPizzas()->sync(Topping::whereIn('name', ['Bacon','Mince','Pepperoni'])->pluck('id'));

        Pizza::firstOrCreate([
            'name' => 'Mexicana',
            'price' => 15,
        ])->toppingPizzas()->sync(Topping::whereIn('name', ['Spicy mince','Onion','Green pepper','Jalapenos'])->pluck('id'));

        //
    }
}
