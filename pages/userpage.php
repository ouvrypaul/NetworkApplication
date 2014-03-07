<?php
    if(isset($_POST['disconnect'])){
	header('Location: ../index.php');
	session_start();
        unset($_SESSION['idUser']);
        session_destroy();
    }

    include('../database/database_login.php');
    include('../database/user.php');
    session_start();

    if(!isset($_SESSION['idUser'])) {
	header('Location: ../index.php');
    } else if(isset($_POST['idUser'])){
		$_SESSION['idUser'] = $_POST['idUser'];
    }
	$user = new User();
	$user->getUser($_SESSION['idUser']);
	$_SESSION['color'] = 'rgba('.$user->red.','.$user->green.','.$user->blue.',0.8)';
	$_SESSION['url_cover'] = 'url(\'../img/'.$user->coverPath.'\')';
	if ($user->text == 0) $_SESSION['text'] = '#FFF';
	else $_SESSION['text'] = '#000';
    
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
   <head>
	<title>Network Application</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.php"/>	
	<link rel="stylesheet" type="text/css" href="../css/slide.css"/>	
	<link rel="stylesheet" type="text/css" href="../css/settings.css"/>
	<link rel="stylesheet" type="text/css" href="../css/placement.css"/>
	<link rel="stylesheet" type="text/css" href="../css/friends.css"/>
	<link rel="stylesheet" type="text/css" href="../css/send.css"/>
	<link rel="stylesheet" type="text/css" href="../css/message.css"/>
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet"/>
	<script src="../js/nav.js"></script>
	<script src="../js/slider.js"></script>
	<script src="../js/send.js"></script>
	<script src="../js/friends.js"></script>
	<script src="../js/signin.js"></script>
	<script src="../js/settings.js"></script>
	<script src="../js/message.js"></script>
  </head>
	<body>
		
		<header class="header widget container ">
			<?php
			if(isset($_SESSION['idUser'])){
				echo '<img onclick="nav(4,-1)" class="left" src="../img/profil/'.$user->imagePath.'" alt="photoid"/><h1 id="username" onclick="nav(4,-1)">'.$user->username.'</h1>';
			}
			?>
		</header>
		
		<form id="disconnect_form" name="disconnect_form" method="post">
		    <input type="hidden" name="disconnect" value="0"/>
		</form>
		
		<nav class="navbar widget container">
			<ul>
				<li><i class="fa fa-spinner" onclick="nav(0,-1)"></i></li>
				<li><i class="fa fa-envelope" onclick="nav(1,-1)"></i></li>
				<li><i class="fa fa-group" onclick="nav(2,-1)"></i></li>
				<li><i class="fa fa-pencil-square-o" onclick="nav(3,-1)"></i></li>
				<li><i class="fa fa-cog" onclick="nav(4,-1)"></i></li>
				<li><i class="fa fa-power-off" onclick="disconnect()"></i></li>
			</ul>
		</nav>
		
		<div id="div_transition">
		    <section id="section" class="widget container">
			    <?php include("./news.php");?>
		    </section>
		</div>
	</body>
 </html>
