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
        // Compartilhar variáveis com todas as views
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $userId = Auth::id();

                // Total de entrada e saída apenas do usuário autenticado
                $totalEntrada = Financa::where('user_id', $userId)
                    ->where('tipo', 'entrada')
                    ->sum('valor');

                $totalSaida = Financa::where('user_id', $userId)
                    ->where('tipo', 'saida')
                    ->sum('valor');

                $totalGeral = $totalEntrada - $totalSaida;

                $view->with('totalGeral', $totalGeral);
                $view->with('totalEntrada', $totalEntrada);
                $view->with('totalSaida', $totalSaida);

                // Apenas registros do usuário autenticado
                $financasLimit = Financa::where('user_id', $userId)
                    ->limit(6)
                    ->get();
                $view->with('financasLimit', $financasLimit);

                $financas = Financa::where('user_id', $userId)->get();
                $view->with('financas', $financas);

                // Metas do usuário autenticado
                $goals = Goal::where('user_id', $userId)->get();
                $view->with('goals', $goals);

                // Transações para calcular o saldo do usuário autenticado
                $transactions = Financa::where('user_id', $userId)
                    ->orderBy('created_at', 'asc')
                    ->get();

                // Calcular o saldo cumulativo ao longo do tempo
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
            }
        });
    }
}
