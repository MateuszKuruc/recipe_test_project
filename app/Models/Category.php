<?php

namespace App\Models;

use App\Traits\HasViewCount;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;
    use HasViewCount;

    public function recipes(): HasMany
    {
        return $this->hasMany(Recipe::class);
    }
}
