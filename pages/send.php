<?php
    include('../database/database_login.php');
    session_start();
    if(isset($_SESSION['idUser']) || isset($_POST['idUser'])) {
	if(isset($_POST['idUser'])){
	    $_SESSION['idUser']= $_POST['idUser'];
	}
	
	$query= 'SELECT u.username,f.idFriend FROM Friend f,User u WHERE f.idFriend = u.idUser AND f.idUser='.$_SESSION['idUser'];
	if(isset($_POST['send']) && $_POST['send'] >= 0) {
	    $query=$query." AND f.idFriend <> ".$_POST['send'];
	}
        $result = mysql_query($query) or die('Query Data failed (send.php): ' . mysql_error());
				
        echo'<div class="heading"><h4> SEND MESSAGE </h4></div>';
        echo '<table id="send_table">';
            echo '<tr>';
                echo '<td id="td_friend_list">';
		    echo 'Friend List:';
                    echo '<div id="div_friend_list" ondrop="drop(event)" ondragover="allowDrop(event)">';
                    while($line = mysql_fetch_row($result)){
                        echo '<div id="drag_elem_'.$line[1].'" class="friend_mess" draggable="true" ondragstart="drag(event)">'.$line[0].'</div>';   
                    }
                     echo '</div>';
                     echo '<input onclick="addAll()" class="button button_send" type="button" value="Add All"/>';
                echo '</td>';
                echo '<td id="td_send_list">';
		    echo 'Send List:';
                    echo '<div id="div_send_list" ondrop="drop(event)" ondragover="allowDrop(event)">';
				    if(isset($_POST['send']) && $_POST['send'] >= 0) {
					$query2="SELECT u.username FROM User u WHERE u.idUser=".$_POST['send'];
					$result2 = mysql_query($query2) or die('Query Data failed (send.php): ' . mysql_error());
					while($line = mysql_fetch_row($result2)){
					    echo '<div id="drag_elem_'.$line[1].'" class="friend_mess" draggable="true" ondragstart="drag(event)">'.$line[0].'</div>';   
					}
				    }
                    echo '</div>';
                    echo '<input onclick="removeAll()" class="button button_send" type="button" value="Remove All"/>';
                echo '</td>';
                echo '<td id="td_message">';
		    echo '<input name="radio" type="radio" id="checkbox_text" onchange="change()" checked /> Text';
		    if (isset($_SESSION['upload'])) {
			echo '<input type="text" id="title_text" disabled/><br/><br/>';
		    } else {
			echo '<input type="text" id="title_text" /><br/><br/>';
		    }
		    echo '<table><tr><td>';
		    if (isset($_SESSION['upload'])) {
				echo '<input name="radio" type="radio" id="checkbox_img" name="check" onchange="changeInv()" checked/>  Image uploaded ' ;
				echo '<script>changeInv();</script>';
				echo '<input class="button" type="button" value="Delete" onclick="deletePicture()"/>';
			    	echo '<form method="post"  action="./send/upload.php" enctype="multipart/form-data">';
				echo '<input class="button" id="img_finder" type="file" name="pic"/>';
				echo '<input class="button" id="submit" type="submit" value="Submit"/><br/>';
				echo '</form>';	
			} else {
				echo '<input name="radio" type="radio" id="checkbox_img" name="check" onchange="changeInv()"/> Photo ';
				echo '<form method="post"  action="./send/upload.php" enctype="multipart/form-data">';
				echo '<input class="button" id="img_finder" type="file" name="pic" disabled/>';
				echo '<input class="button" id="submit" type="submit" value="Submit" disabled/><br/>';
				echo '</form>';	
			}

	    	echo '<div id="img_preview">';
	    	if (isset($_SESSION['upload'])) {
		    echo '<img id="preview_img" src="'.$_SESSION['upload'].'" alt="test" />';
		}
	    	echo '</div>';
		    echo '</td><td>';
	    	echo 'Time: <br/>';
		    echo '<select id="time">';
		    for($i=1;$i<21;$i++) {
		    	echo "<option>".$i."</option>";
		    }
		    echo "</select>";
		    echo '<input id="button_send" class="button" type="button" value="Send" onclick="send()"/>';
		    echo 'Feedback: ';
		    echo '<div id="feedback"></div>';
		    echo '</td></tr></table>';
		echo '</td>';
            echo '</tr>';
        echo '</table>';
    }
?>
