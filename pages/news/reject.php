<?php
    include('../../database/database_login.php');
    session_start();
    
    if(isset($_SESSION['idUser']) && isset($_POST['idFriend'])){
            $queryUpdate='UPDATE Friend SET rejected=1 WHERE idUser='.$_POST['idFriend'].' AND idFriend='.$_SESSION['idUser'];
            $result = mysql_query($queryUpdate) or die('Query update failed (reject.php): ' . mysql_error());
    }
?>    
