<?php   
include('../../database/user.php');
include('../../database/database_login.php');
session_start();
if ($_FILES['cover']['error']) {     
          switch ($_FILES['cover']['error']){     
                   case 1: // UPLOAD_ERR_INI_SIZE     
                   echo"File size too large for the server.";     
                   break;     
                   case 2: // UPLOAD_ERR_FORM_SIZE     
                   echo "File size too large for the form."; 
                   break;     
                   case 3: // UPLOAD_ERR_PARTIAL     
                   echo "File transfer has been stopped.";     
                   break;     
                   case 4: // UPLOAD_ERR_NO_FILE     
                   echo "No file submitted."; 
                   break;     
          }     
}     
else {     
	$temp = explode(".", $_FILES["cover"]["name"]);
	$extension = end($temp);
	move_uploaded_file($_FILES['cover']["tmp_name"],
	"../../img/profil/".$_SESSION['user']->username."/cover.". $extension);
	$query = "UPDATE User SET coverPath='".$_SESSION['user']->username."/cover.". $extension."' WHERE idUser=".$_SESSION['user']->idUser;
	$result = mysql_query($query) or die('Query update color settings failed: ' . mysql_error());
	$user = new User();
	$user->getUser($_SESSION['idUser']);
	$_SESSION['user'] = $user;
	header('Location: ../../index.php');
}     
?>
