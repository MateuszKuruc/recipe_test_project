<?php

namespace App\View\Composers;

use App\Models\Category;
use App\Models\Recipe;
use Illuminate\View\View;


class SidebarComposer
{
    public function compose(View $view)
    {
        $categories = Category::withCount('recipes')
            ->orderBy('recipes_count', 'DESC')
            ->take(5)
            ->get();


        $recipe = request('recipe');
        $relatedRecipes = Recipe::where('id', '!=', $recipe->id)
            ->where('category_id', $recipe->category_id)
            ->whereNull('featured_at')
            ->orderBy('view_count')
            ->take(4)
            ->get();

        $view->with([
            'categories' => $categories,
            'relatedRecipes' => $relatedRecipes,
        ]);
    }
}
