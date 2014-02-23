<?php
    /* PAUL 1 */
    $cmd = mysql_connect('localhost', 'root', 'root') or die('Could not connect'.mysql_error());
    $cnx = mysql_select_db('NetworkApplication') or die('Could not select database'.mysql_error());
    
    /* PAUL 2 */
    /*
    $cmd = mysql_connect('mysql-server-1.macs.hw.ac.uk', 'plo1', '') or die('Could not connect'.mysql_error());
    $cnx = mysql_select_db('plo1') or die('Could not select database'.mysql_error());
    */
	
    /* STEPHANIE 1 */
	/*$cmd = mysql_connect('localhost', 'root', '') or die('Could not connect'.mysql_error());
	$cnx = mysql_select_db('test') or die('Could not select database'.mysql_error());
	*
?>

