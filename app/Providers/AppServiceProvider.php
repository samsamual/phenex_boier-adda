<?php

namespace App\Providers;

use App\Models\BisesoggoCategory;
use App\Models\BlogPost;
use App\Models\FrontSlider;
use App\Models\Hospital;
use App\Models\Menu;
use App\Models\Page;
use App\Models\WebsiteParameter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            View::share('headerMenus', Menu::whereActive(true)->where('type','header_menu')->orderBy('drag_id')->latest()->get());
            View::share('footerMenus', Menu::whereActive(true)->where('type','footer_menu')->orderBy('drag_id')->latest()->get());
            View::share('ws',WebsiteParameter::first());
            View::share('departments',  BisesoggoCategory::orderBy('name_bn')->whereActive(true)->get());
            View::share('sliders',  FrontSlider::latest()->whereActive(true)->get());
        });

        Paginator::useBootstrap();
    }
}
