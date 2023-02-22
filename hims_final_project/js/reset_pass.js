function sub_btn(){
	pass= document.getElementById('n_pass').value;
	Tpass= /^([0-9]{1,10}|[a-z]{1,18})/;
	if(pass.length > 7 &&
		Tpass.test(pass)== true){
			document.getElementById('n_pass').style.borderBottom="2px solid green";
		}
		else {
			document.getElementById('n_pass').style.borderBottom="2px solid red ";
}
		var pass = document.getElementById("n_pass").value;
		var confirm_pass = document.getElementById("re_n_pass").value;
		if (pass === confirm_pass) {
			document.getElementById("re_n_pass").style.borderBottom="2px solid green";
		}
		else{
			document.getElementById("re_n_pass").style.borderBottom="2px solid red";
}};

function new_pass(){
	pass= document.getElementById('n_pass').value;
	Tpass= /^([0-9]{1,10}|[a-z]{1,18})/;
	if(pass.length > 7 &&
		Tpass.test(pass)== true){
			document.getElementById('n_pass').style.borderBottom="2px solid green";
		}
		else {
			document.getElementById('n_pass').style.borderBottom="2px solid red ";
}};
function confirm_pass(){
	var pass = document.getElementById("n_pass").value;
  var confirm_pass = document.getElementById("re_n_pass").value;
  if (pass === confirm_pass &&
			isNaN(confirm_pass)==true &&
			confirm_pass.length > 7){
    document.getElementById("re_n_pass").style.borderBottom="2px solid green";
}
  else{
		document.getElementById("re_n_pass").style.borderBottom="2px solid red";
}};
