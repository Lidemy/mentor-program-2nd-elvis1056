<?php
	
	require_once("conn.php");

	$id = $_POST['id'];
	$sql = "DELETE FROM elvis1056_testuser WHERE id=$id or parent_id=$id";

	if ($conn->query($sql)) {
		header('Location: index.php');
	} else {
		printMessage($conn->error, 'index.php');
	}
	
?>


				