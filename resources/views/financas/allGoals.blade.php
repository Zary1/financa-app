@extends('layout.main')
@section('title','Finança')
@section('content')

<section class="flex w-full space-x-4 p-1 h-screen xs:flex-col lg:flex-row">

@include('financas.users')

 
  
@extends('layout.main')
@section('title','Finança')
@section('content')

<section class="flex w-full space-x-4 p-1 lg:h-screen xs:h-full xs:flex-col lg:flex-row">

@include('financas.users')

 

  <div class="bg-white text-black p-6 rounded-lg shadow-lg lg:w-[3250px] xs:w-[450px] lg:h-full xs:h-full">
   
    <h2 class="text-2xl font-bold mb-6 text-center xs:text-left">Meus Objetivos</h2>

    <!-- Grid de Goals -->
    <div class="grid grid-cols-1 xs:grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6  ">
      @foreach($goals as $goal)
      <div class="bg-purple-100 p-4 rounded-lg shadow-md">
        <h3 class="text-lg font-semibold mb-2 flex items-center gap-2">
          <i class="fa-solid fa-bullseye text-purple-500"></i> {{ $goal->goal_name }}
        </h3>
        
        <p>
          <i class="fa-solid fa-coins text-purple"></i>
          <span class="font-medium">Meta:</span> {{ number_format($goal->goal_amount, 2) }} €
        </p>

        <p>
          <i class="fa-solid fa-piggy-bank text-cold"></i>
          <span class="font-medium">Economizado:</span> {{ number_format($goal->amount_save, 2) }} €
        </p>

        <p>
          <i class="fa-solid fa-file-alt text-purple"></i>
          <span class="font-medium">Descrição:</span> {{ $goal->goal_description }}
        </p>

        <p>
          <i class="fa-solid fa-calendar-alt text-cold"></i>
          <span class="font-medium">Prazo:</span> {{ \Carbon\Carbon::parse($goal->goal_deadline)->format('d/m/Y') }}
        </p>

        <p>
          @if($goal->status == 'pendente')
          <i class="fa-solid fa-hourglass-half text-yellow-500"></i> Pendente
          @else
          <i class="fa-solid fa-check-circle text-green-500"></i> Concluído
          @endif
        </p>

        <!-- Botão de editar -->
        <a href="/goals/{{$goal->id}}" class="absolute bottom-4 right-4 text-blue-600 hover:text-blue-800">
          <i class="fa-solid fa-edit"></i>
        </a>
      </div>
      @endforeach
    </div>

    <!-- Botão para apagar todos os Goals -->
    <div class="mt-8 text-center">
      <form action="/deleteallGoals" method="post">
        @csrf
        @method('DELETE')
        <button class="bg-purple text-white px-6 py-2 rounded-lg hover:bg-cold transition-all duration-300">
          <i class="fa-solid fa-trash"></i> Apagar Todos
        </button>
      </form>
    </div>
  </div>








</section>

<script src="/js/index.js"></script>
@endsection


@endsection
