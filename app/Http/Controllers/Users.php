<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Financa;
use App\Models\Goal;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Users extends Controller
{
    public function index(){
        $users=User::all();
        
        return view('welcome',['users'=>$users]);
    }



    public function store(Request $request)
{
  
  $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'phone' => ['required', 'string', 'regex:/^\+?[0-9]*$/'],
        'address' => ['required', 'string'],
        'password' => ['required', 'string',  'confirmed'],
       
    ]);

    $user= new User();
    $user->name=$request->name;
    $user->email=$request->email; 
    $user->phone=$request->phone; 
    $user->address=$request->address; 
    $user->password=Hash::make($request->password);


    // Processamento da imagem

    if($request->hasFile('profile_image') && $request->file('profile_image')->isValid()){
        $requestImage=$request->profile_image;
        $extension =$requestImage->extension();
        $imageName=md5($requestImage->getClientOriginalName() .strtotime("now"))."." .$extension;
    //   ^salvar imagem
        $requestImage->move(public_path('img/profile_images'),$imageName);
        $user->profile_image=$imageName;
    }
    else {
        $requestImage= null; // Caso não tenha imagem
    }
  
    // Criando o usuário
    $user->save();
       
    // Login automático do usuário após o registro
    
   auth()->login($user);
   return redirect()->route('dashboard');

   
}
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

    return redirect('/goals');

}

public function alterarSenha(Request $request)
{
   
    $request->validate([
        'password_actual' => ['required', 'string'],
        'password_novo' => ['required', 'string', 'min:6'],
    ]);

 
    $user = Auth::user();

 
    if (!Hash::check($request->password_actual, $user->password)) {
        return redirect()->back()->with('msg', 'Senha atual incorreta.');
    }

    $user->update([
        'password' => Hash::make($request->password_novo),
    ]);

    return redirect()->route('/')->with('success', 'Senha alterada com sucesso.');
}

public function logout(){
    Auth::guard('web')->logout();
    return redirect('/login');
}
}




