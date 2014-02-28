function sleep(milliseconds) {
  var start = new Date().getTime();
  for (var i = 0; i < 1e7; i++) {
    if ((new Date().getTime() - start) > milliseconds){
      break;
    }
  }
}

function next(max) {
	var doc = document.getElementById("slides");
	var string = doc.style.marginLeft.substring(0,doc.style.marginLeft.length-2);
	var value = string*1-800;
	doc.style.marginLeft = value+"px";
	if(value == (max-1)*-800) {
		document.getElementById("next").style.display = "none";
	}
	document.getElementById("prev").style.display = "inline-block";
}

function prev() {
	var doc = document.getElementById("slides");
	var string = doc.style.marginLeft.substring(0,doc.style.marginLeft.length-2);
	var value = string*1+800;
	doc.style.marginLeft = value+"px";
	if(value == 0) {
		document.getElementById("prev").style.display = "none";
	}
	document.getElementById("next").style.display = "inline-block";
}


function test(){
	var top = document.getElementById("top");
	var right = document.getElementById("right");
	var left = document.getElementById("left");
	var back = document.getElementById("back");
	var h1 = document.getElementById("h1");
	
	top.style.marginTop="-50px"
	left.style.marginTop="0px";	
	left.style.marginLeft="-230px";
	right.style.marginLeft="500px";
	back.style.marginTop="250px";
	back.style.marginLeft="-520px";
	h1.style.marginTop="-80px";
	setTimeout("retour()",2000);
	
}


function retour(){
	var top = document.getElementById("top");
	var right = document.getElementById("right");
	var left = document.getElementById("left");
	var back = document.getElementById("back");
	var h1 = document.getElementById("h1");

	top.style.marginTop="0px"
	left.style.marginTop="-145px";	
	left.style.marginLeft="0px";
	right.style.marginLeft="55px";
	back.style.marginTop="-145px";
	back.style.marginLeft="-298px";
	h1.style.marginTop="0px";
	setTimeout("end()",2000);
}

function end() {
	var top = document.getElementById("top");
	var right = document.getElementById("right");
	var left = document.getElementById("left");
	var back = document.getElementById("back");
	var h1 = document.getElementById("h1");

	top.style.width="0px";
	top.style.height="0px";
	right.style.width="0px";
	right.style.height="0px";
	left.style.width="0px";
	left.style.height="0px";
	back.style.width="0px";
	back.style.height="0px";
	h1.innerHTML="";
	
	setTimeout("next(4)",1000);
}
