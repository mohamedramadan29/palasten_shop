<?php

namespace App\Providers;

use App\Models\admin\PublicSetting;
use Illuminate\Support\Facades\Schema;
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
        if (Schema::hasTable('public_settings')) {
            $settings = PublicSetting::first();
            $currency = $settings['website_currency'];

            // مشاركة العملة مع جميع الفيوهات (Blade templates)
            View::share('storeCurrency', $currency);
        }
    }
}
