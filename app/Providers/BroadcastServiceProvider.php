<?php

namespace App\Providers;

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Baris ini memberitahu Laravel untuk menggunakan middleware 'web'
        // (yang menangani sesi login) saat memproses rute otorisasi.
        Broadcast::routes(['middleware' => ['web']]);

        require base_path('routes/channels.php');
    }
}
