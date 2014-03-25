<?php
    include('../../database/database_login.php');
    session_start();
    
    if(isset($_SESSION['idUser']) && isset($_POST['idMessage'])){
        $query='SELECT text FROM Message WHERE idMessage='.$_POST['idMessage'];
        $result = mysql_query($query) or die('Query failed (getMessage.php): ' . mysql_error());
         while ($line = mysql_fetch_row($result)) {
            echo $line[0];
         }
        //$queryDelete ='DELETE FROM Message WHERE idMessage='.$_POST['idMessage'];
        //$result = mysql_query($queryDelete) or die('Query Delete failed (getMessage.php): ' . mysql_error());
    }
?>    
