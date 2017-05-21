<?php

namespace App\Providers;

use App\Category;
use App\Observers\CategoryObserver;
use App\Observers\BookObserver;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('auth.register', 'App\Http\ViewComposers\RoleComposer');
        view()->composer(['books.index'], 'App\Http\ViewComposers\BookComposer');
        view()->composer(['*'], 'App\Http\ViewComposers\CartComposer');

        Category::observe(CategoryObserver::class);
        app(\App\Book::class)->observe(BookObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
