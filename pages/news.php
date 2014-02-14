<?php

echo'<div class="heading"><h4> NEWS </h4></div>';

echo'<table class="border-top">';
    echo'<tr>';
        echo'<td class="control">';
            echo'<div><a href="#"><i id="prev" class="fa fa-chevron-left fa-3x"></i></a></div>';
        echo'</td>';
        echo'<td>';
            echo'<div id="slides" >';
                echo'<div class="slide">';
                    echo'<h3>New message from Truc</h3><img src="../img/msg.png"/><br/>';
                    echo'<input type="button" name="nom" value="Read"/><input type="button" name="nom" value="Destroy"/>';
                echo'</div>';
                echo'<div class="slide">';
                    echo'<h3>Love + Stephanie = <3 now !</h3><img src="../img/heart.png"/><br/>';
                    echo'<input type="button" name="nom" value="Ok"/><input type="button" name="nom" value="Send a message"/>';
                echo'</div>';
                echo'<div class="slide">';
                    echo'<h3>Username want to be your friend O_o ! </h3><img src="../img/profil/paul.jpg"/><br/>';
                    echo'<input type="button" name="nom" value="Accept"/><input type="button" name="nom" value="Reject"/>';
                echo'</div>'; 
            echo'</div>';
        echo'</td>';
        echo'<td  id="right" class="control">';
            echo'<div><a href="#"><i id="next" class="fa fa-chevron-right fa-3x"></i></a></div>';
        echo'</td>';
    echo'</tr>';
echo'</table>';

?>