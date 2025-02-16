document.getElementById("info_pessoais").addEventListener("click", () => {
  
    document.getElementById("overlay").classList.remove("hidden"); 
});
document.getElementById("close_info").addEventListener("click",()=>{
    document.getElementById("overlay").classList.add("hidden"); 
})

// create goals

document.getElementById("create_goals").addEventListener("click", () => {
  
    document.getElementById("goals").classList.remove("hidden"); 
});
document.getElementById("close_goals").addEventListener("click",()=>{
    document.getElementById("goals").classList.add("hidden"); 
})
// alterar senha

document.getElementById("alterar_senha").addEventListener("click", () => {
  
    document.getElementById("senha").classList.remove("hidden"); 
});
document.getElementById("close_senha").addEventListener("click",()=>{
    document.getElementById("senha").classList.add("hidden"); 
})