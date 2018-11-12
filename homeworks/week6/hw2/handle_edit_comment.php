<?php
	
	require_once("conn.php");

	$content = $_POST['content'];
	$id = $_POST['id'];

	$sql = "UPDATE elvis1056_testuser SET content='$content' WHERE id=$id";

	if ($conn->query($sql)) {
		header('Location: index.php');
	} else {
		echo "錯誤";
	}
	
?>