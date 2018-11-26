<?php
	require_once('conn.php');
	setcookie("token", "", time()+3600*24);
	setcookie('id', "", time()+3600*24);
	header("location: index.php");
?>