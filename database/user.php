<?php

class User {
	var $idUser;
	var $username;
	var $imagePath;
	var $coverPath;
	var $email;
	var $password;	
	var $red;
	var $green;
	var $blue;	
	var $text;
	
	function __construct($idUser,
						$username, 
						$imagePath, 
						$coverPath, 
						$email, 
						$password,
						$red,
						$green,
						$blue,
						$text) {		
							 
		$this->idUser = $idUser;
		$this->username = $username;
		$this->imagePath = $imagePath;
		$this->coverPath = $coverPath;
		$this->email = $email;
		$this->password = $password;
		$this->red = $red;
		$this->green = $green;
		$this->blue = $blue;
		$this->text = $text;
	}
	
	function getUser($id) {
		$queryData  = 'SELECT * FROM User u WHERE u.idUser='.$id;
		$result = mysql_query($queryData) or die('Query Data failed (userpage.php): ' . mysql_error());
		$row = mysql_fetch_array($result);
		$this->idUser =$row['idUser'];
		$this->username =$row['username'];
		$this->imagePath =$row['imagePath'];
		$this->coverPath =$row['coverPath'];
		$this->email = $row['email'];
		$this->password =$row['password'];
		$this->red =$row['red'];
		$this->green =$row['green'];
		$this->blue = $row['blue'];
		$this->text = $row['text'];
	}
}
?>
