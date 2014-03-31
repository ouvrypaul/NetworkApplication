<?php
    if(isset($_POST['disconnect'])){
	    session_start();
        unset($_SESSION['idUser']);
		unset($_SESSION['user']);
        session_destroy();
		//header('Location: ../index.php');
    }

    include('../database/database_login.php');
    include('../database/user.php');
    session_start();
	
    if(!isset($_SESSION['idUser'])) {
	header('Location: ../index.php');
    }
    $user = new User();
    $user->getUser($_SESSION['idUser']);
    $_SESSION['user'] = $user;	

	$_SESSION['color'] = 'rgba('.$_SESSION['user']->red.','.$_SESSION['user']->green.','.$_SESSION['user']->blue.',0.8)';
	$_SESSION['light_color'] = 'rgba('.$_SESSION['user']->red.','.$_SESSION['user']->green.','.$_SESSION['user']->blue.',0.4)';
	$_SESSION['url_cover'] = 'url(\'../img/profil/'.$_SESSION['user']->coverPath.'\')';
	if ($_SESSION['user']->text == 0) $_SESSION['text'] = '#FFF';
	else $_SESSION['text'] = '#000';
    
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
   <head>
	<title>Network Application</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta http-equiv="Content-Type" content="application/xhtml+xml;charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="../css/style.php"/>	
	<link rel="stylesheet" type="text/css" href="../css/slide.css"/>	
	<link rel="stylesheet" type="text/css" href="../css/settings.css"/>
	<link rel="stylesheet" type="text/css" href="../css/placement.css"/>
	<link rel="stylesheet" type="text/css" href="../css/friends.css"/>
	<link rel="stylesheet" type="text/css" href="../css/send.css"/>
	<link rel="stylesheet" type="text/css" href="../css/message.css"/>
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet"/>
	<script type="text/javascript" src="../js/nav.js"></script>
	<script type="text/javascript" src="../js/slider.js"></script>
	<script type="text/javascript" src="../js/send.js"></script>
	<script type="text/javascript" src="../js/friends.js"></script>
	<script type="text/javascript" src="../js/signin.js"></script>
	<script type="text/javascript" src="../js/settings.js"></script>
	<script type="text/javascript" src="../js/message.js"></script>
  </head>
	<body>
		

		<header class="header widget container ">
			<?php
			if(isset($_SESSION['idUser'])){
				echo '<img onclick="nav(4,-1)" class="left" src="../img/profil/'.$user->imagePath.'" alt="photoid"/><h1 id="username" onclick="nav(4,-1)">'.$user->username.'</h1>';
			}
			?>
		</header>

		
		<form id="disconnect_form" method="post" action="./userpage.php">
		    <p><input type="hidden" name="disconnect" value="disconnect"/></p>
		</form>
		
		<nav>
			<div class="navbar widget container">
			<ul>
				<li><i class="fa fa-spinner" onclick="nav(0,-1)"></i></li>
				<li><i class="fa fa-envelope" onclick="nav(1,-1)"></i></li>
				<li><i class="fa fa-group" onclick="nav(2,-1)"></i></li>
				<li><i class="fa fa-pencil-square-o" onclick="nav(3,-1)"></i></li>
				<li><i class="fa fa-cog" onclick="nav(4,-1)"></i></li>
				<li><i class="fa fa-power-off" onclick="disconnect()"></i></li>
			</ul>
		    </div>
		</nav>
		
		<div id="div_transition">
		    <section class="widget container" id="section">
			    <?php //include("./news.php");?>
		    </section>
		</div>
			 <p>
     <a href="http://validator.w3.org/check?uri=referer"> <img
       src="../img/htm5.png" alt="HTML5" height="32" width="40" /> </a>
   </p>
	<?php if(isset($_SESSION['upload'])) {
		echo '<script>nav(3,-1);</script>';
	} else {
	    echo '<script>nav(0,-1);</script>';
	}?>
	</body>
 </html>
