<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        \Illuminate\Support\Facades\View::share('company_setting', \App\Models\CompanySetting::first());
        \Illuminate\Support\Facades\View::share('project_links', \App\Models\ProjectLink::where('is_active', true)->orderBy('order')->orderBy('name')->get());
    }
}
