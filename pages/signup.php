<?php
    include '../database/database_login.php';
    session_start();
    if(isset($_POST['username'])||isset($_POST['email'])) { 
        $queryVerify = 'SELECT username,email FROM User WHERE username="'.$_POST['username'].'" OR email="'.$_POST['email'].'"';
        $result = mysql_query($queryVerify) or die('Query usernames failed: ' . mysql_error());
        $test=0;
        while ($line = mysql_fetch_row($result)) {
            if($_POST['username'] == $line[0]){
                $test=1;
            }
            if($_POST['email'] == $line[1]){
                $test=2;
            }
        }
    }
    
    if($test==1) {
        echo "Username not available.";
    } else  if($test==2) {
        echo "Email already used.";
    } else {
        if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
            $queryInsert = "INSERT INTO User values(null,'".$_POST['username']."','none.png','".$_POST['email']."','".md5($_POST['password'])."')";
            $result = mysql_query($queryInsert) or die('Query insert failed: ' . mysql_error());
            $queryCheck = 'SELECT idUser FROM User WHERE username="'.$_POST['username'].'"';
            $result = mysql_query($queryCheck) or die('Query research failed: ' . mysql_error());
            while ($line = mysql_fetch_row($result)) {
                $_SESSION['idUser']=$line[0];
            }
        }
    }
?>