<?php 
include 'list.php';

$status = 'all';
$field = 'priority';

$order = array();

if ($status == 'all') {
	$order = array_keys($list);
}
else {
	foreach ($list as $key => $item) {
		if($item['complete'] == $status) {
			$order[] = $key;
		}
	}
}

if ($field) {
	$sort = array();
	foreach ($order as $id) {
		$sort[$id] = $list[$id][$field];
	}
	asort($sort);
	$order = array_keys($sort);
}
//var_dump($sort);
//var_dump($list);

echo '<table>';
echo '<tr>';
echo '<th>Title</th>';
echo '<th>Priority</th>';
echo '<th>Due-date</th>';
echo '<th>Complete</th>';
echo '</tr>';
foreach ($order as $id) {
	echo '<tr>';
	echo '<td>' . $list[$id]['title'] . "</td>\n";
	echo '<td>' . $list[$id]['priority'] . "</td>\n";
	echo '<td>' . $list[$id]['due'] . "</td>\n";
	echo '<td>';
	if ($list[$id]['complete']) {
		echo 'Yes';
	}
	else {
		echo 'No';
	}
	echo "</td>\n";
	echo '</tr>';
}
echo '</table>';
?>