<?php
    include('../database/database_login.php');
    session_start();
    if(isset($_SESSION['idUser'])) {
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
		    echo 'Text: ';
		    echo '<input type="checkbox" id="checkbox_text" onchange="change(0)"/>';
		    echo '<input type="text" id="title_text" disabled /><br/>';
	    	    echo '<textarea id="text_text"></textarea><br/>';
		    
		    echo 'Photo: ';
		    echo '<input type="checkbox" id="checkbox_img" name="check" onchange="change(1)"/><br/>';
		    echo '<input class="button" id="img_finder" type="file" name="pic" disabled/>';
		    echo '<input class="button" id="submit" type="submit" value="Submit"/><br/>';
	    	    echo '<div id="img_preview"></div>';
                echo '</td>';
		echo '<td id="td_message_end">';
		    echo 'Time: <br/>';
		    echo '<input id="plus" class="button" type="button" onclick="moins()" value="-"/>';
		    echo '<input id="time" type="text" value="0" readonly />';
		    echo '<input id="moins" class="button" type="button" onclick="plus()" value="+"/><br/>';
		    echo '<input id="button_send" class="button" type="button" value="Send"/>';
		    echo 'Feedback: ';
		    echo '<div id="feedback"></div>';
		echo '</td>';
            echo '</tr>';
        echo '</table>';
	echo '<script>';
	echo ' document.getElementById("text_text").disabled = "true";';
	echo '</script>';
    
    }
?>
