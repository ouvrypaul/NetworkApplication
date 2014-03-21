var letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
var at='@';
var dot='.';

function getXhr(){
	var xhr = null;
	if(window.XMLHttpRequest){
	    xhr = new XMLHttpRequest();
	}else if(window.ActiveXObject){
	    xhr = new ActiveXObject("Msxml2.XMLHTTP");
	}
    return xhr;
}


function deleteUser(){
    var check = document.getElementById("checkbox_delete").checked;
    if (check) {
	var xhr = getXhr();	
	xhr.onreadystatechange = function(){
	    if((xhr.readyState == 4) && (xhr.status == 200)){
		tmp = xhr.responseText;
		disconnect();
	    }	
	}	
	xhr.open("post","./settings/delete.php",true);
	xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset ISO");
	xhr.send();
    } else {
	alert("If you want to delete your account please check the checkbox.");
    }

}

function updateGeneral(){
    var res="";
    var error = document.getElementById("error_general");
    var username = document.getElementById("username2").value;
    
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var password2 = document.getElementById("password_again").value;
    var form = document.getElementById("general_form");
    
    if (!isValid(username,letters)){
            error.innerHTML = "You username must only contains letters.";
            setTimeout("revertErrorSettings()",5000);
    } else if (username.length>10 ||username.length<5) {
            error.innerHTML = "You username must contains between 5 and 10 characters.";
            setTimeout("revertErrorSettings()",5000);
    } else if (!contains(email,at) || !contains(email,dot)) {
        	error.innerHTML = "Please enter a correct email.";
        	setTimeout("revertErrorSettings()",5000);
    } else if (password != password2 || password.length>5) {
            error.innerHTML = "Your two password are not the same or have not enough letters.";
            setTimeout("revertErrorSettings()",5000);
    } else {
            var xhr = getXhr();	
            xhr.onreadystatechange = function(){
                if((xhr.readyState == 4) && (xhr.status == 200)){
                    tmp = xhr.responseText;
                    if (tmp.length < 5) {
                      	form.submit();
                    } else {
                        error.innerHTML = tmp;    
                    }
                }	
            }	
            xhr.open("post","./generalSettings.php",true);
            xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset ISO");
            xhr.send("name="+name+"&username="+username+"&email="+email+"&password="+password);
    }
}

function updateColor() {
	 var error = document.getElementById("error_profil");
	 var form = document.getElementById("color_form");
	 var r = document.getElementById("R").value;
	 var g = document.getElementById("G").value;
	 var b = document.getElementById("B").value;
	 var text = document.getElementById("text").value;
	 
	 var xhr = getXhr();	
     xhr.onreadystatechange = function(){
		if((xhr.readyState == 4) && (xhr.status == 200)){
			tmp = xhr.responseText;
			if (tmp.length < 5) {
				form.submit();
			} else {
				error.innerHTML = tmp;    
			}
		}	
	}	
	xhr.open("post","./settings/colorSettings.php",true);
	xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset ISO");
	xhr.send("r="+r+"&g="+g+"&b="+b+"&text="+text);
            
}

function revertErrorSettings(){
	document.getElementById("error_general").innerHTML = "";
}
