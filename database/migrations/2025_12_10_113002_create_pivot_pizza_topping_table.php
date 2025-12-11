<?php

use App\Models\Pizza;
use App\Models\Topping;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pizza_topping', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Pizza::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Topping::class)->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pizza_topping');
    }
};
