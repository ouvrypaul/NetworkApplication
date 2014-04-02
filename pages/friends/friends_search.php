<?php
    include('../../database/database_login.php');
    include('../database/user.php');
    session_start();
    
    if(isset($_SESSION['user']) && isset($_POST['text'])){ 
        $queryFriends ='SELECT idUser,username,imagePath FROM User WHERE idUser NOT IN (
           SELECT idFriend FROM Friend WHERE idUser='.$_SESSION['user']->idUser.' AND accepted=1
        ) AND idUser<>'.$_SESSION['user']->idUser.' AND username LIKE "%'.$_POST['text'].'%" ORDER BY username';
        
        $result = mysql_query($queryFriends) or die('Query Friends failed (friend_search.php): ' . mysql_error());
        $string="";
        while ($line = mysql_fetch_row($result)) {
            $queryRequest ='SELECT f.accepted FROM Friend f WHERE f.idUser='.$_SESSION['user']->idUser.' AND f.idFriend='.$line[0];
            $result2 = mysql_query($queryRequest) or die('Query Test Friends failed (friend_search.php): ' . mysql_error());
            $test = 1;
            while ($line2 = mysql_fetch_row($result2)) {
                $test =$line2[0];
            }
            if($test==0) {
                $string=$string.'<table class="people"><tr><td><img  alt="avatar"  class="people_img" src="../img/profil/'.$line[2].'"/></td><td class="td_username">'.$line[1].'</td><td>
                <img  alt="plus" class="plus" src="../img/unfriend.png" onclick="unrequest('.$line[0].')"/></td></tr></table>';
            } else {
                $string=$string.'<table class="people"><tr><td><img class="people_img" src="../img/profil/'.$line[2].'"/></td><td class="td_username">'.$line[1].'</td><td>
                <img  alt="unrequest"  class="plus" src="../img/plus.png" onclick="addRequest('.$line[0].')"/></td></tr></table>';
            }
        }
    }
    if($string == ""){
        echo '<table class="people"><tr><td>No resultat found !</tr></table>';
    } else {
        echo $string;
    }
?>
