@extends('layout.main')
@section('title','Finança')
@section('content')

<section class="flex w-full space-x-4 p-1 h-screen">

    @include('financas.users')
  
    <div class="mt-4 bg-white p-2 rounded-lg shadow-lg mx-auto h-[140px]">
    <form action="/update/{{$financa->id }}" method="post" class="space-x-4">
        @csrf
        <div class="flex space-x-4">
            <div>
                <label for="descricao" class="block text-gray-700 font-semibold mb-2">Descrição</label>
                <input type="text" name="description" value="{{ $financa->description }}"
                       id="descricao"
                       class="w-[240px] p-3 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none"
                       required>
            </div>

            <div>
                <label for="valor" class="block text-gray-700 font-semibold mb-2">Valor (€)</label>
                <input type="text" name="valor" id="valor" value="{{ $financa->valor }}"
                       class="w-[240px] p-3 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none"
                       required>
            </div>

            <div>
                <label for="tipo" class="block text-gray-700 font-semibold mb-2">Tipo</label>
                <select name="tipo" id="tipo"
                        class="w-[100px] p-3 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none">
                    <option value="entrada" {{ $financa->tipo == 'entrada' ? 'selected' : '' }}>Entrada</option>
                    <option value="saida" {{ $financa->tipo == 'saida' ? 'selected' : '' }}>Saída</option>
                </select>
            </div>

            <div class="mt-8">
                <button type="submit"
                        class="bg-purple text-white p-3
                         ml-4 rounded-lg hover:bg-purple-800 transition duration-300">
                    Atualizar
                </button>
            </div>
        </div>
    </form>
</div>



</section>

@endsection
