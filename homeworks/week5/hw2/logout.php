<?php
	setcookie("user_id", "", time()+3600*24);
	header("location: index.php");
?>