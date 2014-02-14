function getXhr(){
	var xhr = null;
	if(window.XMLHttpRequest){
	    xhr = new XMLHttpRequest();
	}else if(window.ActiveXObject){
	    xhr = new ActiveXObject("Msxml2.XMLHTTP");
	}
    return xhr;
} 



function nav(index){
    var pageName = new Array(3);
    pageName[0] = "news.php";
    pageName[1] = "inbox.php";
    pageName[2] = "friends.php";
    pageName[3] = "send.php"
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
    xhr.send();
    
}