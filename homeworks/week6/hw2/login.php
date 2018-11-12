<?php
	require_once("conn.php");
		$error_message ="";
	if(isset($_POST['username']) && !empty($_POST['username'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$stmt = $conn->prepare("SELECT * FROM elvis1056_register where username=?");
		$stmt->bind_param("s", $username);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		$hash_password = $row['password'];
		$id = $row['id'];
		
		if(password_verify($password, $hash_password)) {
			$token = uniqid();
			$sql_certificate_delete = "DELETE FROM elvis1056_certificates WHERE user_id = $id";
			$conn->query($sql_certificate_delete);
			$sql_certificate = "INSERT INTO elvis1056_certificates (user_id, token) VALUES ($id, '$token')";
			$conn->query($sql_certificate);
			setcookie('token', $token, time()+3600*24);
			header('Location: index.php');
		} else {
			$error_message = "帳號或密碼錯誤";
			//header('Location: index.php');
		}
		$conn->close();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>week5.hw2</title>
	<meta charset="utf-8" content="width=device-width, initial-scale=1">
</head>

<style type="text/css">
	
	body {
		background-color: #EEE; 
	}

	.container {
		max-width: 300px;
		margin: 20px auto;
		border: 1px solid;
		text-align: center;
		padding: 5px;
	}

	.title {
		margin: 20px 10px;
	}

	.form {
		padding: 5px;
	}

	.button {
		padding: 8px 25px;
		cursor: pointer;
		border-radius: 5px;
		background: #3597dc;
		color: white;
		display: inline-block;
	}

</style>

<body>

	<div class="container">
		
		<h1 class="title">登入</h1>

		<form class="form" method="post" action="login.php">
			<div>
				username: <input type="text" name="username" />
			</div>

			<div>
				password: <input type="password" name="password" />
			</div>

			<input class="button" type="submit" >

			<?php
				if($error_message !== "") {
					echo $error_message;
				}
			?>
			<br>
			<br>
			<a href="register.php">點擊我進行-註冊</a>

		</form>

	</div>
</body>
</html>