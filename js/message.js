var i;
var sec;
	
function unlock(idMessage,idTime) {
	var delay = idTime*1000;
	sec = idTime;
	var header = document.getElementById('head_envelope');
	var countdown = document.getElementById('countdown');
	var lock = document.getElementById('lock_envelope');
	var footer = document.getElementById('foot_envelope');
	var message = document.getElementById('message');
	var h2 = document.getElementById('h2');
	
	
	//first animation
	lock.style.WebkitTransform="rotate(180deg)";
	lock.style.transform="rotate(180deg)";
	setTimeout(function(){
		lock.style.WebkitTransform="rotate(45deg)";
		lock.style.transform="rotate(45deg)";
		setTimeout(function(){
			lock.style.WebkitTransform="rotate(105deg)";
			lock.style.transform="rotate(105deg)";
			setTimeout(function(){
				lock.style.WebkitTransform="rotate(90deg)";
				lock.style.transform="rotate(90deg)";
				lock.style.opacity="0";
			},1000);
		},1000);
	},1000);
	
	//open
	setTimeout(function(){
		countdown.innerHTML="Open";
		lock.style.visibility='hidden';
		header.style.top="-50%";
		footer.style.bottom="-50%";	
		h2.style.marginTop="50px";
		displayImage(idMessage);
	},3000);
				
	//when animation finished then wait and close
	var navigatorsProperties=['transitionend','OTransitionEnd','webkitTransitionEnd'];
	for(var i in navigatorsProperties){
		header.addEventListener(navigatorsProperties[i],
		function() {
			init();
			setTimeout(function(){
				message.remove();
				header.style.top='0px';
				footer.style.bottom='0px';
				setTimeout("destroyMessage()",2000);
			},delay);
			}
		)
	}

}

//countdown functions
function decrease(){
	sec--;
	if(sec>=0){
		countdown.innerHTML=sec;
		if(sec<=3){
			countdown.style.color="red";
		}
	}
	else{
		clearInterval(i);
		state();
	}
}

function init() {

	i=setInterval("decrease()",1000);
}

//state of the countdown label
function state(){
	var d=0;
	var countdown = document.getElementById('countdown');
	if(d==1){
		countdown.innerHTML="Destroyed";
		countdown.style.color="black";
	}
	else{
		countdown.innerHTML="Time out!";
		clearInterval(i);
	}
}

function destroyMessage(idMessage) {
	var d=0;
	var header = document.getElementById('head_envelope');
	var lock = document.getElementById('lock_envelope');
	var footer = document.getElementById('foot_envelope');
	var message = document.getElementById('message');
	
	header.style.width ="0px";
	header.style.height ="0px";
	footer.style.width="0px";
	footer.style.height="0px";
	d=1;
	state();
	destroyMessageData(idMessage);
	nav(0,-1);
}

	
function reject(idFriend) {
    var xhr = getXhr();	
    xhr.onreadystatechange = function(){
        if((xhr.readyState == 4) && (xhr.status == 200)){
            tmp = xhr.responseText;
	    nav(0,1);
        }	
    }	
    xhr.open("post","./news/reject.php",true);
    xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset ISO");
    xhr.send("idFriend="+idFriend);
}

function addFriendNew(idFriend) {
	addFriendNew(idFriend);
	nav(0,1);
}


function notNew(idFriend) {
    var xhr = getXhr();	
    xhr.onreadystatechange = function(){
        if((xhr.readyState == 4) && (xhr.status == 200)){
            tmp = xhr.responseText;
	    nav(0,1);
        }	
    }	
    xhr.open("post","./news/notNew.php",true);
    xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset ISO");
    xhr.send("idFriend="+idFriend);
}
	
	
function goMessage(idPage,idFriend) {
	notNew(idFriend);
	nav(idPage,idFriend);	
}

function displayImage(idMessage) {
    var img = document.getElementById("message");
    var xhr = getXhr();	
    xhr.onreadystatechange = function(){
        if((xhr.readyState == 4) && (xhr.status == 200)){
            tmp = xhr.responseText;
	    img.innerHTML = tmp;
        }	
    }	
    xhr.open("post","./news/getPicture.php",true);
    xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset ISO");
    xhr.send("idMessage="+idMessage);
}

function destroyMessageData(idMessage) {
    var xhr = getXhr();	
    xhr.onreadystatechange = function(){
        if((xhr.readyState == 4) && (xhr.status == 200)){
            tmp = xhr.responseText;
        }	
    }	
    xhr.open("post","./news/destroyMessage.php",true);
    xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset ISO");
    xhr.send("idMessage="+idMessage);
}

