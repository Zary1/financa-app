<div class="lg:w-full xs:w-[450px] ">
<div class="h-1/6 bg-cold p-4 rounded-lg 
 xs:mt-[-10px] lg:mt-[10px]
shadow-md ">
<h1 class="lg:text-3xl text-white text-center pt-4 xs:text-2xl 
 ">
    Controle financeiro</h1>
</div>
    
    <div class="flex justify-center items-center space-x-6 mt-3  
    xs:mt-[-20px] 
    
    flex-col xs:flex-row sm:flex-row md:flex-row">
        <div class="bg-white w-full xs:w-[150px] sm:[150px]
        xs:p-5 lg:p-8
       
        md:[200px] rounded-lg shadow-lg h-[100px] p-8">
            <div class="flex items-center space-x-2 justify-center">
                <h2 class="text-lg text-center">Total</h2>
                <i class="fa-solid fa-euro-sign text-green-700"></i>
            </div>
            <p class="text-center text-lg">
                <span class="font-bold">{{ $totalGeral }} €</span>
            </p>
        </div>
        <div class="bg-white w-full xs:w-[150px] sm:[150px]
        md:[200px] rounded-lg shadow-lg h-[100px]  xs:p-5 lg:p-8">
            <div class="flex items-center space-x-2 justify-center">
                <h2 class="text-lg text-center">Entrada</h2>
                <i class="fa-solid fa-circle-up text-green-700"></i>
            </div>
            <p class="text-center text-lg">
                <span class="font-bold">{{ $totalEntrada }} €</span>
            </p>
        </div>
        <div class="bg-white w-full xs:w-[150px] sm:[150px]
        md:[200px] rounded-lg shadow-lg h-[100px]  xs:p-5 lg:p-8">
            <div class="flex items-center space-x-2 justify-center">
                <h2 class="text-lg text-center">Saida</h2>
                <i class="fa-solid fa-circle-down text-red-700"></i>
            </div>
            <p class="text-center text-lg">
                <span class="font-bold">{{ $totalSaida }} €</span>
            </p>
        </div>
    </div>

    <!-- Formulário de Submissão -->
    <div class="mt-4 bg-white p-2 
     rounded-lg shadow-lg mx-auto lg:h-[140px] xs:h-[390px] ">
        <form action="/financa" method="post" 
        class="space-x-4">
            @csrf
            <div class="lg:flex lg:space-x-2 xs:space-y-2 flex-col xs:flex-row sm:flex-row md:flex-row  ">
                <div>
                <label for="descricao" class="block text-gray-700 font-semibold lg:mb-2 xs:mb-3">Descrição</label>
                    
                <input type="text" name="description" id="descricao"  placeholder="Ex: Salário"
        class="lg:w-[240px] xs:w-full p-3 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none" required>
                </div>

                <div>
                    <label for="valor" class="block text-gray-700 
                    font-semibold lg:mb-2 xs:mt-4 lg:mt-0">Valor (€)</label>
                    <input type="text" name="valor" id="valor" placeholder="Ex: 1000"
                    class="lg:w-[240px] xs:w-full p-3 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none" required>
                </div>

    
                <div>
                    <label for="tipo" class="block text-gray-700 font-semibold lg:mb-2 xs:mb-3 lg:mt-0 xs:mt-4">Tipo</label>
                    <select name="tipo" id="tipo"
                        class="lg:w-[240px] xs:w-full p-3 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none">
                        <option value="entrada">Entrada</option>
                        <option value="saida">Saída</option>
                    </select>
                </div>

                <!-- Botão de Submissão -->
                <div class="mt-8">
                    <button type="submit"
                        class="bg-purple  text-white p-3 ml-0  xs:w-full rounded-lg hover:bg-cold transition duration-300">
                        Adicionar
                    </button>
                </div>
            </div>
        </form>
    </div>

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

    <div class="mt-5 flex justify-center">
        <a href="" class="btn bg-purple text-white p-3 rounded-lg hover:bg-cold">Mostrar todos</a>
    </div>
</div>
