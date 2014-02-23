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