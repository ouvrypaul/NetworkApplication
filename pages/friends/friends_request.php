<?php
    include('../../database/database_login.php');
    include('../database/user.php');
    session_start();
    
    if(isset($_SESSION['user']) && isset($_POST['idFriend'])){
        $queryTest = 'SELECT f.accepted FROM Friend f WHERE f.idFriend='.$_SESSION['user']->idUser.' AND f.idUser='.$_POST['idFriend'];
        $result = mysql_query($queryTest) or die('Query Add failed (friend_add.php): ' . mysql_error());
        $test = 1;
        while ($line = mysql_fetch_row($result)) {
            $test =$line[0];
        }
        if($test==0) {
            $queryUpdate='UPDATE Friend SET accepted=1,new=1 WHERE idUser='.$_POST['idFriend'].' AND idFriend='.$_SESSION['idUser']->idUser;
            $result = mysql_query($queryUpdate) or die('Query update failed (friend_add.php): ' . mysql_error());
            $queryAddFriend ='INSERT INTO Friend VALUES ('.$_SESSION['user']->idUser.','.$_POST['idFriend'].',1,0,1,NOW())';
            $result = mysql_query($queryAddFriend) or die('Query Add failed (friend_add.php): ' . mysql_error());
        } else {
            $queryAddFriend ='INSERT INTO Friend VALUES ('.$_SESSION['user']->idUser.','.$_POST['idFriend'].',0,0,0,NOW())';
            $result = mysql_query($queryAddFriend) or die('Query Add failed (friend_add.php): ' . mysql_error());
        }
    }
?>
