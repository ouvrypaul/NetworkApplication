<?php
    include('../../database/database_login.php');
    session_start();
    
    if(isset($_SESSION['idUser'])){
        $i=0;
        $queryFriends = 'SELECT u.idUser,u.username,u.imagePath,f.accepted FROM Friend f,User u WHERE f.idUser='.$_SESSION['idUser'].' AND idFriend=u.idUser ORDER BY u.username';
        $result = mysql_query($queryFriends) or die('Query Friends failed (friends_load.php): ' . mysql_error());
        echo '<table><tr class="line">';
        while ($line = mysql_fetch_row($result)) {
            if($line[3] == "1"){ 
                echo '<td>';
                echo '<div class="div_person">';
                echo '<table class="friend_table"><tr class="tr_move"><td><img  alt="avatar" class="friend_pic" src="../img/profil/'.$line[2].'"/></td>
                <td rowspan="3"><div class="div_hidden_friend"> Hi! I am '.$line[1].'</div></td></tr></table>';
                echo '<table class="unmove_table">';
                echo '<tr><td><img alt="ok" class="img_icon" src="../img/unfriend.png" onclick="unfriend('.$line[0].')" />
                <img  alt="mess"  class="img_icon" src="../img/message.png" onclick="nav(3,'.$line[0].')"/></td></tr></table><table class="friend_name">
                <tr><td><span>'.$line[1].'</span></td></tr></table>';
                echo '</div></td>';
                $i++;
                if($i%5==0) {
                    echo'</tr><tr class="line">';
                }
            }
        }
        echo '<td></td></tr></table>';
    }
?>
