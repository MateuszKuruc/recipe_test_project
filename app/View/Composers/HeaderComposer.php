<?php

namespace App\View\Composers;

use Illuminate\View\View;

class HeaderComposer
{
    public function compose(View $view)
    {
        $navLinks = collect([
        [
            'title' => 'Home',
            'icon' => 'carrot',
            'routeName' => 'home',
            'cssClasses' => $this->getCssClasses('home'),
        ],
        [
            'title' => 'Categories',
            'icon' => 'cubes-stacked',
            'routeName' => 'categories.index',
            'cssClasses' => $this->getCssClasses('categories.index'),
        ],
        [
            'title' => 'Recipes Catalog',
            'icon' => 'bowl-food',
            'routeName' => 'home',
            'cssClasses' => $this->getCssClasses('recipes.index'),
        ],
         [
             'title' => 'Contact Us',
             'icon' => 'utensils',
             'routeName' => 'pages.contact',
             'cssClasses' => $this->getCssClasses('pages.contact'),
         ]

        ]);

        $view->with([
            'navLinks' => $navLinks
        ]);
    }

    private function getCssClasses(string $routeName): string
    {
        $activeRoutes = match($routeName) {
            'home' => ['home'],
            'categories.index' => ['categories.index', 'categories.show'],
            'recipes.index' => ['recipes.index', 'recipes.show'],
            'pages.contact' => ['pages.contact'],
            default => [],
        };

        return in_array(request()->route()->getName(), $activeRoutes) ? 'active' : '';
    }
}
