var removeMark = document.querySelector(".remove_mark_signup");
removeMark.addEventListener("click", function () {
  document.getElementById("signup_con").style.display = "none";
  black.style.display='none';
});


function signup(){
    signup_con.style.display = "block";
    if(signup_con.style.display="block"){
        black.style.display = "block";
    } else {
        black.style.display="none";
    }  
};

