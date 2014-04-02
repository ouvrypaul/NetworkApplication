<?php
    include('../../database/database_login.php');
    include('../../database/user.php');
    session_start();
    
    if(isset($_SESSION['user']) && isset($_POST['idFriend'])){
            $queryUpdate='UPDATE Friend SET rejected=1 WHERE idUser='.$_POST['idFriend'].' AND idFriend='.$_SESSION['user']->idUser;
            $result = mysql_query($queryUpdate) or die('Query update failed (reject.php): ' . mysql_error());
    }
?>    
