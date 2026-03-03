<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

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
        // 1. Pemetaan relasi database LMS kamu (tetap dipertahankan)
        Relation::enforceMorphMap([
            'dosen' => 'App\Models\Dosen',
            'mahasiswa' => 'App\Models\Mahasiswa',
        ]);
    }
}