<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Financa;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Compartilhar totalGeral com todas as views
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $userId = Auth::id();

                $totalEntrada = Financa::where('user_id', $userId)
                    ->where('tipo', 'entrada')
                    ->sum('valor');

                $totalSaida = Financa::where('user_id', $userId)
                    ->where('tipo', 'saida')
                    ->sum('valor');

                $totalGeral = $totalEntrada - $totalSaida;

                $view->with('totalGeral', $totalGeral);
                $view->with('totalEntrada',   $totalEntrada );
                $view->with('totalSaida',     $totalSaida );
            }
            $financas=Financa::all();
            $view->with('financas',$financas );
        });
    }
}
