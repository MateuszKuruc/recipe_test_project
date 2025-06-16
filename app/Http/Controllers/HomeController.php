<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $carouselRecipes = Recipe::orderBy('view_count', 'DESC')->take(3)->get();
        $latestRecipes = Recipe::latest()->take(4)->get();
        $categories = Category::withCount('recipes')
            ->orderBy('recipes_count', 'DESC')
            ->with('recipes')
            ->take(3)
            ->get();

        return view('home', compact('carouselRecipes', 'latestRecipes', 'categories'));
    }
}
