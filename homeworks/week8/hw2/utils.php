<?php
	require_once('conn.php');

	$conn->autocommit(FALSE);
	$conn->begin_transaction();

	$stmt = $conn->prepare("SELECT amount from elvis1056_cartest where id = 1 for update");
	$stmt->execute();

	$result = $stmt->get_result();

	if ($result->num_rows> 0) {
		$row = $result->fetch_assoc();
		//echo "mount:" . $row['amount'];
	}

	if ($row['amount'] > 0) {
		$stmt = $conn->prepare("UPDATE elvis1056_cartest SET amount = amount - 1 where id = 1");
		if($stmt->execute()){
			echo '<script>alert("購買成功!"); window.location = "./hw3.php"</script>';
		}
	} else {
		echo '<script>alert("沒有庫存囉!"); window.location = "./hw3.php"</script>';
	}

	$conn->commit();
	$conn->close();
	
?>