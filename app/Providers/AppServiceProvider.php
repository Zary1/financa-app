<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Financa;
use App\Models\Goal;

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
            $financasLimit=Financa::limit(6)->get();
            $view->with('financasLimit',$financasLimit );
            $financas=Financa::all();
            $view->with('financas',$financas );
        // mostrar metas
        
        $goals = Goal::all();
        $view->with('goals', $goals );


    $transactions = Financa::orderBy('created_at', 'asc')->get();

    // Calcular o saldo para cada transação (entrada - saída)
    $dates = [];
    $balances = [];
    $currentBalance = 0;

    foreach ($transactions as $transaction) {
        $currentBalance += ($transaction->tipo == 'entrada' ? $transaction->valor : -$transaction->valor);
        $dates[] = $transaction->created_at->format('d/m/Y');
        $balances[] = $currentBalance;
    }

    $view->with('dates', $dates);
    $view->with('balances', $balances);


        });
    }
}
