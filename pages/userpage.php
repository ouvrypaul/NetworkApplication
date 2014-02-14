<?php
    include('../database/database_login.php');
    session_start();
    if(isset($_POST['idUser'])) {
            $_SESSION['idUser']=$_POST['idUser'];
    } else {
        /* EXIT */
    }
    
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
   <head>
	<title>Network Application</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<link rel="stylesheet" type="text/css" href="../css/style.css"/>	
	<link rel="stylesheet" type="text/css" href="../css/placement.css"/>
	<link rel="stylesheet" type="text/css" href="../css/friends.css"/>
	<link rel="stylesheet" type="text/css" href="../css/send.css"/>
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet"/>
	<script src="../js/nav.js"></script>
	<script src="../js/carousel.js"></script>
	<script src="../js/send.js"></script>
	<script src="../js/friends.js"></script>
  </head>
	<body onload="setUpSlideShow()">
		
		<header class="header widget container ">
			<?php
			if(isset($_SESSION['idUser'])){
				$i=0;
				$queryData = 'SELECT u.username,u.imagePath FROM User u WHERE u.idUser='.$_SESSION['idUser'];
				$result = mysql_query($queryData) or die('Query Data failed (userpage.php): ' . mysql_error());
				$line = mysql_fetch_row($result);
				echo '<img class="left" src="../img/profil/'.$line[1].'" alt="photoid"/><h1>'.$line[0].'</h1>';
			}
			?>
		</header>
		
		<nav class="navbar widget container">
			<ul>
				<li class="active"><i class="fa fa-spinner" onclick="nav(0,-1)"></i></li>
				<li><i class="fa fa-envelope" onclick="nav(1,-1)"></i></li>
				<li><i class="fa fa-group" onclick="nav(2,-1)"></i></li>
				<li><i class="fa fa-pencil-square-o" onclick="nav(3,-1)"></i></li>
				<li><i class="fa fa-cog" onclick="nav(4,-1)"></i></li>
			</ul>
		</nav>
		
		<div id="div_transition">
		    <section id="section" class="widget container">
			    <?php include("./news.php");?>
		    </section>
		</div>    
	</body>
 </html>