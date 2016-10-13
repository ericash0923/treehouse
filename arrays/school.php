<?php
	$firstname = 'Marius';
	$lastname = 'Zaleskis';
	$currentGrade = 12;
	$finalAverage = .89;
	$messageBody = '';

	if (!$firstname || !$lastname) {
		echo 'Iveskite Varda arba Pavarde';
	}
	else if ($currentGrade < 9 || $currentGrade > 12) {
		echo 'Tik gimnazijos moksleiviams';
	}
	else {
		if ($finalAverage < .70) {
			echo 'Go home';
		}
		else {
			switch ($currentGrade) {
				case 9:
					$messageBody = 'Tu beveik 10 tokas.';
					break;
				case 10:
					$messageBody = 'Tu beveik 11 tokas';
					break;
				case 11:
					$messageBody = 'Tu beveik 12 tokas';
					break;
				case 12:
					$messageBody = 'Sveikinu baigus mokykla';
					break;
				default:
					$messageBody = 'Nera tokios klases';
					break;
			}
		}

		echo "Mielas $firstname $lastname\n";
		echo $messageBody;
	}
?>