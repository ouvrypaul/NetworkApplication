<?php   
include('../../database/user.php');
include('../../database/database_login.php');
session_start();
if ($_FILES['profil_img']['error']) {     
          switch ($_FILES['profil_img']['error']){     
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
	$temp = explode(".", $_FILES["profil_img"]["name"]);
	$extension = end($temp);
	move_uploaded_file($_FILES['profil_img']["tmp_name"],
	"../../img/profil/".$_SESSION['user']->username."/profil.". $extension);
	$query = "UPDATE User SET imagePath='".$_SESSION['user']->username."/profil.". $extension."' WHERE idUser=".$_SESSION['user']->idUser;
	$result = mysql_query($query) or die('Query update color settings failed: ' . mysql_error());
	$user = new User();
	$user->getUser($_SESSION['idUser']);
	$_SESSION['user'] = $user;
	header('Location: ../../index.php');
}     
?>
