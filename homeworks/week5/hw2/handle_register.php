<?php
	
	require_once("conn.php");

	$username = $_POST["username"];
	$password = $_POST["password"];
	$nickname = $_POST["nickname"];
	$sql = "INSERT INTO elvis1056_register (username, password, nickname) VALUES ('$username', '$password', '$nickname')";
	$conn->query($sql);
	//echo $sql;
	$conn->close();
	header("Location: index.php");

?>