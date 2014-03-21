<?php
    include('../../database/user.php');
    include('../../database/database_login.php');
    session_start();
    if(isset($_POST['r']) && isset($_POST['g']) && isset($_POST['b']) && isset($_POST['text'])) { 
		if ($_POST['text'] == "White") $text = 0; else $text = 1;
        $query = "UPDATE User SET red=".$_POST['r'].", green=".$_POST['g'].", blue=".$_POST['b'].", text=".$text." WHERE idUser=".$_SESSION['user']->idUser;
        $result = mysql_query($query) or die('Query update color settings failed: ' . mysql_error());
		echo "Color settings changed.";
		$user = new User();
		$user->getUser($_SESSION['idUser']);
		$_SESSION['user'] = $user;
    }
?>
