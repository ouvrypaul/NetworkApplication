<?php

echo'<div class="heading"><h4> NEWS </h4></div>';

echo'<table class="border-top">';
    echo'<tr>';
        echo'<td class="control">';
            echo'<div><i id="prev" class="fa fa-chevron-left fa-3x" onclick="prev()"></i></div>';
        echo'</td>';
        echo'<td>';
			echo'<div class="contSlide">';
				echo'<table id="slides">';
					echo'<tr>';
                                        echo'<td class="slide">';
                                            echo'<div id="countdown">New</div>';
                                            echo'<div id="envelope" >';
                                            echo'<div id="lock_envelope"><img id="logo" alt="logo" src="../img/lock2.png" onclick="unlock()"/></div>';
                                            echo'<div id="head_envelope"></div>';
                                            echo'<div id="letter" >';
                                            echo'<div id="info">@sender</div>';
                                            echo'<div id="message">This message is going to disappear...';
                                            echo'<img id="image" width="50" height="50" alt="image" src="../img/profil/paul.jpg"/><br/>';
                                            echo'</div>';
                                            echo'</div>';
                                            echo'<div id="foot_envelope"></div>';
                                            echo'</div>';
                                            echo'<br/>';
                                            echo'<button class="button" id="destroy" type="button" onclick="destroyMessage()" >Destroy</button>';
                                        echo'</td>';
					echo'<td class="slide">';
						echo'<h3>New message from Truc</h3>';
						echo'<img src="../img/msg.png" alt="envelope"/><br/>';
						echo'<input class="button" type="button" name="read" value="Read">';
						echo'<input  class="button" type="button" name="destroy" value="Destroy"/>';
					echo'</td>';
					echo'<td class="slide">';
						echo'<h3>Machin + Stephanie = &lt;3 now !</h3>';
						echo'<img src="../img/heart.png" alt="heart"/><br/>';
						echo'<input   class="button" type="button" name="ok" value="OK"/>';
						echo'<input class="button" type="button" name="message" value="Send a message"/>';
					echo'</td>';
					echo'<td class="slide">';
						echo'<h3>Username want to be your friend O_o ! </h3>';
						echo'<img src="../img/profil/paul.jpg" alt="paul"/><br/>';
						echo'<input  class="button" type="button" name="accept" value="Accept"/>';
						echo'<input  class="button" type="button" name="reject" value="Reject"/>';
					echo'</td>';
					echo'</tr>';					
				echo'</table>';
				echo'</div>';
        echo'</td>';
        echo'<td  id="right" class="control">';
            echo'<div><i id="next" class="fa fa-chevron-right fa-3x" onclick="next(4)"></i></div>';
        echo'</td>';
    echo'</tr>';
echo'</table>';

?>