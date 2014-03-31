<?php

include('../database/database_login.php');
include('../database/user.php');
session_start();
  
function display ($date) {
	$datetime1 = date_create($date);
    $datetime2 = date_create("now");
    $interval = date_diff($datetime1, $datetime2);

	if ($interval->d<1) {
		echo date_format($datetime1, 'H').'h'.date_format($datetime1, 'i');
	} else {
		echo date_format($datetime1, 'Y-m-d');
	}
}

echo'<div class="heading"><h4> INBOX </h4></div>';
echo'<table class="border-top">';

$query= 'SELECT u.idUser,u.username, f.date FROM Friend f, User u WHERE f.idUser ='.$_SESSION['user']->idUser.' AND f.accepted=1 AND f.new=1 AND f.idFriend = u.idUser ORDER BY f.date DESC'; 
$result = mysql_query($query) or die('Query Data failed inbox 1: ' . mysql_error());

//get the new friendships
while($line = mysql_fetch_row($result)){  
			echo'<tr class="row">';
			echo'<td><b>';
			display($line[2]);
			echo'</b></td>';  
			echo'<td><b>'.$_SESSION['user']->username.' + '.$line[1].' = &lt;3 now ! </b></td>';
			echo'<td><input class="button" type="button" name="ok" value="OK" onclick="notNew('.$line[0].')"/><input type="button" class="button" name="nom" value="Send a message" onclick="nav(3,'.$line[0].')"></td>';
			echo'</tr>';
}

$query1 = 'SELECT u.idUser,u.username,u.imagePath, f.date FROM Friend f, User u WHERE f.idFriend ='.$_SESSION['idUser'].' AND f.accepted=0 AND f.rejected=0 AND f.idUser = u.idUser ORDER BY f.date DESC'; 
$result = mysql_query($query1) or die('Query Data failed inbox 2: ' . mysql_error());
while($line = mysql_fetch_row($result)){  
			echo'<tr class="row">';
			echo'<td><b>';
			display($line[3]);
			echo'</b></td>'; 
			echo'<td><b>'.$line[1].' want to be your friend O_o ! </b></td>';
			echo'<td>';
			echo'<input  class="button" type="button" name="accept" value="Accept" onclick="addFriendNew('.$line[0].')"/>';
            echo'<input  class="button" type="button" name="reject" value="Reject" onclick="reject('.$line[0].')"/>';
            echo'</td>';
			echo'</tr>';
} 

//get the last 10 messages from the user
$query= 'SELECT idSender, seen, time, idMessage, date FROM Message WHERE idReceiver='.$_SESSION['user']->idUser.' ORDER BY date DESC LIMIT 7';
$result = mysql_query($query) or die('Query Data failed inbox 3: ' . mysql_error());

//generate 10 lines
while($line = mysql_fetch_row($result)){      
      	//find username corresponding to the sender's id
         $sender = new User();
         $sender->getUser($line[0]);
        //bold style if the message has NOT been seen, else no style
        if($line[1] == 1){ 
        	$bold='<b>';
        	$dolb='</b>';
        }
        else{
        	$bold=' ';
        	$dolb=' ';
        }
		
		//start of a line
        echo'<tr class="row">';
        //No attribute for time when the message is recieved??!
       echo'<td>'.$bold;
       display($line[4]);
       echo $dolb.'</td>'; 
		echo'<td>'.$bold.'Message from '.$sender->username.' '.$dolb.'</td>';
		if($line[1] == 1){ 
			echo'<td><input type="button" class="button" name="nom" value="Destroy" onclick="destroyMes('.$line[3].')"></td>';
		}
		else{
			//display time not sure if it's already seconds
			echo'<td>'.$bold.$line[2].' sec'.$dolb.'</td>';
		}
//end of line
 echo'</tr>';
}

//end of the 10 lines                  
echo'</table>';
?>
