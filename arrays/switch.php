<?php 
	$time = date('l');

	switch ($time) {
		case 'Monday':
			echo 'Wash on Monday';
			break;
		case 'Wednesday':
			echo 'ASDFASDF';
			break;
		default:
			echo 'default';
			break;
	}

	var_dump(date('Y'));
?>

