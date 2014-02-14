function getXhr(){
	var xhr = null;
	if(window.XMLHttpRequest){
	    xhr = new XMLHttpRequest();
	}else if(window.ActiveXObject){
	    xhr = new ActiveXObject("Msxml2.XMLHTTP");
	}
    return xhr;
} 

function searchFriends() {
    var text = document.getElementById("input_search").value;
    if (text != "") {
        var xhr = getXhr();	
        xhr.onreadystatechange = function(){
            if((xhr.readyState == 4) && (xhr.status == 200)){
                tmp = xhr.responseText;
                document.getElementById("div_friend_search").innerHTML = tmp;
            }	
        }	
        xhr.open("post","./friends/friends_search.php",true);
        xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset ISO");
        xhr.send("text="+text);
    }
}

function addRequest(idFriend) {
    var xhr = getXhr();	
    xhr.onreadystatechange = function(){
        if((xhr.readyState == 4) && (xhr.status == 200)){
            tmp = xhr.responseText;
            searchFriends();
            loadFriend();
	    loadRequest();
        }	
    }	
    xhr.open("post","./friends/friends_request.php",true);
    xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset ISO");
    xhr.send("idFriend="+idFriend);
}

function loadFriend() {
        var xhr = getXhr();	
        xhr.onreadystatechange = function(){
            if((xhr.readyState == 4) && (xhr.status == 200)){
                tmp = xhr.responseText;
                document.getElementById("div_friends").innerHTML = tmp;
            }	
        }	
        xhr.open("post","./friends/friends_load.php",true);
        xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset ISO");
        xhr.send();
}


function unfriend(idFriend) {
    var xhr = getXhr();	
    xhr.onreadystatechange = function(){
        if((xhr.readyState == 4) && (xhr.status == 200)){
            tmp = xhr.responseText;
            searchFriends();
            loadFriend();
        }	
    }	
    xhr.open("post","./friends/friends_unfriend.php",true);
    xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset ISO");
    xhr.send("idFriend="+idFriend);
}

function unrequest(idFriend) {
    var xhr = getXhr();	
    xhr.onreadystatechange = function(){
        if((xhr.readyState == 4) && (xhr.status == 200)){
            tmp = xhr.responseText;
            searchFriends();
        }	
    }	
    xhr.open("post","./friends/friends_unrequest.php",true);
    xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset ISO");
    xhr.send("idFriend="+idFriend);
}


function loadRequest() {
    var xhr = getXhr();	
    xhr.onreadystatechange = function(){
        if((xhr.readyState == 4) && (xhr.status == 200)){
            tmp = xhr.responseText;
	    document.getElementById("div_request").innerHTML=tmp;
        }	
    }	
    xhr.open("post","./friends/friends_load_request.php",true);
    xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset ISO");
    xhr.send();
}


function addFriend(idFriend){
	var xhr = getXhr();	
        xhr.onreadystatechange = function(){
        if((xhr.readyState == 4) && (xhr.status == 200)){
            tmp = xhr.responseText;
            searchFriends();
            loadFriend();
	    loadRequest();
        }	
    }	
    xhr.open("post","./friends/friends_add.php",true);
    xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset ISO");
    xhr.send("idFriend="+idFriend);
}