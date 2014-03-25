<?php

    include('../database/database_login.php');
    include('../database/user.php');
    session_start();

     if(isset($_SESSION['idUser']) && isset($_SESSION['user'])) {
            echo'<div class="heading"><h4> NEWS </h4></div>';       
            echo'<table class="border-top">';
            echo'<tr>';
            echo'<td class="control">';
            echo'<div><i id="prev" class="fa fa-chevron-left fa-3x" onclick="prev()"></i></div>';
            echo'</td>';
            echo'<td>';
            echo'<div class="contSlide">';
            echo'<table id="slides"><tr>';
            $i=0;
            $j=0;
            $query1 = 'SELECT u.idUser,u.username,u.imagePath FROM Friend f, User u WHERE f.idFriend ='.$_SESSION['idUser'].' AND f.accepted=0 AND f.rejected=0 AND f.idUser = u.idUser'; 
            $result = mysql_query($query1) or die('Query failed (news.php): ' . mysql_error());
            while ($line = mysql_fetch_row($result)) {
                    if($j<2) {
                        echo'<td class="slide">';
                        echo'<h3>'.$line[1].' want to be your friend O_o ! </h3>';
                        echo'<img src="../img/profil/'.$line[2].'" alt="'.$line[1].'"/><br/>';
                        echo'<input  class="button" type="button" name="accept" value="Accept" onclick="addFriendNew('.$line[0].')"/>';
                        echo'<input  class="button" type="button" name="reject" value="Reject" onclick="reject('.$line[0].')"/>';
                        echo'</td>';
                        $i++;
                        $j++;
                    }
            }
            
            $j=0;
            $query2 = 'SELECT u.idUser,u.username FROM Friend f, User u WHERE f.idUser ='.$_SESSION['idUser'].' AND f.accepted=1 AND f.new=1 AND f.idFriend = u.idUser'; 
            $result = mysql_query($query2) or die('Query failed (news.php): ' . mysql_error());
              while ($line = mysql_fetch_row($result)) {
                if($j<2) {
                    echo'<td class="slide">';
                    echo'<h3>'.$_SESSION['user']->username.' + '.$line[1].' = &lt;3 now !</h3>';
                    echo'<img src="../img/heart.png" alt="heart"/><br/>';
                    echo'<input class="button" type="button" name="ok" value="OK" onclick="notNew('.$line[0].')"/>';
                    echo'<input class="button" type="button" name="message" value="Send a message" onclick="goMessage(3,'.$line[0].')"/>';
                    echo'</td>';
                    $i++;
                    $j++;
                }

             }
             
            $j=0;    
            $query3 = 'SELECT m.idMessage,u.username,m.time FROM Message m, User u WHERE m.idReceiver ='.$_SESSION['idUser'].' AND u.idUser=m.idSender AND m.isImage=0'; 
            $result = mysql_query($query3) or die('Query failed (news.php): ' . mysql_error());
            while ($line = mysql_fetch_row($result)) {
                if($j<1) {
                echo'<td class="slide">';
                echo'<div id="countdown2" class="button">Click the envelope !</div>';
                echo'<h3 id="h1">New message from '.$line[1].'</h3>';
                echo '<div class="div_mess">';
                echo'<img id="top" onclick="showMessage('.$line[0].','.$line[2].')" class="top_image" src="../img/top2.png" alt="envelope"/><br/>';
                echo'<img id="left" onclick="showMessage('.$line[0].','.$line[2].')" class="left_image" src="../img/left1.png" alt="envelope"/>';
            
                echo'<img id="right" onclick="showMessage('.$line[0].','.$line[2].')" class="right_image" src="../img/right1.png" alt="envelope"/>';
                echo'<img id="back" onclick="showMessage('.$line[0].''.$line[2].')" class="back_image" src="../img/back1.png" alt="envelope"/><br/><br/>';
                echo'<button class="button" id="destroy2" type="button" onclick="destroyMes('.$line[0].')">Destroy</button>';
                echo '</div>';
                echo '<div id="message_text"></div>';
                echo'</td>';
                $i++;
                $j++;
                }
            }
            
            $j=0;
            $query4 = 'SELECT m.idMessage,u.username,m.time FROM Message m, User u WHERE m.idReceiver ='.$_SESSION['idUser'].' AND u.idUser=m.idSender AND m.isImage=1'; 
            $result = mysql_query($query4) or die('Query failed (news.php): ' . mysql_error());
            while ($line = mysql_fetch_row($result)) {
                if($j<1) {
                echo'<td class="slide">';
                echo'<div id="countdown" class="button">Click the lock !</div>';
                echo'<h3 id="h2">New message from '.$line[1].'</h3>';
                echo'<div id="envelope" >';
                echo'<div id="lock_envelope"><img id="logo" alt="logo" src="../img/lock2.png" onclick="unlock('.$line[0].','.$line[2].')"/></div>';
                echo'<div id="head_envelope"></div>';
                echo'<div id="letter" >';
                echo'<div id="message">';
                echo'</div>';
                echo'</div>';
                echo'<div id="foot_envelope"></div>';
                echo'</div>';
                echo'<br/>';
                echo'<button class="button" id="destroy" type="button" onclick="destroyMessage('.$line[0].')" >Destroy</button>';
                echo'</td>';
                $i++;
                $j++;
                }
            }                       
            if($i == 0)  {
                echo'<td class="slide">';
                echo'            No news received !';
                echo'</td>';
            }
            
            
            echo'</tr>';
            echo'</table>';
            echo'</div>';
            echo'</td>';
            echo'<td  id="right_arrow" class="control">';
            echo'<div><i id="next" class="fa fa-chevron-right fa-3x" onclick="next('.$i.')"></i></div>';
            echo'</td>';    
            echo'</tr>';
            echo'</table>';
            $i=$i*800;
            echo '<style type="text/css">';
            echo '#slides{ width:'.$i.'px;}';
            echo '</style>';
     }
?>
