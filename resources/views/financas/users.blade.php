<body>

<div class="bg-purple w-[400px] 
rounded-lg h-full xs:w-full lg:flex-col xm:flex-row">


<div class="flex-col xs:mx-[60px] lg:mx-[10px]">
@if(Auth::guard('web')->check()) 
       <img src="{{ asset('img/profile_images/'.Auth::guard('web')->user()->profile_image) }}" alt="" 
       class="w-[100px] mx-auto rounded-full shadow-md mt-4">
    <p class="text-white text-md text-center pb-0 pt-2 ">{{Auth::guard('web')->user()->name}}</p>
  
     @endif
     </div>
     <div class="relative">


  <button id="menuToggle" class="sm:hidden p-4 text-white">
    <i class="fas fa-bars text-2xl"></i>
  </button>

  
  <div id="menu" class="hidden sm:block space-y-9 pl-9 bg-gray-500 sm:bg-transparent sm:relative lg:w-[300px]
  absolute top-8 left-0 w-full sm:w-auto">

    <p class="text-white text-xl cursor-pointer hover:text-cold">
      <i class="fas fa-home w-6 h-6 inline-block mr-2"></i>
      <a href="/">Home</a>
    </p>

    <p class="text-white text-xl cursor-pointer hover:text-cold">
      <i class="fas fa-wallet w-6 h-6 inline-block mr-2"></i>
      Saldo atual: <span class="font-bold">{{ $totalGeral }} €</span>
    </p>

    <p class="text-white text-xl cursor-pointer hover:text-cold">
      <i class="fas fa-chart-line w-6 h-6 inline-block mr-2"></i>
      <a href="allTrancacoes">Todas transações</a>
    </p>

   <!-- Botão para Informações Pessoais -->
  <button id="info_pessoais" class="text-white text-xl cursor-pointer hover:text-cold">
    <i class="fas fa-user w-6 h-6 inline-block mr-2"></i>
    Informações pessoais
  </button>

  <!-- Botão para Criar Metas -->
  <button id="create_goals" class="text-white text-xl cursor-pointer hover:text-cold">
    <i class="fas fa-bullseye w-6 h-6 inline-block mr-2"></i>
    Criar meta de economia
  </button>

  <p class="text-white text-xl cursor-pointer hover:text-cold" id="all_goals">
    <a href="/allGoals">
      <i class="fas fa-file-alt w-6 h-6 inline-block mr-2"></i>
      Todas as metas
    </a>
  </p>

  <button id="alterar_senha" class="text-white text-xl cursor-pointer hover:text-cold">
    <i class="fas fa-cogs w-6 h-6 inline-block mr-2"></i>
    Alterar senha
  </button>
  <p class="text-white text-xl cursor-pointer hover:text-cold" id="register">
    <a href="/register">
    <i class="fas fa-file-signature w-6 h-6 inline-block mr-2"></i>
      Registrar
    </a>
  </p>

    <form action="/logout" method="post">
      @csrf
      <p class="text-white text-xl cursor-pointer hover:text-cold" onclick="event.preventDefault(); this.closest('form').submit()">
        <i class="fas fa-sign-out-alt w-6 h-6 inline-block mr-2"></i>
        Logout
      </p>
    </form>

  </div>

</div>


  
    </div>


<!-- div informacoes pessoais -->
<div id="overlay" class="fixed lg:left-1/4 inset-x-0  xs:left-0
bg-black bg-opacity-30 hidden flex items-center justify-center h-screen">
    <!-- Caixa de informações pessoais -->
    <div id="show_div_info" class="bg-white text-black pl-6 pt-4 rounded-lg shadow-lg  z-index: 9999  xs:w-[450px]
    lg:w-[500px] h-[300px]">
    <div class="flex cursor-pointer  items-center justify-center w-[50px] h-[30px] lg:ml-[400px] xs:ml-[360px]
     bg-purple rounded-full" id="close_info">
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

<!-- div criar goals -->
<div id="goals" class="fixed lg:left-1/4 inset-x-0  xs:left-0
bg-black bg-opacity-30 hidden flex items-center justify-center h-screen">
 <div class="bg-white text-black pl-6 pt-4 rounded-lg shadow-lg  xs:w-[450px]
    lg:w-[600px]">
 <div class="flex cursor-pointer  items-center justify-center
  w-[50px] h-[30px]  lg:ml-[500px] xs:ml-[360px] bg-purple rounded-full" id="close_goals">
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
    <input type="number" id="goal_save" name="amount_save" placeholder="Valor disponível (€):"
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
<div id="senha" class="fixed lg:left-1/4 inset-x-0  xs:left-0
bg-black bg-opacity-30 hidden flex items-center justify-center h-screen">
    <div class="bg-white text-black pl-6 pt-4 rounded-lg shadow-lg lg:w-[600px] xs:w-[450px]">
    <div class="row_mensagem">
        @if(session('sucess'))
    <p class="text-cold">{{ session('sucess') }}</p>
             @endif

        </div>
        <div id="close_senha" class="flex cursor-pointer items-center justify-center
         w-[50px] h-[30px]  bg-purple rounded-full lg:ml-[500px] xs:ml-[360px] ">
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

<script src="/js/index.js"></script>
</body>