<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\URL;

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
        // 1. Pemetaan relasi database LMS (Polymorphic relations untuk Dosen & Mahasiswa)
        Relation::enforceMorphMap([
            'dosen' => 'App\Models\Dosen',
            'mahasiswa' => 'App\Models\Mahasiswa',
        ]);

        // 2. Memaksa skema HTTPS saat aplikasi diakses melalui Ngrok
        if (str_contains(env('APP_URL'), 'ngrok')) {
            URL::forceScheme('https');
        }
    }
}