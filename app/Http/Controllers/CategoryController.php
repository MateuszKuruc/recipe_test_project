<?php

namespace App\Http\Controllers;

use App\Models\Category;
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

        return view('categories', compact('categories'));
    }
}
