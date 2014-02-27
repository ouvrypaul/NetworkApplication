function getXhr(){
	var xhr = null;
	if(window.XMLHttpRequest){
	    xhr = new XMLHttpRequest();
	}else if(window.ActiveXObject){
	    xhr = new ActiveXObject("Msxml2.XMLHTTP");
	}
    return xhr;
}

function signupSlides(i){
    if (i==1) {
       document.getElementById("panel").style.marginLeft="-400px";
    } else if(i==2){
       document.getElementById("panel").style.marginLeft="0px";
    }
}


var letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
 
function isValid(param,val) {
  if (param == "") {
    return false;
  }
  for (i=0; i<param.length; i++) {
    if (val.indexOf(param.charAt(i),0) == -1) return false;
  }
  return true;
}

function addSignUp(){
    var res="";
    var error = document.getElementById("error_signup");
    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var password2 = document.getElementById("password_again").value;
    
    if (!isValid(username,letters)){
            error.innerHTML = "You username must only contains characters (A-Za-z).";
            setTimeout("revertErrorSignup()",5000);
    } else if (username.length>10 ||username.length<5) {
            error.innerHTML = "You username must contains between 5 and 10 characters.";
            setTimeout("revertErrorSignup()",5000);
    } else if (password != password2) {
            error.innerHTML = "Your two password are not the same.";
            setTimeout("revertErrorSignup()",5000);
    } else {
            var xhr = getXhr();	
            xhr.onreadystatechange = function(){
                if((xhr.readyState == 4) && (xhr.status == 200)){
                    tmp = xhr.responseText;
                    if (tmp=="") {
                            window.location='./pages/userpage.php';
                    } else {
                            error.innerHTML = tmp;
                            
                    }
                }	
            }	
            xhr.open("post","./pages/signup.php",true);
            xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset ISO");
            xhr.send("name="+name+"&username="+username+"&email="+email+"&password="+password);
    }
    return false;	
}

function revertErrorSignup(){
	document.getElementById("error_signup").innerHTML = "";
}

function revertErrorLogin(){
	document.getElementById("error_login").innerHTML = "";
}
