<?php
    include('../../database/database_login.php');
    session_start();
    
    if(isset($_SESSION['idUser']) && isset($_POST['idFriend'])){
        $queryDeleteRequest ='DELETE FROM Friend WHERE idUser='.$_SESSION['idUser'].' AND idFriend='.$_POST['idFriend'];
        $result = mysql_query($queryDeleteRequest) or die('Query Delete failed (friend_unrequest.php): ' . mysql_error());
    }
?>