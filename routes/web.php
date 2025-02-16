<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users;


Route::get('/',[Users::class,'index']);
Route::post('/register',[Users::class,'store']); 
Route::post('/logout',[Users::class,'logout'])->name('logout'); 
Route::post('/alterar-senha', [Users::class, 'alterarSenha'])->name('alterar.senha');
Route::post('/create-goal', [Users::class, 'createGoal']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
