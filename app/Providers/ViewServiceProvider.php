<?php

namespace App\Providers;

use App\View\Composers\FooterComposer;
use App\View\Composers\HeaderComposer;
use App\View\Composers\SidebarComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('partials.sidebar', SidebarComposer::class);
        View::composer('partials.header', HeaderComposer::class);
        View::composer('partials.footer', FooterComposer::class);
    }
}
