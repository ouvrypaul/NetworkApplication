<?php
	
	if(!ereg("W3C_Validator", $_SERVER["HTTP_USER_AGENT"])  
	&& (!ereg("Mozilla/5.0", $_SERVER["HTTP_USER_AGENT"]) 
	|| ereg("MSIE 9", $_SERVER["HTTP_USER_AGENT"]) 
	|| ereg("MSIE 8", $_SERVER["HTTP_USER_AGENT"]) 
	|| ereg("MSIE 7", $_SERVER["HTTP_USER_AGENT"])
	|| ereg("MSIE 6", $_SERVER["HTTP_USER_AGENT"]))
	) {
		echo "ERROR NAVIGATOR NOT PERMITTED."; 
	} else {
		
		
		
	    include './database/database_login.php';
	    session_start();
		   
	    if(isset($_SESSION['idUser'])) {
			echo "<script language=\"javascript\">";
			echo "window.location='./pages/userpage.php';";
			echo "</script>"; 
	    } else if(isset($_POST['login']) && isset($_POST['password'])) {
	        $query = 'SELECT idUser,username,password FROM User';
	        $login = $_POST['login'];
	        $password = md5($_POST['password']);
	        $result = mysql_query($query) or die('Query login failed: ' . mysql_error());
	        while ($line = mysql_fetch_row($result)) {
	            if($line[1] == $login && $line[2] == $password) {
	                $_SESSION['idUser'] = $line[0];
	                echo "<script language=\"javascript\">";
	                echo "window.location='./pages/userpage.php';";
	                echo "</script>"; 
	            }
	        }
	    }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
  <head>
    <title>Userpage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>	
    <link rel="stylesheet" type="text/css" href="css/signin.css"/>	
    <link rel="stylesheet" type="text/css" href="css/placement.css"/>	
    <script type="text/javascript" src="js/signin.js"></script>
  </head>
    <body>
	<p><a href="./info.html">Description</a></p>
      <div id="signin" class="widget container form">
	<div class="heading">
	  <h4> Please sign in </h4>
	</div>
	<table id="panel">
	<tr>
	  <td>
	   <div id="login_div">
	      <form action="index.php" class="group" method="post">
		  <p>
  	      <input name="login" type="text" class="text" placeholder="Username" required autofocus /><br/>
		  <input name="password" type="password" class="text" placeholder="Password" required /><br/>
		  <button class="button" type="submit">Go !</button>
		  <button class="button" type="button" onclick="signupSlides('1');" >Sign up</button>
		  <?php
		    if(isset($_POST['login'])){
			echo '<span id="error_login" class="error">Error Login - Try Again</span>';
			echo '<script>setTimeout("revertErrorLogin()",5000);</script>';
		    }
		   ?>
		   </p>
	      </form>
	    </div>
	  </td>
	  <td>
	    <div id="signup_div">
	      <form id="signup_form" action="./index.php" method="post" class="group">
		  <p>
		  <input id="username" type="text" class="text" placeholder="Username" required autofocus /><br/>
		  <input id="email" type="email" class="text" placeholder="Email address" required autofocus /><br/>
		  <input id="password" type="password" class="text" placeholder="Password" required><br/>
		  <input id="password_again" type="password" class="text" placeholder="Confirm password" required /><br/>
		  <button class="button" type="button" onclick="addSignUp()">Go !</button>
		  <button class="button" type="button" onclick="signupSlides('2');" >Sign in</button><br/>
		  <span id="error_signup" class="error"></span>
		  </p>
	      </form>
	    </div>
	  </td>
	</tr>
	</table>
      </div>
	<script type="text/javascript">
	signupSlides(1);
	setTimeout("signupSlides(2);",700);
	</script>
	 <p>
     <a href="http://validator.w3.org/check?uri=referer"> <img
       src="./img/htm5.png" alt="HTML5" height="32" width="40" /> </a>
   </p>
    </body>
 </html>
 <?php 
	}
 ?>
