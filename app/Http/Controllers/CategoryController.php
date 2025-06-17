<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input('q');

        $categories = Category::withCount('recipes')
            ->when($request->has('q') && $q, function(Builder $query) use ($q){
                $query->where('title', 'like', "%$q%");
            })
            ->paginate(8)
            ->withQueryString();

        return view('categories.index', compact('categories'));
    }

    public function show(Category $category, Request $request)
    {
//        $recipes = $category->recipes()->get();
        $q = $request->get('q');

        $recipes = Recipe::where('category_id', $category->id)
            ->when($request->has('q') && $q, function(Builder $query) use ($q){
                $query->where('title', 'like', "%$q%")
                ->orWhere('excerpt', 'like', "%$q%");
            })
            ->paginate(10)
            ->withQueryString();

        $flags = Recipe::FLAGS;
        $category->viewed();

        return view('categories.show', compact('category', 'recipes', 'flags'));
    }
}
