<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users;
use App\Http\Controllers\Financas;


Route::get('/',[Users::class,'index']);
Route::post('/register',[Users::class,'store']); 
Route::post('/logout',[Users::class,'logout'])->name('logout'); 
Route::post('/alterar-senha', [Users::class, 'alterarSenha'])->name('alterar.senha');
Route::post('/create-goal', [Users::class, 'createGoal']);
// financas
Route::post('/financa', [Financas::class, 'store']);
Route::get('/financa', [Financas::class, 'index']);
Route::delete('/deleteFinanca/{id}', [Financas::class, 'destroy']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
