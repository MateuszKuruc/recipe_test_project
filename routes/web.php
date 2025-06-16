<?php

use App\Models\Recipe;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $carouselRecipes = Recipe::orderBy('view_count', 'DESC')->take(3)->get();
    $latestRecipes = Recipe::latest()->take(4)->get();

    return view('home', [
        'carouselRecipes' => $carouselRecipes,
        'latestRecipes' => $latestRecipes
    ]);
});
