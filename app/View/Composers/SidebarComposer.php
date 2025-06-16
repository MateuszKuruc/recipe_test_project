<?php

namespace App\View\Composers;

use App\Models\Category;
use Illuminate\View\View;


class SidebarComposer
{
    public function compose(View $view)
    {
        $categories = Category::withCount('recipes')
            ->orderBy('recipes_count', 'DESC')
            ->take(5)
            ->get();

        $view->with([
            'categories' => $categories,
        ]);
    }
}
