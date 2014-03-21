<?php
    include('../../database/database_login.php');
    session_start();
    
    if(isset($_SESSION['idUser'])){ 
        $queryDeleteFriend='DELETE FROM Friend WHERE '.$_SESSION['idUser'].'=idUser OR '.$_SESSION['idUser'].'=idFriend';
        $result = mysql_query($queryDeleteFriend) or die('Query delete failed (delete.php): ' . mysql_error());
        $queryDelete ='DELETE FROM User WHERE '.$_SESSION['idUser'].'=idUser';
        $result = mysql_query($queryDelete) or die('Query delete failed (delete.php): ' . mysql_error());
    }
?>