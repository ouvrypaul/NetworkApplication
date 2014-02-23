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