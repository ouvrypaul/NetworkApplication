function unscroll(){	
    var node = document.getElementById("section");
	node.style.height = "12%";
}


function scroll(index){
   var size = new Array(5);
    size[0] = "91%";
    size[1] = "95%";
    size[2] = "95%";
    size[3] = "97%";
    size[4] = "90%";
    var node = document.getElementById("section");
    node.style.height = size[index];
}

function nav(index,send){
    unscroll();
    setTimeout("scroll("+index+")",700);
    setTimeout("tab("+index+","+send+")",450);
}


function getXhr(){
	var xhr = null;
	if(window.XMLHttpRequest){
	    xhr = new XMLHttpRequest();
	}else if(window.ActiveXObject){
	    xhr = new ActiveXObject("Msxml2.XMLHTTP");
	}
    return xhr;
} 

function tab(index,send){
    var pageName = new Array(3);
    pageName[0] = "news.php";
    pageName[1] = "inbox.php";
    pageName[2] = "friends.php";
    pageName[3] = "send.php";
	pageName[4] = "settings.php"
    var xhr = getXhr();	
    xhr.onreadystatechange = function(){
        if((xhr.readyState == 4) && (xhr.status == 200)){
            tmp = xhr.responseText;
            document.getElementById("section").innerHTML = tmp;
            if (index == 2) {
                loadFriend();
                loadRequest();
            }
        }	
    }	
    xhr.open("post","./"+pageName[index],true);
    xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset ISO");
    xhr.send("send="+send);
    
}





function disconnect(){
	document.getElementById("disconnect_form").submit();
}