<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users;
use App\Http\Controllers\Financas;
use App\Http\Controllers\Goals;


Route::get('/',[Users::class,'index'])->middleware('auth')->name('/welcome');
Route::post('/register',[Users::class,'store'])->name('register'); 
Route::get('/register',[Users::class,'show'])->name('register'); 
Route::post('/logout',[Users::class,'logout'])->name('logout'); 
Route::post('/alterar-senha', [Users::class, 'alterarSenha'])->name('alterar.senha');
// golas
Route::post('/create-goal', [Goals::class, 'createGoal']);
Route::get('/goals/{id}', [Goals::class, 'editGoals']); 
Route::get('/allGoals', [Goals::class, 'showGoal']); 
Route::post('/goals/{id}', [Goals::class, 'updateGoals']); 
Route::delete('/deleteallGoals', [Goals::class, 'destroy']); 
// financas
Route::post('/financa', [Financas::class, 'store']);
Route::get('/financa', [Financas::class, 'index']);
Route::delete('/deleteFinanca/{id}', [Financas::class, 'destroy']); 
Route::get('/allTrancacoes', [Financas::class, 'showTrancacoes']); 
Route::get('/update/{id}', [Financas::class, 'showEdit']); 
Route::post('/update/{id}', [Financas::class, 'update']); 




Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
    return redirect('/'); // Redireciona para a página principal
})->name('dashboard');