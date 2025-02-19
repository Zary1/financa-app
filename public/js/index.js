document.addEventListener("DOMContentLoaded", () => {
  
    // Info Pessoais
document.getElementById("info_pessoais").addEventListener("click", () => {
    document.getElementById("overlay").classList.remove("hidden");
    document.getElementById("create_goals").setAttribute("disabled", true);
    document.getElementById("alterar_senha").setAttribute("disabled", true);
});

document.getElementById("close_info").addEventListener("click", () => {
    document.getElementById("overlay").classList.add("hidden");
    document.getElementById("create_goals").removeAttribute("disabled");
    document.getElementById("alterar_senha").removeAttribute("disabled");
});

// Create Goals
document.getElementById("create_goals").addEventListener("click", () => {
    document.getElementById("goals").classList.remove("hidden");
    document.getElementById("info_pessoais").setAttribute("disabled", true);
    document.getElementById("alterar_senha").setAttribute("disabled", true);
});

document.getElementById("close_goals").addEventListener("click", () => {
    document.getElementById("goals").classList.add("hidden");
    document.getElementById("info_pessoais").removeAttribute("disabled");
    document.getElementById("alterar_senha").removeAttribute("disabled");
});

// Alterar Senha
document.getElementById("alterar_senha").addEventListener("click", () => {
    document.getElementById("senha").classList.remove("hidden");
    document.getElementById("info_pessoais").setAttribute("disabled", true);
    document.getElementById("create_goals").setAttribute("disabled", true);
});

document.getElementById("close_senha").addEventListener("click", () => {
    document.getElementById("senha").classList.add("hidden");
    document.getElementById("create_goals").removeAttribute("disabled");
    document.getElementById("info_pessoais").removeAttribute("disabled");
});

// Show Goals
document.getElementById("all_goals").addEventListener("click", () => {
    document.getElementById("showGoals").classList.remove("hidden");
  
});

document.getElementById("close_show").addEventListener("click", () => {
    document.getElementById("showGoals").classList.add("hidden");
});



  });
  

  document.addEventListener("DOMContentLoaded", () => {
const menuToggle = document.getElementById('menuToggle');
const menu = document.getElementById('menu');

menuToggle.addEventListener('click', () => {
    menu.classList.toggle('hidden');
  
});
console.log(document.getElementById('menuToggle'));
console.log(document.getElementById('menu'));

});