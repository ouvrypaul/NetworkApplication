					//declarations
					var delay = 7000;
					var sec=delay/1000;
					var i;
					var d=0;
					var lock = document.getElementById('lock-envelope');
					var message = document.getElementById('message');
					var header = document.getElementById('head-envelope');
					var footer = document.getElementById('foot-envelope');
					var destroy = document.getElementById('destroy');
					var countdown = document.getElementById('countdown');
					

			//when lock is clicked
			lock.onclick = function() {
								
				//first animation
				lock.style.WebkitTransform="rotate(180deg)";
				setTimeout(function(){
					lock.style.WebkitTransform="rotate(-90deg)";
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
				
				return false;
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
				if(d==1){
					countdown.innerHTML="Destroyed";
					countdown.style.color="black";
				}
				else{
					countdown.innerHTML="Time out!";
				}
			}
			
			//destroy the letter
			destroy.onclick = function() {
				
				header.style.width ="0px";
				header.style.height ="0px";
				footer.style.width="0px";
				footer.style.height="0px";
				lock.remove();
				message.remove();
				d=1;
				state();

				
				return false;
			}
	
