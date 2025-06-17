<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->get('q');

        $recipes = Recipe::when($request->has('q') && $q, function(Builder $query) use ($q){
            $query
                ->orWhere('title', 'like', "%$q%")
                ->orWhere('notes', 'like', "%$q%")
                ->orWhere('instructions', 'like', "%$q%")
                ->orWhere('description', 'like', "%$q%")
                ->orWhere('excerpt', 'like', "%$q%");
            });

        if($request->has('featured') && $request->get('featured')){
            $recipes->whereNotNull('featured_at');
        }

        $recipes = $recipes->paginate(8)
            ->withQueryString();


        $flags = Recipe::FLAGS;

        return view('recipes.index', compact('recipes', 'flags'));
    }
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
