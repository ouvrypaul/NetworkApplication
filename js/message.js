var delay = 5000;
var sec=delay/1000;
var i;
	
function unlock() {
	
	var header = document.getElementById('head_envelope');
	var countdown = document.getElementById('countdown');
	var lock = document.getElementById('lock_envelope');
	var footer = document.getElementById('foot_envelope');
	var message = document.getElementById('message');
	
	//first animation
	lock.style.transform="rotate(180deg)";
	setTimeout(function(){
		lock.style.transform="rotate(-90deg)";
		lock.style.opacity="0";
	},1000);
	
	//open
	setTimeout(function(){
		countdown.innerHTML="Open";
		lock.style.visibility='hidden';
		header.style.top="-50%";
		footer.style.bottom="-50%";		
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
			},delay);
			}
		)				
	}
}

//countdown functions
function decrease(){
	sec--
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
	}
}

function destroyMessage() {
	var d=0;
	var header = document.getElementById('head_envelope');
	var lock = document.getElementById('lock_envelope');
	var footer = document.getElementById('foot_envelope');
	var message = document.getElementById('message');
	
	header.style.width ="0px";
	header.style.height ="0px";
	footer.style.width="0px";
	footer.style.height="0px";
	lock.remove();
	message.remove();
	d=1;
	state();
}
	
