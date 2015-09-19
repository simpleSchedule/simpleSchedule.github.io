<?php

	//Start session, if not started
	if (session_status() == PHP_SESSION_NONE) { session_start(); }

	//Alert messages off
	ini_set('display_errors', 'Off');

	//Database information
	$databaseServer = 'localhost';
	$databaseUsername = 'root';
	$databasePassword = '';
	$database = 'simpleschedule';

	//Connect to the correct database
	$connectDatabase = mysql_connect($databaseServer, $databaseUsername, $databasePassword);
	$chooseDatabase = mysql_select_db($database, $connectDatabase);

	if (!$connectDatabase) {
		die ('MySql down: ' . mysql_error());
	}

	if (!$chooseDatabase) {
		mysql_query('CREATE DATABASE simpleschedule');
		die ('No database, refresh the page: ' . mysql_error());
	}
	
?>