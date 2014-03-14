<?php
	include('../database/database_login.php');
	session_start();
	echo '<div class="heading"><h4> SETTINGS </h4></div>';
	echo '<fieldset id="general_settings_fieldset" class="col-md-6"><legend>General settings</legend>';
	echo '<form action="./userpage.php">';
		echo '<table>';
		echo '<div class="group">';
			if(isset($_SESSION['idUser'])){
				$queryData = 'SELECT u.username,u.email FROM User u WHERE u.idUser='.$_SESSION['idUser'];
				$result = mysql_query($queryData) or die('Query Data failed (userpage.php): ' . mysql_error());
				$line = mysql_fetch_row($result);
				echo '<tr><td><p class="text">Username: </p></td><td><input type="text" class="text large" value="'.$line[0].'" required autofocus></td></tr>';
				echo '<tr><td><p class="text">Email address: </p></td><td><input type="email" class="text large" value="'.$line[1].'" required autofocus></td></tr>';
			} else {
				echo '<tr><td><p class="text">Username: </p></td><td><input type="text" class="text large" placeholder="Username" required autofocus></td></tr>';
				echo '<tr><p class="text">Email address: </p></td><td><input type="email" class="text large" placeholder="Email address" required autofocus></td></tr>';
			}
			
			echo '<tr><td><p class="text">Password: </p></td><td><input type="password" class="text large" placeholder="Password" required></td></tr>';
			echo '<tr><td><p class="text">Comfirm password: </p></td><td><input type="password" class="text large" placeholder="Confirm password" required></td></tr>';
		echo '</table>';
		echo '</div>';
		echo'<p><input type="submit" class="button" value="Submit"/></p>';
	echo '</form>';
	echo '</fieldset>';
	echo '<fieldset id="design_settings_fieldset" class="col-md-5"><legend>Design settings</legend>';
			echo '<table id="design_table">';
			echo '<tr><td>Header image: </td><td>';
			echo '<input id="header_finder" class="button" type="file" name="pic" accept="image/*" /></td></tr>';
			echo '<tr><td>Profile image: </td><td>';
			echo '<input id="profile_finder" class="button" type="file" name="pic" accept="image/*" /></td></tr>';
			echo '<tr><td>Profile color: </td><td>';
			echo '<input type="text"  placeholder="#ffffff"/></td></tr>';
			echo '</table>';
		echo '<div class="col-md-12">';
		echo '<input class="button" id="submit" type="submit" value="Submit"><br/>';
		echo '</div>';
	echo '</fieldset>';
	echo '<fieldset id="delete_profile_fieldset" class="col-md-5"><legend>Delete Profile</legend>';
	echo '<input class="button" id="delete_profile" type="button" onclick="deleteUser()" value="Delete Profile">';
	echo '<input type="checkbox" id="checkbox_delete"/> I want to delete all my personal details';
	echo '</fieldset>';
?>
