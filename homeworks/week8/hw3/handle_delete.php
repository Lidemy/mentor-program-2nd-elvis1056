<?php
	
	require_once("conn.php");
	include_once("check_login.php");

	$id = $_POST['id'];
	$sql = "DELETE FROM elvis1056_testuser WHERE id=? or parent_id=?";

	$stmt = $conn->prepare($sql);
	$stmt->bind_param("ii", $id, $id);

	if ($stmt->execute()) {
		echo json_encode(array(
			'result' => 'success',
			'message' => 'successfully deleted'
		));
	} else {
		echo json_encode(array(
			'result' => 'failure',
			'message' => 'delete failed'
		));
	}
	
?>


				