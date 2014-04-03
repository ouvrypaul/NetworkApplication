<?php

    include('../database/database_login.php');
    include('../database/user.php');
    session_start();
  
  	//get the last 10 messages from the user
	$query= 'SELECT idSender, seen, isMessage, time FROM Message LIMIT 10 WHERE idReceiver='.$_SESSION['idUser'];
    $result = mysql_query($query) or die('Query Data failed: ' . mysql_error());

    
echo'<div class="heading"><h4> INBOX </h4></div>';
echo'<table class="border-top">';

//generate 10 lines
while($line = mysql_fetch_row($result)){
      
      	//find username corresponding to the sender's id
      	$query= 'SELECT username FROM User WHERE idUser='.$line[0];
		$senderUsername = mysql_query($query) or die('Query Data failed: ' . mysql_error());

      
        //bold style if the message has NOT been seen, else no style
        if($line[1] == 0){ 
        	$bold='<b>';
        	$dolb='</b>';
        }
        else{
        	$bold='';
        	$dolb='';
        }

		
		//start of a line
        echo'<tr class="row">';
        //No attribute for time when the message is recieved??!
        echo'<td>'.$bold.'??:??'.$dolb.'</td>'; 
		
		
		//if the message is a notification of friendship or not
		if($line[2] == 1){
        	echo'<td>'.$bold.'You are now friend with '.$senderUsername.$dolb.'</td>';
        }
        else{
            echo'<td>'.$bold.'Message from '.$senderUsername.$dolb.'</td>';
        }
        
        
        //if the message has NOT been seen put a button, else display time
        if($line[1] == 0){ 
        	//onclick="nav(?,?)
        	echo'<td><input type="button" class="button" name="nom" value="Send a message" onclick="nav(3,4)"></td>';
        }
        else{
        	//display time not sure if it's already seconds
        	echo'<td>'.$bold.$line[3].'sec'.$dolb'</td>';
        }
        
//end of line
 echo'</tr>';
                    }
//end of the 10 lines                  
echo'</table>';

?>