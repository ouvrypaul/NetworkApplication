<?php
    include('../../database/database_login.php');
    session_start();
    
    if(isset($_SESSION['idUser']) && isset($_POST['idFriend'])){
        $queryTest = 'SELECT f.accepted FROM Friend f WHERE f.idFriend='.$_SESSION['idUser'].' AND f.idUser='.$_POST['idFriend'];
        $result = mysql_query($queryTest) or die('Query Add failed (friend_add.php): ' . mysql_error());
        $test = 1;
        while ($line = mysql_fetch_row($result)) {
            $test =$line[0];
        }
        if($test==0) {
            $queryUpdate='UPDATE Friend SET accepted=1 WHERE idUser='.$_POST['idFriend'].' AND idFriend='.$_SESSION['idUser'];
            $result = mysql_query($queryUpdate) or die('Query update failed (friend_add.php): ' . mysql_error());
            $queryAddFriend ='INSERT INTO Friend VALUES ('.$_SESSION['idUser'].','.$_POST['idFriend'].',1)';
            $result = mysql_query($queryAddFriend) or die('Query Add failed (friend_add.php): ' . mysql_error());
        } else {
            $queryAddFriend ='INSERT INTO Friend VALUES ('.$_SESSION['idUser'].','.$_POST['idFriend'].',0)';
            $result = mysql_query($queryAddFriend) or die('Query Add failed (friend_add.php): ' . mysql_error());
        }
    }
?>