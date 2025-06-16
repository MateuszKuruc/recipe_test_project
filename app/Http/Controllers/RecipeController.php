<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    //
    public function show(Recipe $recipe)
    {
        $flags = Recipe::FLAGS;

        $featuredRecipes = Recipe::where('id', '!=', $recipe->id)
            ->where('category_id', $recipe->category_id)
            ->whereNotNull('featured_at')
            ->take(3)
            ->get();

        return view('recipes.show', compact('recipe', 'flags', 'featuredRecipes'));
    }
}
