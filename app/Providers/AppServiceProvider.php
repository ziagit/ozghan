<?php

namespace App\Providers;

use App\Models\QuoteOption;
use App\Models\TilingService;
use Illuminate\Support\Facades\View;
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
        View::composer('site.*', function ($view) {
            try {
                $services = TilingService::latest()->get();
                $options = QuoteOption::where('is_active', true)->orderBy('sort_order')->get()->groupBy('option_group');
            } catch (\Throwable) {
                // Keep public pages renderable before the first database migration.
                $services = collect();
                $options = collect();
            }
            $view->with('quoteServices', $services);
            $view->with('quoteOptions', $options);
        });
    }
}
