var removeMarkLogin = document.querySelector(".remove_mark_login");
removeMarkLogin.addEventListener("click", function () {
  document.getElementById("login_con").style.display = "none";
  black.style.display='none';
});


function login(){
    login_con.style.display="block";
    if( login_con.style.display="block"){
        black.style.display="block";
    } else {
        black.style.display="none";
    }  
}