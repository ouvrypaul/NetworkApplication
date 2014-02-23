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


function plus(idMovie){
    if (document.getElementById("time").value*1<20) {
        document.getElementById("time").value = document.getElementById("time").value*1+1;
    }      
}

function moins(idMovie){
    if (document.getElementById("time").value*1>0) {
        document.getElementById("time").value = document.getElementById("time").value*1-1;
    }
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


function change(number) {
    if (number==0) {
        document.getElementById("title_text").disabled = !document.getElementById("title_text").disabled;
        document.getElementById("text_text").disabled = !document.getElementById("text_text").disabled;
    } else if (number==1) {
        document.getElementById("img_finder").disabled = !document.getElementById("img_finder").disabled;
        document.getElementById("submit").disabled = !document.getElementById("submit").disabled;
    }
    
    
    
}