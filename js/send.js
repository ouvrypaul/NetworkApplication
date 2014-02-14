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