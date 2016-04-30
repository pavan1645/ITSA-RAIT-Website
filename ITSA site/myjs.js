var email2=true;
/*function emailBlur1(){
	var x = document.getElementById("inputEmail1").value;
	var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
    	document.getElementById("emailDiv1").className = "has-error";
    	document.getElementById("emailHelpBlock1").innerHTML = "Enter a valid email!";
        email1=false;
    }
    else{
    	document.getElementById("emailDiv1").className = "has-success";
    	document.getElementById("emailHelpBlock1").innerHTML = "";
    }
}*/
/*function emailBlur2(){
    var x = document.getElementById("inputEmail2").value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        document.getElementById("emailDiv2").className = "has-error";
        document.getElementById("emailHelpBlock2").innerHTML = "Enter a valid email!";
        var email2=false;
    }
    else{
        document.getElementById("emailDiv2").className = "has-success";
        document.getElementById("emailHelpBlock2").innerHTML = "";
    }
}*/
function resetSignUp1(){
	document.getElementById("inputEmail1").value = "";
	document.getElementById("inputPassword1").value = "";
	document.getElementById("emailDiv1").className = "";
    document.getElementById("passwordDiv1").className = "";
    document.getElementById("emailHelpBlock1").innerHTML = "";
    document.getElementById("passwordHelpBlock1").innerHTML = "";
}
function resetSignUp2(){
    document.getElementById("inputEmail2").value = "";
    document.getElementById("inputPassword2").value = "";
    document.getElementById("emailDiv2").className = "";
    document.getElementById("emailHelpBlock2").innerHTML = "";
}
function registercheck(){
    var pass1 = document.getElementById("inputPassword11").value;
    var pass2 = document.getElementById("inputPassword12").value;
    var email = document.getElementById("inputEmail1").value;
    var passok = ok = true;
    if (pass1 != pass2) passok = false;
    if(passok==false){
        if(!passok) {
            alert("Passwords do not match");
            document.getElementById("password1div").className="has-error";
        } else document.getElementById("password1div").className="has-error";
        ok=false;
    }
    return ok;
}
function hide(){
    document.getElementById("register").style.display = "none";
}