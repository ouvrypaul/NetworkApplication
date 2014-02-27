<?php
    include './database/database_login.php';
    session_start();
    
    if(isset($_POST['login']) && isset($_POST['password'])) {
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
    } else if(isset($_SESSION['idUser'])) {
	echo "<script language=\"javascript\">";
	echo "window.location='./pages/userpage.php';";
	echo "</script>"; 
    }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Userpage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">	
    <link rel="stylesheet" type="text/css" href="css/signin.css">	
    <link rel="stylesheet" type="text/css" href="css/placement.css">	
    <script src="js/signin.js"></script>
  </head>
    <body>
	<a href="./info.html">Description</a>
      <!--<span> Most of the password are "test" </span>-->
      <div id="signin" class="widget container form">
	<div class="heading">
	  <h4> Please sign in </h4>
	</div>
	<table id="panel">
	<tr>
	  <td>
	   <div id="login_div">
	      <form class="group" role="form" method="post">
    
  	          <input name="login" type="text" class="text" placeholder="Username" required autofocus><br/>
		  <input name="password" type="password" class="text" placeholder="Password" required><br/>
		  <button class="button" type="submit">Sign in</button>
		  <button class="button" type="button" onclick="signupSlides('1');" >Sign up</button>
		  <?php
		    if(isset($_POST['login'])){
			echo '<span id="error_login" class="error">Error Login - Try Again</span>';
			echo '<script>setTimeout("revertErrorLogin()",5000);</script>';
		    }
		   ?>
	      </form>
	    </div>
	  </td>
	  <td>
	    <div id="signup_div">
	      <form class="group" role="form" onsubmit="return addSignUp()">
		  <input id="username" type="text" class="text" placeholder="Username" required autofocus><br/>
		  <input id="email" type="email" class="text" placeholder="Email address" required autofocus><br/>
		  <input id="password" type="password" class="text" placeholder="Password" required><br/>
		  <input id="password_again" type="password" class="text" placeholder="Confirm password" required><br/>
		  <button class="button" type="submit">Sign up</button>
		  <button class="button" type="button" onclick="signupSlides('2');" >Sign in</button>
		  <span id="error_signup" class="error"></span>
	      </form>
	    </div>
	  </td>
	</tr>
	</table>
      </div>
	<script>
	signupSlides(1);
	setTimeout("signupSlides(2);",700);
	</script>
    </body>
 </html>