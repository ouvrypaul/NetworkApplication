<?php
    include('../../database/database_login.php');
    include('../../database/user.php');
    session_start();
    
    if(isset($_SESSION['user']) && isset($_POST['idFriend'])){ 
    	$idF = mysql_real_escape_string($_POST['idFriend']);
    
        $queryAddFriend ='INSERT INTO Friend VALUES ('.$_SESSION['user']->idUser.','.$idF.',1,0,1,NOW())';
        $result = mysql_query($queryAddFriend) or die('Query Add failed (friend_add.php): ' . mysql_error());
        $queryUpdate='UPDATE Friend SET accepted=1 WHERE idUser='.$idF.' AND idFriend='.$_SESSION['idUser'];
        $result = mysql_query($queryUpdate) or die('Query update failed (friend_add.php): ' . mysql_error());
    }
?>
