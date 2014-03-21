<?php
    include('../database/user.php');
    include('../database/database_login.php');
    session_start();
    if(isset($_POST['username']) || isset($_POST['email'])) { 
        $queryVerify = 'SELECT idUser,username,email FROM User WHERE username="'.$_POST['username'].'" OR email="'.$_POST['email'].'"';
        $result = mysql_query($queryVerify) or die('Query usernames failed: ' . mysql_error());
        $test=0;
        while ($line = mysql_fetch_row($result)) {
            if($_POST['username'] == $line[1] && $_SESSION['user']->idUser != $line[0]){
                $test=1;
            }
            if($_POST['email'] == $line[2] && $_SESSION['user']->idUser != $line[0]){
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
			$query = "UPDATE User SET username='".$_POST['username']."', email='".$_POST['email']."', password='".md5($_POST['password'])."' WHERE idUser=".$_SESSION['user']->idUser;
			$result = mysql_query($query) or die('Query update general settings failed: ' . mysql_error());
			echo "Settings changed.";
			$user = new User();
			$user->getUser($_SESSION['idUser']);
			$_SESSION['user'] = $user;
        }
    }
    
?>
