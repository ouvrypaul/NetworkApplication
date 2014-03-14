<?php

    if(isset($_POST['disconnect'])){
	header('Location: ../index.php');
	session_start();
        unset($_SESSION['idUser']);
        session_destroy();
    }

    include('../database/database_login.php');
    session_start();
    if(!isset($_SESSION['idUser'])) {
	header('Location: ../index.php');
    } else if(isset($_POST['idUser'])){
	$_SESSION['idUser'] = $_POST['idUser'];
    }
    
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
   <head>
	<title>Network Application</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta http-equiv="Content-Type" content="application/xhtml+xml;charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="../css/style.css"/>	
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
		

		<header>
					<div class="header widget container">
			<?php
			if(isset($_SESSION['idUser'])){
				$i=0;
				$queryData = 'SELECT u.username,u.imagePath FROM User u WHERE u.idUser='.$_SESSION['idUser'];
				$result = mysql_query($queryData) or die('Query Data failed (userpage.php): ' . mysql_error());
				$line = mysql_fetch_row($result);
				echo '<img onclick="nav(4,-1)" class="left" src="../img/profil/'.$line[1].'" alt="photoid"/><h1 id="username" onclick="nav(4,-1)">'.$line[0].'</h1>';
			}
			?>
					</div>
		</header>

		
		<form id="disconnect_form" method="post" action="./userpage.php">
		    <p><input type="hidden" name="disconnect"/></p>
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
			    <?php include("./news.php");?>
		    </section>
		</div>
			 <p>
     <a href="http://validator.w3.org/check?uri=referer"> <img
       src="../img/htm5.png" alt="HTML5" height="32" width="40" /> </a>
   </p>
	</body>
 </html>
