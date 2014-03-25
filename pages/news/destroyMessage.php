<?php
    include('../../database/database_login.php');
    session_start();
    
    if(isset($_SESSION['idUser']) && isset($_POST['idMessage'])){
        echo $queryDelete ='DELETE FROM Message WHERE idMessage='.$_POST['idMessage'];
        $result = mysql_query($queryDelete) or die('Query Delete failed (getMessage.php): ' . mysql_error());
    }
?>    
