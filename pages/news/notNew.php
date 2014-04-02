<?php
    include('../../database/database_login.php');
    include('../../database/user.php');
    session_start();
    
    if(isset($_SESSION['user']) && isset($_POST['idFriend'])){
            $queryUpdate='UPDATE Friend SET new=0 WHERE idUser='.$_SESSION['user']->idUser.' AND idFriend='.$_POST['idFriend'];
            $result = mysql_query($queryUpdate) or die('Query update failed (notNew.php): ' . mysql_error());
    }
?>    
