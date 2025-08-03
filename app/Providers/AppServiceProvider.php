<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Config;
use Illuminate\Support\Facades\View;

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
        View::composer('*', function ($view) {
            $company = [
                'name' => Config::get('site_name'),
                'logo' => Config::get('logo_url'),
                'about' => Config::get('about'),
            ];

            $socialSettings = Config::where('key', 'like', '%_url')->get();

            $view->with([
                'company' => $company,
                'socialSettings' => $socialSettings,
            ]);
        });
    }
}
