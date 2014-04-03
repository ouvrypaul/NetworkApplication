<?php 
    include('../../database/database_login.php');
    include('../../database/user.php');
    session_start();
    
    if(isset($_SESSION['user']) && isset($_POST['idReceiver']) && isset($_POST['text']) && isset($_POST['isImage']) && isset($_POST['time'])){
    	$idR = mysql_real_escape_string($_POST['idReceiver']);
    	$txt = mysql_real_escape_string($_POST['text']);
    	$isI = mysql_real_escape_string($_POST['isImage']);
    	$time = mysql_real_escape_string($_POST['time']);
    	
        if ($isI == "1") {
            $queryMessage ='INSERT INTO Message VALUES (null,'.$_SESSION['user']->idUser.','.$idR.',"'.$_SESSION['upload'].'",'.$time.',1, NOW())';
        } else{
            $queryMessage ='INSERT INTO Message VALUES (null,'.$_SESSION['user']->idUser.','.$idR.',"'.$txt.'",0,'.$time.', NOW())';
        }
        $result = mysql_query($queryMessage) or die('Query Message (sending.php): ' . mysql_error());
    }
    
?>
