<?php

namespace App\Providers;
use App\Models\ContactFooter;
use App\Models\RRSSFooter;
use App\Models\Footer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
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
        // Obtener las instancias de los modelos
        $contactFooter = ContactFooter::first();
        $rrssFooter = RRSSFooter::first();
        $footer = Footer::first();
       

        // Compartir las variables globalmente
        View::share('contactFooter', $contactFooter);
        View::share('rrssFooter', $rrssFooter);
        View::share('footer', $footer);
    }
}
