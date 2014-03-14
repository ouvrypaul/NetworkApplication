<?php
    include('../../database/database_login.php');
    session_start();
    
    if(isset($_SESSION['idUser'])){
        $queryFriends = 'SELECT u.idUser,u.username,u.imagePath,f.accepted FROM Friend f,User u WHERE f.idFriend='.$_SESSION['idUser'].' AND f.idUser=u.idUser AND f.accepted=0 ORDER BY u.username';
        $result = mysql_query($queryFriends) or die('Query Friends failed (friends_load.php): ' . mysql_error());
        echo '<table>';
        while ($line = mysql_fetch_row($result)) {
            if($line[3] == "0"){ 
                echo '<tr><td>';
                echo '<div class="div_person_request">';
                echo '<table class="request_table"><tr class="tr_move"><td><img  alt="avatar" class="request_pic" src="../img/profil/'.$line[2].'"/></td>
                <td rowspan="3">';
                echo '<div class="div_hidden_request"><img  alt="round"  class="img_high_plus" src="../img/high_plus.png" onclick="addFriend('.$line[0].')"/><div class="request_name">'.$line[1].'</div></div></td></tr></table>';
                echo '</div></td></tr>';
            }
        }
        echo '</table>';
    }
?>
