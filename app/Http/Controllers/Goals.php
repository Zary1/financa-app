<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Financa;
use App\Models\Goal;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Goals extends Controller
{
    public function createGoal(Request $request){
        $userId = Auth::id();
        $request->validate([
            'goal_name' => ['required', 'string'],
            'goal_amount' => ['required', 'numeric'],
            'amount_save' => ['required', 'numeric'],
            'goal_description' => ['required', 'string'],
            'goal_deadline' => ['required', 'date'],
            
        ]);
        $goal= new Goal();
        $goal->goal_name=$request->goal_name;
        $goal->goal_amount=$request->goal_amount;
        $goal->amount_save=$request->amount_save; 
        $goal->goal_description=$request->goal_description; 
        $goal->goal_deadline=$request->goal_deadline; 
        $goal->status='pendente';
        $goal->user_id=$userId;
    
        $goal->save();
    
        return redirect('/');
    
    }

    public function editGoals($id){
      $goal=Goal::findOrFail($id);
      return view('/financas.editGoals',['goal'=>$goal]);
    }
    public function updateGoals(Request $request, $id)
    {
        $data = $request->all();
        // Atualizando a meta com os dados do formulário
        Goal::findOrFail($id)->update([
            'goal_name' => $data['goal_name'],
            'goal_amount' => $data['goal_amount'],
            'amount_save' => $data['amount_save'],
            'goal_deadline' => $data['goal_deadline'],
            'goal_description' => $data['goal_description'],
            'status' => $data['status'], 
        ]);
        
        return redirect('/');
    }

    public function destroy(){
     Goal::truncate();
        return redirect('/');
    }
    
}
