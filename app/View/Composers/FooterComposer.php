<?php

namespace App\View\Composers;

use App\Models\Category;
use App\Models\Recipe;
use Illuminate\View\View;

class FooterComposer
{
    public function compose(View $view)
    {
        $categories = Category::withCount('recipes')
            ->orderBy('recipes_count', 'DESC')
            ->take(5)
            ->get();
        $featuredRecipes = Recipe::take(5)->get();


        $view->with(compact('categories', 'featuredRecipes'));
    }
}
