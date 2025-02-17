<div class="bg-purple w-[600px] rounded-lg h-full">
      @if(Auth::guard('web')->check())

       <img src="{{ asset('img/profile_images/'.Auth::guard('web')->user()->profile_image) }}" alt="" 
       class="w-1/3 mx-auto rounded-full shadow-md mt-6">


    <p class="text-white text-xl text-center pb-9">{{Auth::guard('web')->user()->name}}</p>
     
     @endif
     <div class="space-y-9 pl-9">
        <p class="text-white text-xl cursor-pointer hover:text-cold">
          <i class="fas fa-wallet w-6 h-6 inline-block mr-2"></i> Saldo atual:
          <span class="font-bold">{{ $totalGeral }} €</span></p>


       
        </p>
        <p class="text-white text-xl cursor-pointer hover:text-cold">
          <i class="fas fa-chart-line w-6 h-6 inline-block mr-2"></i> Resumo financeiro</p>
        <p class="text-white  text-xl cursor-pointer hover:text-cold"  id="info_pessoais">
          <i class="fas fa-user w-6 h-6 inline-block mr-2"> </i> Informações pessoais</p>
        <p class="text-white  text-xl cursor-pointer hover:text-cold"   id="create_goals">
          <i class="fas fa-bullseye w-6 h-6 inline-block mr-2"></i> Criar meta de economia</p>
        <p class="text-white  text-xl cursor-pointer hover:text-cold">
          <i class="fas fa-file-alt w-6 h-6 inline-block mr-2"></i>Todas as metas</p>
        <p class="text-white  text-xl cursor-pointer hover:text-cold"   id="alterar_senha">
          <i class="fas fa-cogs w-6 h-6 inline-block mr-2"></i> Alterar senha</p> 
          <form action="/logout" method="post">
            @csrf
        <p class="text-white  text-xl cursor-pointer hover:text-cold"    
        onclick="event.preventDefault(); this.closest('form').submit()">
          <i class="fas fa-sign-out-alt w-6 h-6 inline-block mr-2" >
    
          </i> Logout</p> 
          </form>
      </div>
    
    </div>


<!-- div informacoes pessoais -->
<div id="overlay" class="fixed left-1/4 inset-x-0  
bg-black bg-opacity-30 hidden flex items-center justify-center h-screen">
    <!-- Caixa de informações pessoais -->
    <div id="show_div_info" class="bg-white text-black pl-6 pt-4 rounded-lg shadow-lg   w-[500px] h-[300px]">
    <div class="flex cursor-pointer  items-center justify-center w-[50px] h-[30px] ml-[400px] bg-purple rounded-full" id="close_info">
    <i class="fa-solid fa-delete-left text-red-500 text-lg"></i>
    </div>
        <p class="text-lg font-semibold p-4 text-cold ">  <i class="fas fa-user w-6 h-6 inline-block mr-2"></i> 
          {{ Auth::guard('web')->user()->name }}</p>
        <p class="text-lg font-semibold p-4 text-cold">  <i class="fa-solid fa-envelope w-6 h-6 inline-block mr-2"></i> 
          {{ Auth::guard('web')->user()->email }}</p>
        <p class="text-lg font-semibold p-4 text-cold"><i class="fa-solid fa-phone w-6 h-6 inline-block mr-2"></i> 
          {{ Auth::guard('web')->user()->phone }}</p>
        <p class="text-lg font-semibold p-4 text-cold"><i class="fa-solid fa-location-pin w-6 h-6 inline-block mr-2"></i> 
          {{ Auth::guard('web')->user()->address}}</p>
          
    </div>
</div>



<!-- div goals -->
<div id="goals" class="fixed left-1/4 inset-x-0 hidden bg-black bg-opacity-30
  flex items-center justify-center h-screen">
 <div class="bg-white text-black pl-6 pt-4 rounded-lg shadow-lg  w-[600px]  ">
 <div class="flex cursor-pointer  items-center justify-center
  w-[50px] h-[30px] ml-[500px] bg-purple rounded-full" id="close_goals">
    <i class="fa-solid fa-delete-left text-red-500 text-lg"></i>
    </div>
<form action="/create-goal" method="POST" class="space-y-4 p-6">
<div class="row_mensagem">
        @if(session('sucess'))
    <p class="text-cold">{{ session('sucess') }}</p>
             @endif

        </div>
    @csrf

    <input type="text" id="goal_name" name="goal_name" placeholder="Nome da Meta"
     required class="w-full p-2 rounded-lg text-black border-cold " >
    <input type="number" id="goal_amount" name="goal_amount" placeholder="Valor Alvo (€):"
    required step="0.01" class="w-full p-2 rounded-lg text-black  border-cold ">
    <input type="number" id="goal_amount" name="amount_save" placeholder="Valor disponível (€):"
    required step="0.01" class="w-full p-2 rounded-lg text-black  border-cold ">
    <input type="date" id="goal_deadline" name="goal_deadline" placeholder="Data Limite"
     required class="w-full p-2 rounded-lg text-black  border-cold ">
    <textarea id="goal_description" name="goal_description" placeholder="Descrição "
     class="w-full p-2 rounded-lg text-black   border-cold "></textarea>
    <button type="submit" class="bg-purple text-white px-4 py-2 rounded-lg hover:bg-purple-800">
        Criar meta de economia
    </button>
</form>

</div>
</div>
<!-- alterar senha -->
<div id="senha" class="fixed left-1/4 hidden inset-x-0 bg-black bg-opacity-30 
flex items-center justify-center h-screen">
    <div class="bg-white text-black pl-6 pt-4 rounded-lg shadow-lg w-[600px]">
    <div class="row_mensagem">
        @if(session('sucess'))
    <p class="text-cold">{{ session('sucess') }}</p>
             @endif

        </div>
        <div id="close_senha" class="flex cursor-pointer items-center justify-center
         w-[50px] h-[30px] ml-[500px] bg-purple rounded-full">
            <i class="fa-solid fa-delete-left text-red-500 text-lg"></i>
        </div>
        
        <form action="/alterar-senha" method="POST" class="space-y-4 p-6">
            @csrf
            <input type="password" name="password_actual" placeholder="Senha atual"
                required class="w-full p-2 rounded-lg text-black border-cold focus:outline-none focus:ring-2 focus:ring-purple-500">

            <input type="password" name="password_novo" placeholder="Nova senha"
                required class="w-full p-2 rounded-lg text-black border-cold focus:outline-none focus:ring-2 focus:ring-purple-500">

            <button type="submit" class="bg-purple text-white px-4 py-2 rounded-lg hover:bg-purple-800">
                Alterar senha
            </button>
        </form>
    </div>
</div>

