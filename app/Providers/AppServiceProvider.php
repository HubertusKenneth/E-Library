<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $locale = session('locale', config('app.locale', 'en'));

        if (!in_array($locale, ['en', 'id'], true)) {
            $locale = config('app.fallback_locale', 'en');
        }

        App::setLocale($locale);
    }
}
