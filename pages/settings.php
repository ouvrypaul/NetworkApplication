<?php
	include('../database/database_login.php');
	include('../database/user.php');
	session_start();
	echo '<div class="heading"><h4> SETTINGS </h4></div>';
	echo '<fieldset id="general_settings_fieldset" class="col-md-5"><legend>General settings</legend>';
	echo '<form id ="general_form" action="./userpage.php" method="post">';
		echo '<table>';
		echo '<div class="group">';
			if(isset($_SESSION['user'])){
				echo '<tr><td><p >Username: </p></td><td><input id="username2" type="text" class="text large" value="'.$_SESSION['user']->username.'" required autofocus></td></tr>';
				echo '<tr><td><p>Email address: </p></td><td><input id="email" type="email" class="text large" value="'.$_SESSION['user']->email.'" required autofocus></td></tr>';
			} else {
				echo '<tr><td><p>Username: </p></td><td><input id="username" type="text" class="text large" placeholder="Username" required autofocus></td></tr>';
				echo '<tr><p">Email address: </p></td><td><input id="email" type="email" class="text large" placeholder="Email address" required autofocus></td></tr>';
			}
			
			echo '<tr><td><p>Password: </p></td><td><input id="password" type="password" class="text large" placeholder="Password" required></td></tr>';
			echo '<tr><td><p>Comfirm password: </p></td><td><input id="password_again" type="password" class="text large" placeholder="Confirm password" required></td></tr>';
		echo '</table>';
		echo '</div>';
		echo'<input class="button" value="Submit" onclick="updateGeneral()"/>';
		echo'<span id="error_general" class="error"></span>';
	echo '</form>';
	echo '</fieldset>';
	echo '<fieldset id="design_settings_fieldset" class="col-md-6"><legend>Design settings</legend>';
			echo '<table id="design_table">';
			echo '<form id ="header_form" method="post" action="./settings/coverSettings.php" enctype="multipart/form-data">';
			echo '<tr><td><p  class="head">Header image: </p></td><td>';
			echo '<input id="header_finder" class="button" type="file" name="cover" accept="image/*" /></td>';
			echo' <td><input class="button ok" value="Ok" type="submit"/></td></tr>';
			echo '</form>';
			echo '<tr><td>Profile image: </td>';
			echo '<form id ="profil_form" method="post"  action="./settings/profilSettings.php" enctype="multipart/form-data">';
			echo '<td><input id="profil_finder" class="button" type="file" name="profil_img" /></td>';
			echo' <td><input class="button ok" value="Ok" type="submit"/></td></tr>';
			echo '</form>';
			echo '<tr><td>Profile color: </td><td>';
			echo 'R: ';
		    echo '<select id="R">';
		    for($i=0;$i<256;$i++) {
		    	echo "<option>".$i."</option>";
		    }
		    echo "</select>";
		    echo 'G: ';
		    echo '<select id="G">';
		    for($i=0;$i<256;$i++) {
		    	echo "<option>".$i."</option>";
		    }
		    echo "</select>";
		    echo 'B: ';
		    echo '<select id="B">';
		    for($i=0;$i<256;$i++) {
		    	echo "<option>".$i."</option>";
		    }
		    echo "</select>";
		    echo 'Text: ';
		    echo '<select id="text">';
		    echo "<option>White</option>";
			echo "<option>Black</option>";
		    echo "</select></td>";
		    echo' <td><input class="button ok" value="Ok" onclick="updateColor()"/></td></tr>';
			echo '</table>';
		echo '<div class="col-md-12">';
		echo'<span id="error_profil" class="error"></span>';
		echo '</div>';
	echo '</fieldset>';
	echo '<fieldset id="delete_profile_fieldset" class="col-md-6"><legend>Delete Profile</legend>';
	echo '<input class="button" id="delete_profile" type="button" onclick="deleteUser()" value="Delete Profile">';
	echo '<input type="checkbox" id="checkbox_delete"/> I want to delete all my personal details';
	echo '</fieldset>';
?>
