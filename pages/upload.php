<?php   
 print_r($_FILES);
        
if ($_FILES['nom_du_fichier']['error']) {     
          switch ($_FILES['nom_du_fichier']['error']){     
                   case 1: // UPLOAD_ERR_INI_SIZE     
                   echo"Le fichier dépasse la limite autorisée par le serveur (fichier php.ini) !";     
                   break;     
                   case 2: // UPLOAD_ERR_FORM_SIZE     
                   echo "Le fichier dépasse la limite autorisée dans le formulaire HTML !"; 
                   break;     
                   case 3: // UPLOAD_ERR_PARTIAL     
                   echo "L'envoi du fichier a été interrompu pendant le transfert !";     
                   break;     
                   case 4: // UPLOAD_ERR_NO_FILE     
                   echo "Le fichier que vous avez envoyé a une taille nulle !"; 
                   break;     
          }     
}     
else {     
	echo "WE ARE : ". getcwd() . "\n";
	if ($_FILES['nom_du_fichier']["error"] > 0)
    {
    echo "Return Code: " . $_FILES['nom_du_fichier']["error"] . "<br>";
    }
  else
    {
    
    echo "Upload: " . $_FILES['nom_du_fichier']["name"] . "<br>";
    echo "Type: " . $_FILES['nom_du_fichier']["type"] . "<br>";
    echo "Size: " . ($_FILES['nom_du_fichier']["size"] / 1024) . " <br>";
    echo "Temp file: " . $_FILES['nom_du_fichier']["tmp_name"] . "<br>";

    if (file_exists("upload/" . $_FILES['nom_du_fichier']["name"]))
      {
      echo $_FILES['nom_du_fichier']["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES['nom_du_fichier']["tmp_name"],
      "upload/" . $_FILES['nom_du_fichier']["name"]);
      echo "Stored in: " . "upload/" . $_FILES['nom_du_fichier']["name"];
      }
  }   
}     
?>
