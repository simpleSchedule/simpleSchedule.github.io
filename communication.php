<?php

if (isset($_POST['new-event'])) {
	$sql = 'insert into events (name, name-short, location, lecture, information) values ("1","2","3","4","5")';
	header('index.html');
}


?>