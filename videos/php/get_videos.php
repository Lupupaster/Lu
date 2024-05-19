<?php
	require_once 'config.php';
	
	$c = 11;
	$o = 0;
	if(isset($_GET['count']))	$c = intval($_GET['count']);
		if(isset($_GET['offset']))	$o = intval($_GET['offset']);
	
	$sql = sprintf('SELECT `ID`, `Title`, `Description`, `Director`, `Year`, `Logo` FROM `videos` LIMIT %d OFFSET %d', $c,$o);
	$videos = $conn->query($sql);
	
	$result = '{"videos": [';
	foreach ($videos as $row){
	$Director = $row['Director'];
	$Title = $row['Title'];
	$Description = $row['Description'];
	$ID = $row['ID'];
	$Year = $row['Year'];
	$Logo = $row['Logo'];
	$result .= sprintf('{"Director":"%s", "Title":"%s", "Description":"%s", "Year":"%d", "id":"%d", "Logo":"%s"}, ', $Director,$Title,$Description,$Year,$ID,$Logo);
	}
	$result = rtrim($result, ', ');
	$result .= ']}';
	echo $result;
?>
