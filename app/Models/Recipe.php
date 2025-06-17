<?php

namespace App\Models;

use App\Traits\HasViewCount;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Recipe extends Model
{
    /** @use HasFactory<\Database\Factories\RecipeFactory> */
    use HasFactory;
    use HasViewCount;

    public const FLAGS = [
      'is_low_carb' => [
          'title' => 'Low Carb',
          'cssClass' => 'text-bg-dark',
          'icon' => 'fa-fire'
      ],
        'is_high_protein' => [
            'title' => 'High Protein',
            'cssClass' => 'text-bg-warning',
            'icon' => 'fa-drumstick-bite'
        ],
        'is_spicy' => [
            'title' => 'Spicy',
            'cssClass' => 'text-bg-danger',
            'icon' => 'fa-pepper-hot'
        ],
        'is_vegetarian' => [
            'title' => 'Vegetarian',
            'cssClass' => 'text-bg-success',
            'icon' => 'fa-carrot'
        ],
        'is_vegan' => [
            'title' => 'Vegan',
            'cssClass' => 'text-bg-success',
            'icon' => 'fa-apple-whole'
        ],
        'is_pescatarian' => [
            'title' => 'Pescatarian',
            'cssClass' => 'text-bg-info',
            'icon' => 'fa-fish'
        ],
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function prepareTimeFormatted(): Attribute
    {
        return Attribute::make(get: function (mixed $value, array $attributes) {
           $minutes = $attributes['prepare_time'];

           return $this->formatTimeBasedOnMinutes($minutes);
        });
    }

    public function cookingTimeFormatted(): Attribute
    {
        return Attribute::make(get: function (mixed $value, array $attributes) {
            $minutes = $attributes['cooking_time'];

            return $this->formatTimeBasedOnMinutes($minutes);
        });
    }

    /**
    * @param mixed $minutes
    * @return string
    */
    private function formatTimeBasedOnMinutes(mixed $minutes): string
    {
        $hours = floor($minutes / 60);
        $minutes = $minutes % 60;

        $output = '';
        if($minutes >0) {
            $output = "$minutes min.";
        }

        if($hours >0) {
            $output = "$hours hrs". $output;
        }

        return $output;
    }

}
