<?php
    include('../database/database_login.php');
    session_start();
    if(isset($_SESSION['idUser'])) {
        $query= 'SELECT u.username,f.idFriend FROM Friend f,User u WHERE f.idFriend = u.idUser AND f.idUser='.$_SESSION['idUser'];
        $result = mysql_query($query) or die('Query Data failed (send.php): ' . mysql_error());
				
        echo'<div class="heading"><h4> SEND MESSAGE </h4></div>';
        echo '<table id="send_table">';
            echo '<tr>';
                echo '<td id="td_friend_list">';
                    echo '<div id="div_friend_list" ondrop="drop(event)" ondragover="allowDrop(event)">';
                    while($line = mysql_fetch_row($result)){
                        echo '<div id="drag_elem_'.$line[1].'" class="friend_mess" draggable="true" ondragstart="drag(event)">'.$line[0].'</div>';   
                    }
                     echo '</div>';
                     echo '<input class="button_send" type="button" value="Add All"/>';
                echo '</td>';
                echo '<td id="td_send_list">';
                    echo '<div id="div_send_list" ondrop="drop(event)" ondragover="allowDrop(event)">';
                    echo '</div>';
                    echo '<input class="button_send" type="button" value="Remove All"/>';
                echo '</td>';
                echo '<td id="td_message">';
                echo '</td>';
            echo '</tr>';
        echo '</table>';
    
    }
?>