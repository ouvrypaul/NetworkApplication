<?php
    include('../../database/database_login.php');
    session_start();
    
    if(isset($_SESSION['idUser']) && isset($_POST['idFriend'])){
        $test=0;
        echo $queryRelation = 'SELECT accepted FROM Friend  WHERE idUser='.$_SESSION['idUser'].' AND idFriend='.$_POST['idFriend'];
        $result = mysql_query($queryRelation) or die('Query Relation failed (friend_unfriend.php): ' . mysql_error());
        while ($line = mysql_fetch_row($result)) {
            if($line[0] == "1"){
                $test = 1;
            }
        }
        $queryDeleteFriend ='DELETE FROM Friend WHERE idUser='.$_SESSION['idUser'].' AND idFriend='.$_POST['idFriend'];
        $result = mysql_query($queryDeleteFriend) or die('Query Delete failed (friend_unfriend.php): ' . mysql_error());
        if($test == 1){
            $queryDeleteFriend ='DELETE FROM Friend WHERE idFriend='.$_SESSION['idUser'].' AND idUser='.$_POST['idFriend'];
            $result = mysql_query($queryDeleteFriend) or die('Query Delete failed (friend_unfriend.php): ' . mysql_error());
        }
    }
?>