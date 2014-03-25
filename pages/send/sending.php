<?php 
    include('../../database/database_login.php');
    session_start();
    
    if(isset($_SESSION['idUser']) && isset($_POST['idReceiver']) && isset($_POST['text']) && isset($_POST['isImage']) && isset($_POST['time'])){
        if ($_POST['isImage'] == "1") {
            $queryMessage ='INSERT INTO Message VALUES (null,'.$_SESSION['idUser'].','.$_POST['idReceiver'].',"'.$_SESSION['upload'].'",1,'.$_POST['time'].',0)';
        } else{
            $queryMessage ='INSERT INTO Message VALUES (null,'.$_SESSION['idUser'].','.$_POST['idReceiver'].',"'.$_POST['text'].'",0,'.$_POST['time'].',0)';
        }
        $result = mysql_query($queryMessage) or die('Query Message (sending.php): ' . mysql_error());
    }
    
?>