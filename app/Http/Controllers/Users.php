<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
        'password' => ['required', 'string', 'min:8', 'confirmed'],
      
    ]);

    $user= new User();
    $user->name=$request->name;
    $user->email=$request->email;
    $user->password=Hash::make($request->password);
    $user->profile_image=$request->profile_image;

    // Processamento da imagem
    if ($request->hasFile('profile_image')&& $request('profile_image')->isValid() ) {
        $requestImage=$request->image;
        $extension=$$requestImage->extension();
        $imageName=md5($requestImage->getClientOriginalName().strtotime("now"))."." .$extension;
        $requestImage->move(public_path('img/profile_image'),$imageName) ;
    } else {
        $requestImage= null; // Caso não tenha imagem
    }
  
    // Criando o usuário
    $user->save();
       
    // Login automático do usuário após o registro
    
   auth()->login($user);
   return redirect()->route('dashboard');

   
}
}




