<?php

namespace App\Http\Controllers;
use App\Models\Financa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Financas extends Controller
{
   
    public function store(Request $request)
    {
        $request->validate([
            'description' => ['required', 'string', 'max:255'],
            'valor' => ['required', 'numeric'],
            'tipo' => ['required', 'in:entrada,saida'],
        ]);

        $userId = Auth::id();

        // Salvar a nova transação no banco de dados
        $financas = new Financa();
        $financas->description = $request->description;
        $financas->valor = $request->valor;
        $financas->tipo = $request->tipo;
        $financas->user_id = $userId;
        $financas->save(); // Salvar antes de calcular os totais

     
    }
    public function destroy($id){
     $financas=Financa::findOrFail($id);
     $financas->delete();
     return redirect('/');
    }
}
