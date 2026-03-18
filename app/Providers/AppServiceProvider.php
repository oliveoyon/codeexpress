<?php

namespace App\Providers;

use App\Models\GeneralSetting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Throwable;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(125);

        View::composer(['home', 'layouts.site', 'layouts.admin', 'admin.*'], function ($view): void {
            try {
                $view->with('generalSetting', GeneralSetting::current());
            } catch (Throwable) {
                $view->with('generalSetting', null);
            }
        });
    }
}
