<?php
    include '../database/database_login.php';
    session_start();
    if(isset($_POST['username'])||isset($_POST['email'])) { 
    	$un = mysql_real_escape_string($_POST['username']);
    	$e = mysql_real_escape_string($_POST['email']);
    	
        $queryVerify = 'SELECT username,email FROM User WHERE username="'.$un.'" OR email="'.$e.'"';
        $result = mysql_query($queryVerify) or die('Query usernames failed: ' . mysql_error());
        $test=0;
        while ($line = mysql_fetch_row($result)) {
            if($un == $line[0]){
                $test=1;
            }
            if($e == $line[1]){
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
			$un1 = mysql_real_escape_string($_POST['username']);
			$e1 = mysql_real_escape_string($_POST['email']);
			$p1 = mysql_real_escape_string($_POST['password']);      
        
            $queryInsert = "INSERT INTO User values(null,'".$un1."','none.png','mountain.jpg','".$e1."','".md5($p1)."',84,156,194,0)";
            $result = mysql_query($queryInsert) or die('Query insert failed: ' . mysql_error());
            $queryCheck = 'SELECT idUser,username FROM User WHERE username="'.$un1.'"';
            $result = mysql_query($queryCheck) or die('Query research failed: ' . mysql_error());
            while ($line = mysql_fetch_row($result)) {
                $_SESSION['idUser']=$line[0];
                mkdir("../img/profil/".$line[1], 755);
            }
        }
    }
?>
