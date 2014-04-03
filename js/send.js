function getXhr(){
	var xhr = null;
	if(window.XMLHttpRequest){
	    xhr = new XMLHttpRequest();
	}else if(window.ActiveXObject){
	    xhr = new ActiveXObject("Msxml2.XMLHTTP");
	}
    return xhr;
} 


function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("Text",ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("Text");
    if(ev.target.id == "div_send_list" || ev.target.id == "div_friend_list") { 
        ev.target.appendChild(document.getElementById(data));
    }
}

function addAll() {
    var doc1 = document.getElementById("div_send_list");
    var doc2 = document.getElementById("div_friend_list");
    var nodes = doc2.childNodes;
    var length = nodes.length;
    for (i=0; i<length; i++){
        doc1.appendChild(nodes[0]);
    }
}


function removeAll(args) {
    var doc1 = document.getElementById("div_send_list");
    var doc2 = document.getElementById("div_friend_list");
    var nodes = doc1.childNodes;
    var length = nodes.length;
    for (i=0; i<length; i++){
        doc2.appendChild(nodes[0]);
    }
}


function change() {
    document.getElementById("title_text").disabled = false;
    document.getElementById("img_finder").disabled = true;
    document.getElementById("submit").disabled = true;  
}


function changeInv() {
    document.getElementById("title_text").disabled = true;
    document.getElementById("img_finder").disabled = false;
    document.getElementById("submit").disabled = false; 
}

function send() {
    var numberReceiver = document.getElementById("div_send_list").childNodes.length;
    var checkText = document.getElementById("checkbox_text");
    var checkImg = document.getElementById("checkbox_img");
    var textTitle = document.getElementById("title_text");
    var imgPreview = document.getElementById("img_preview");
    var feedback = document.getElementById("feedback");
    
    if ((checkText.checked || checkImg.checked)) {
        if (numberReceiver != 0 ) {
             if (checkText.checked && textTitle.value != "") {
                sendMessageAll(textTitle.value,0);
            } else if (checkImg.checked && imgPreview.childNodes.length !=0) {
                sendMessageAll("",1);
            } else{
                feedback.innerHTML="Please fill your message.";
            }
        } else{
            feedback.innerHTML="Please add receiver(s).";
        }
    } else {
        feedback.innerHTML="Please choose text or image.";
    }
}

function sendMessageAll(text,isImage) {
    var nodes = document.getElementById("div_send_list").childNodes;
    var numberReceiver = document.getElementById("div_send_list").childNodes.length;
    var time = document.getElementById("time").value;
    for(i=0;i<numberReceiver;i++){
        var idReceiver = nodes[i].id.substring(10,nodes[i].id.length);
        var name = nodes[i].firstChild.nodeValue;
        sendMessage(idReceiver,text,isImage,time,name)
    }
    removeAll();
}

function sendMessage(idReceiver,text,isImage,time,name) {
    var feedback = document.getElementById("feedback");
    feedback.innerHTML ="";
    var xhr = getXhr();	
    xhr.onreadystatechange = function(){
        if((xhr.readyState == 4) && (xhr.status == 200)){
            tmp = xhr.responseText;
            if (tmp.length > 10) {
                var para = document.createElement("div");
                var node = document.createTextNode("Error sending to "+name+".");
                para.appendChild(node);
                feedback.appendChild(para);
            } else {
                var para = document.createElement("div");
                var node = document.createTextNode("Message sent to "+name+".");
                para.appendChild(node);
                feedback.appendChild(para);
            }
        }	
    }	
    xhr.open("post","./send/sending.php",true);
    xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset ISO");
    xhr.send("idReceiver="+idReceiver+"&text="+text+"&isImage="+isImage+"&time="+time);
}


function deletePicture() {
    var xhr = getXhr();	
    xhr.onreadystatechange = function(){
        if((xhr.readyState == 4) && (xhr.status == 200)){
            tmp = xhr.responseText;
            nav(3,-1);
        }	
    }	
    xhr.open("post","./send/deletePicture.php",true);
    xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset ISO");
    xhr.send();
}


