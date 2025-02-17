<?php

namespace App\Http\Controllers;
use App\Models\Financa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Financas extends Controller
{
   public function showTrancacoes(){
    $financas=Financa::all();
    return view ('financas.trancacoes',['financas'=>$financas] );
   }
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
        return redirect('/');
     
    }


public function showEdit($id)
{
    $financa = Financa::findOrFail($id); 
    return view('financas.edit', ['financa' => $financa]);
}

public function update(Request $request, $id)
{
    $financa=$request->all();
    Financa::findOrFail($id)->update($financa);
    

    return view('financas.trancacoes');
}

    public function destroy($id){
     $financas=Financa::findOrFail($id);
     $financas->delete();
     return redirect('/');
    }
}
