@extends('layout.main')
@section('title','Finança')
@section('content')


<section class="flex w-full space-x-4 p-1 h-screen xs:flex-col lg:flex-row overflow-x-hidden">

<div class="flex-1">
    @include('financas.users')
  
</div>
    <div class="h-1/6 bg-cold p-4 rounded-lg w-[800px]
 xs:mt-[-10px] lg:mt-[10px]
shadow-md ">

<h1 class="text-3xl text-white text-center pt-4">Todas as trancações</h1>



 <!-- Exibição de Controle -->
    <div class="mt-5 bg-white rounded-lg shadow-sm">
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-gray-300 px-4 py-2 text-left">Descrição</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Valor</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Tipo</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($financasLimit as $financa)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $financa->description }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ number_format($financa->valor, 2, ',', '.') }} €</td>
                    <td class="border border-gray-300 px-4 py-2">
                        @if($financa->tipo == 'entrada')
                        <i class="fa-solid fa-circle-up text-green-700"></i>
                        @else
                        <i class="fa-solid fa-circle-down text-red-700"></i>
                        @endif
                    </td>
                    <td class="border border-gray-300 px-4 py-2 flex space-x-4">
                        <form action="/deleteFinanca/{{$financa->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button><i class="fa-solid fa-trash text-red-700"></i></button>
                        </form>

                        <a href="/update/{{$financa->id}}">
                            <i class="fa-solid fa-pen-to-square text-green-700"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>









<div class="w-[400px]">
@include('financas.relatorio')
</div>
 



</section>

@endsection
