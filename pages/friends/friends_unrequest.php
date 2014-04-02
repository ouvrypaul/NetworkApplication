<?php
    include('../../database/database_login.php');
    include('../../database/user.php');
    session_start();
    
    if(isset($_SESSION['user']) && isset($_POST['idFriend'])){
        $queryDeleteRequest ='DELETE FROM Friend WHERE idUser='.$_SESSION['user']->idUser.' AND idFriend='.$_POST['idFriend'];
        $result = mysql_query($queryDeleteRequest) or die('Query Delete failed (friend_unrequest.php): ' . mysql_error());
    }
?>
