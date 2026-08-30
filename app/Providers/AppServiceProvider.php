<?php

namespace App\Providers;

use App\Models\ContentSetting;
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
                $content = ContentSetting::pluck('value', 'key');
            } catch (\Throwable) {
                // Keep public pages renderable before the first database migration.
                $services = collect();
                $options = collect();
                $content = collect();
            }
            $view->with('quoteServices', $services);
            $view->with('quoteOptions', $options);
            $view->with('siteLogoUrl', ContentSetting::resolveUrl($content['site_logo'] ?? null, asset('logo.png')));
            $view->with('aboutImageUrl', ContentSetting::resolveUrl($content['about_image'] ?? null, asset('images/about-us.avif')));
        });
    }
}
