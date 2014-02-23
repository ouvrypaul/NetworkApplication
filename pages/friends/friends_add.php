<?php
    include('../../database/database_login.php');
    session_start();
    
    if(isset($_SESSION['idUser']) && isset($_POST['idFriend'])){ 
        $queryAddFriend ='INSERT INTO Friend VALUES ('.$_SESSION['idUser'].','.$_POST['idFriend'].',1)';
        $result = mysql_query($queryAddFriend) or die('Query Add failed (friend_add.php): ' . mysql_error());
        $queryUpdate='UPDATE Friend SET accepted=1 WHERE idUser='.$_POST['idFriend'].' AND idFriend='.$_SESSION['idUser'];
        $result = mysql_query($queryUpdate) or die('Query update failed (friend_add.php): ' . mysql_error());
    }
?>