<?php   
include('../../database/user.php');
include('../../database/database_login.php');
session_start();
if ($_FILES['pic']['error']) {     
          switch ($_FILES['pic']['error']){     
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
	move_uploaded_file($_FILES['pic']["tmp_name"],
	"../../img/profil/".$_SESSION['user']->username."/". $_FILES['pic']["name"]);
	header('Location: ../../index.php');
}     
?> 
