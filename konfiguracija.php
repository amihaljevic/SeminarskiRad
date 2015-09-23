<?php

	session_start();

	$naslovAplikacije = "Voodoo";
	//lokalno
	/*
	$putanjaApp = "/Seminar/";
	$mysql_host = "localhost";
	$mysql_database = "s0122215644_1";
	$mysql_user = "voodoo";
	$mysql_password = "voodoo";
	*/

	//server
	$putanjaApp="/OMS20142015/0122215644/Seminar/";
	$mysql_host = "localhost";
	$mysql_database = "s0122215644_1";
	$mysql_user = "s0122215644";
	$mysql_password = "1212994305019";

	//spajanje na bazu
	$veza = new PDO("mysql:dbname=" . $mysql_database . ";host=" . $mysql_host . "", $mysql_user, $mysql_password);
	$veza->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$veza->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$veza->exec("SET CHARACTER SET utf8");
	$veza->exec("SET NAMES utf8");

?>