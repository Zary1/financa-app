
@extends('layout.main')
@section('title','Finança')
@section('content')

<section class="flex w-full space-x-4 p-1 h-screen j">

    @include('financas.users')
  

  
    <!-- Grid de Goals -->
  

<div class="bg-white text-black mt-6 p-6 rounded-lg shadow-lg w-[900px] h-[560px] 
 ">


<form action="/goals/{{$goal->id}}" method="POST" class="space-y-4  ">
<div class="row_mensagem">
        @if(session('sucess'))
    <p class="text-cold">{{ session('sucess') }}</p>
             @endif

        </div>
    @csrf
    <select name="status" id="status" 
      class="w-[150px] ml-[690px] p-3 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none">
      <option value="concluido" {{ $goal->status == 'concluido' ? 'selected' : '' }}>Concluído</option>
      <option value="pendente" {{ $goal->status == 'pendente' ? 'selected' : '' }}>Pendente</option>
  </select>

    <input type="text" id="goal_name" name="goal_name" placeholder="Nome da Meta"
     required class="w-full p-2 rounded-lg text-black border-cold " value="{{$goal->goal_name}}" >
    <input type="number" id="goal_amount" name="goal_amount" value="{{$goal->goal_amount}}"
   
    required step="0.01" class="w-full p-2 rounded-lg text-black  border-cold ">
    <input type="number" id="goal_save" name="amount_save" value="{{$goal->amount_save}}"
    required step="0.01" class="w-full p-2 rounded-lg text-black  border-cold ">
    <input type="date" id="goal_deadline" name="goal_deadline" placeholder="Data Limite"
     required class="w-full p-2 rounded-lg text-black  border-cold "  value="{{$goal->goal_deadline}}">
    <textarea id="goal_description" name="goal_description" placeholder="Descrição "
     class="w-full p-2 rounded-lg text-black h-[140px] 
       border-cold " >{{$goal->goal_description}}</textarea>
   
    <button type="submit" class="bg-purple text-white px-4 py-2 rounded-lg hover:bg-purple-800">
        Actualizar meta de economia
    </button>
</form>

</div>





</section>

@endsection
