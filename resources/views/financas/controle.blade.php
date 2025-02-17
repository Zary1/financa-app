<div class="bg-cold p-4 rounded-lg shadow-md w-full h-1/6">

    <h1 class="text-3xl text-white text-center pt-4">Controle financeiro</h1>
    <div class=" flex justify-center items-center space-x-6 mt-3 ">
        <div class="bg-white w-1/4 rounded-lg shadow-lg  h-[100px] p-8 ">
            <div class="flex  items-center space-x-2 justify-center ">
            <h2 class="text-lg text-center">Total</h2> 
             <i class="fa-solid fa-euro-sign text-green-700"></i> </div>
            <p  class="text-center text-lg"> <span class="font-bold">{{ $totalGeral }} €</span></p>
        </div>
        <div class="bg-white w-1/4 rounded-lg shadow-lg h-[100px] p-8 ">
            <div  class="flex  items-center space-x-2 justify-center ">
            <h2 class="text-lg text-center">Entrada</h2>
            <i class="fa-solid fa-circle-up text-green-700"></i>  </div>
            <p class="text-center text-lg">
            <span class="font-bold">{{   $totalEntrada  }} €</span></p>
            </p>
          
          
        </div>  
        <div class="bg-white w-1/4 rounded-lg shadow-lg h-[100px] p-8 ">
            <div  class="flex  items-center space-x-2 justify-center ">
            <h2 class="text-lg text-center">Saida</h2>
             <i class="fa-solid fa-circle-down text-red-700"></i>  </div>
            <p class="text-center text-lg"> <span class="font-bold">{{  $totalSaida}} €</span></p>
          
         
        </div>
    </div>
    <!-- formulario sumbit -->

    <div class="mt-4 bg-white p-2 rounded-lg shadow-lg mx-auto h-[140px]">
    <form action="/financa" method="post" class="space-x-4">
        @csrf
        <div class="flex space-x-4">
            <div >
                <label for="descricao" class="block text-gray-700 font-semibold mb-2">Descrição</label>
                <input type="text" name="description" id="descricao" placeholder="Ex: Salário"
                    class="w-[240px] p-3 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none"
                    required>
            </div>

            <div>
                <label for="valor" class="block text-gray-700 font-semibold mb-2">Valor (€)</label>
                <input type="text" name="valor" id="valor" placeholder="Ex: 1000"
                    class="w-[240px] p-3 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none"
                    required>
            </div>

            <!-- Seleção de Tipo (Entrada/Saída) -->
            <div>
                <label for="tipo" class="block text-gray-700 font-semibold mb-2">Tipo</label>
                <select name="tipo" id="tipo"
                    class="w-[100px] p-3 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none">
                    <option value="entrada">Entrada</option>
                    <option value="saida" >Saída</option>
                </select>
            </div>
 <!-- Botão de Submissão -->
      <div class="mt-8">
        <button type="submit"
            class="bg-purple text-white p-3 ml-6 rounded-lg hover:bg-cold transition duration-300">
            Adicionar
        </button>
        </div>

        </div>

       
    </form>
</div>

<!-- show controle -->
 <div class="mt-5 bg-white  rounded-lg shadow-sm">
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
        @foreach($financas as $financa)
        <tr>
            <td class="border border-gray-300 px-4 py-2">{{ $financa->description }}</td>
            <td class="border border-gray-300 px-4 py-2">{{ number_format($financa->valor, 2, ',', '.') }} €</td>
            <td class="border border-gray-300 px-4 py-2">
                @if($financa->tipo =='entrada')
                <i class="fa-solid fa-circle-up text-green-700"></i>
                @else($financa->tipo =='saida')
                <i class="fa-solid fa-circle-down text-red-700"></i> 
                @endif
            </td>
            <td class="border border-gray-300 px-4 py-2 flex space-x-4">
            <form action="/deleteFinanca/{{$financa->id}}" method="post">
                @csrf
                @method('DELETE')
                    <button><i class="fa-solid fa-trash text-red-700"></i></button>
                </form>
           
                <form action="" method="post">
                <i class="fa-solid fa-pen-to-square text-green-700"></i>
                </form>
                </td>
               
        </tr>
      
        @endforeach
    </tbody>
</table>

 </div>

    </div>

