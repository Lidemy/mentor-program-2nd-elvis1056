<?php
	
	require_once("conn.php");

	//$nickname = $_POST["nickname"];
	$content = $_POST["content"];
	$parent_id = $_POST["parent_id"];
	$token = $_COOKIE["token"];
	
	$token_sql = " SELECT * FROM elvis1056_certificates WHERE token ='$token'";
	$token_result = $conn->query($token_sql);
	$row = $token_result->fetch_assoc();
	$user_id = $row['user_id'];

	//修改中
		//$session = "SELECT elvis1056_testuser.user_id FROM elvis1056_testuser LEFT JOIN elvis1056_certificate on elvis1056_testuser.user_id = elvis1056_certificate.id WHERE elvis1056_certificate.id = '$session_id'";
		//$session_result = $conn->query($session);
		//$session_row= $session_result->fetch_assoc();
		//$user_id = $session_row['id'];

	//原先我從cookie裡面拿到elvis1056_testuser資料庫中user_id
	//現在我的cookie裡面只能拿到，hash過後的亂碼存在elvis1056_certificate資料庫中 裡面包含 user_id
	//這個elvis1056_certificate理面的user_id是elvis1056_testuser的user_id
	
	$sql = "INSERT INTO elvis1056_testuser (user_id, content, parent_id) VALUES ($user_id, '$content', $parent_id)";
	$conn->query($sql);
	$conn->close();
	header("Location: index.php");

?>