
<?php 

try {
	$db = new PDO("mysql:host=localhost;dbname=crud", "mariususer", "murkis");
	$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
	echo $e->getMessage();
	exit;
}

?>