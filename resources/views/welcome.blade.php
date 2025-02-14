@extends('layout.main')
@section('title','financa')
@section ('content')


<section class="flex w-full space-x-6 p-1 h-screen ">
    <div class="bg-purple w-1/4 rounded-lg h-full">
    @foreach($users as $user)
    <img src="{{'img/profile_images/'.$user->profile_image}}" alt="" class="w-1/2 mx-auto">
   
    <!-- <p class="text-white text-xl text-center">{{$user->name}}</p> -->
     @endforeach
     <div class="space-y-9 p-6">
        <p class="text-white text-xl"><i class="fas fa-wallet w-6 h-6 inline-block mr-2"></i> Saldo atual</p>
        <p class="text-white text-xl"><i class="fas fa-chart-line w-6 h-6 inline-block mr-2"></i> Resumo financeiro</p>
        <p class="text-white  text-xl"><i class="fas fa-user w-6 h-6 inline-block mr-2"></i> Informações pessoais</p>
        <p class="text-white  text-xl"><i class="fas fa-bullseye w-6 h-6 inline-block mr-2"></i> Criar meta de economia</p>
        <p class="text-white  text-xl"><i class="fas fa-file-alt w-6 h-6 inline-block mr-2"></i> Relatório</p>
        <p class="text-white  text-xl"><i class="fas fa-cogs w-6 h-6 inline-block mr-2"></i> Configurações</p> 
        <p class="text-white  text-xl"><i class="fas fa-sign-out-alt w-6 h-6 inline-block mr-2"></i> Logout</p> 

      </div>
    
    </div>






    <div class="bg-cold p-4 rounded-lg shadow-md w-full h-1/4">
        <h1>dsas</h1>
    </div>

</section>

@endsection