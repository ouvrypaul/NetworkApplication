<?php

echo'<div class="heading"><h4> FRIENDS </h4></div>';

echo'<table id="main_table">';
    echo'<tr>';
        echo'<td id="td_search">';
            echo'<input id="input_search" type="text" onkeyup="searchFriends();"/>';
            echo'<div id="div_friend_search"></div>';
        echo'</td>';
        echo'<td id="td_friends">';
            echo'<div id="div_friends"></div>';
        echo'</td>';
        echo'<td id="td_request">';
           echo'<div id="div_request"></div>';
        echo'</td>';
    echo'</tr>';
echo'</table>';
?>