<?php
	ob_start();
	$db_host = "localhost";
	$db_name = "food";
	$db_username = "root";
	$db_password = "";
	global $link;
	$link=mysql_connect("{$db_host}", "{$db_username}", "{$db_password}") or die("Could not connect database");
	mysql_select_db("{$db_name}") or die("Could not selected database");
	mysql_query("SET NAMES utf8");
?>