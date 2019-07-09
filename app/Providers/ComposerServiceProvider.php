<?php

namespace App\Providers;

use App\Brand;
use Illuminate\Support\ServiceProvider;
use View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('index.layout.header', function ($view) {
            $brands = Brand::all();
            $view->with('brands',$brands); // bind data to view
        });

    }
}
