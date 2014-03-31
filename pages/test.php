<?php
function display ($date) {
	$datetime1 = date_create($date);
    $datetime2 = date_create("now");
    $interval = date_diff($datetime1, $datetime2);
    echo $interval->d;
	if ($interval->d<1) {
		echo date_format($datetime1, 'H:i:s');
	} else {
		echo date_format($datetime1, 'Y-m-d');
	}
}
display('2014-03-31 12:00:00');
?>
