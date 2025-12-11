<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pizza extends Model
{
    public function toppingPizzas(): BelongsToMany {
        return $this->belongsToMany(Topping::class);
    }
}
