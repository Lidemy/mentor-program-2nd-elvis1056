<?php
	$is_login = false;
	$user_id = '';

	if (isset($_COOKIE['user_id']) && !empty($_COOKIE['user_id'])) {
		$is_login = true;
		$user_id = $_COOKIE['user_id'];
	} else {

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
		max-width: 600px;
		margin: 20px auto;
	}




	.header {
		display: flex;
		justify-content: space-around;
		align-items: center;
	}

	.title {
		font-size: 50px;
		color: green;
	}

	.button__log {
		font-size: 18px;
		padding: 5px;
		border: 1px solid rgba(0,0,0,0.5);
		border-radius: 10px;
		margin-right: 10px;
		cursor: pointer;
	}




	.comment__list {
		margin: 5px;
		padding: 10px;
		border: 2px solid;
	}

	.comment__mainform__user > input {
		width:50%;
	}

	.comment__mainform__textarea > textarea {
		width: 100%;
		height: 200px;
		margin-top: 10px;
	}

	.comment__mainform__button {
		padding: 10px 40px;
		background: #3597dc;
		color: white;
		cursor: pointer;
	}




	.board__comments {
		margin-top: 20px;
	}

	.comment {
		border: 2px solid rgba(0,0,0,0.5);
		margin: 5px;
		padding: 20px;
	}

	.comment__content {
		margin-bottom: 20px;
	}

	.comment__user {
		display: flex;
		justify-content: space-between;
		border-bottom: 1px solid rgba(0,0,0,0.5);
		margin-bottom: 10px;
		font-size: 24px;
	}

	.board__subcomments {
		margin-bottom: 10px;
		margin-left: 15px;
	}

	.comment__user__sub {
		display: flex;
		justify-content: space-between;
		border-bottom: 1px solid rgba(0,0,0,0.5);
	}

	.board__subcomment__content {
		margin-bottom: 20px;
	}

	.comment__mainform__subuser > input {
		width:50%;
	}




	.comment__subform__user > input {
		width:50%;
	}

	.comment__subform__textarea > textarea {
		width: 100%;
		height: 100px;
		margin-top: 10px;
	}

	.comment__subform__button {
		padding: 10px 30px;
		background: #3597dc;
		color: white;
		cursor: pointer;
	}

	.pagesnum {
		margin: 5px;
    	padding: 10px;
    	border: 1px solid;
	}

	.every_num {
		display: flex;
		justify-content: center;
	}

	.totalpages {
		display: flex;
		justify-content: center;
	}

	ul li {
		list-style-type:none;
	}

</style>

<body>

	<!-- 整個網頁 -->
	<div class="container">
		
		<!-- 上方列表 -->
		<div class="header">
			<div class="title">留言板</div>
			<?php
					if(!$is_login) {
			?>
							<a href="register.php" class="button__log" >註冊</a>
							<a href="login.php" class="button__log" >登入</a>
			<?php	} else {
			?>
							<a href="logout.php" class="button__log" >登出</a>
			<?php
					}
			?>
		</div>
		
		<!-- 留言撰寫 -->
		<div class="comment__list">
			
			<div class="comment__mainform">
				<form method="post" action="add__comment.php">
					<!--  主留言暱稱
					<div class="comment__mainform__user">		
						<input name="nickname" type="text" placeholder="暱稱" required />
					</div>
					-->
					<div class="comment__mainform__textarea">
						<textarea name="content" placeholder="請在這輸入"></textarea>
					</div>
					<input type="hidden" name="parent_id" value='0' />
					<?php
						if ($is_login) {
							echo "<input type='submit' class='comment__mainform__button' value='送出' />";
						} else {
							echo "<input type='submit' class='comment__mainform__button' value='請先登入' disabled />";
						}
					?>
				</form>
			</div>
		</div>
		

		<!-- 留言評論撰寫 -->
		<div class="board__comments">

		<?php
			require_once('conn.php');
			
			$pages_sql = "SELECT COUNT(parent_id) AS everypage_number FROM elvis1056_testuser WHERE parent_id = 0";
			$pages_result = $conn->query( $pages_sql );
			//$data_nums = $pages_result->num_rows;
			$pages_row = $pages_result->fetch_assoc();

			$pagesnum = ceil ( $pages_row['everypage_number'] / 5 );

			if( !isset( $_GET['page'])) $page=1; //假如$_GET["page"]未設置 //則在此設定起始頁數
				else $page =  intval( $_GET['page'] ); //確認頁數只能夠是數值資料

			//查詢主要留言筆數
			$sql = "SELECT elvis1056_testuser.*, elvis1056_register.nickname FROM elvis1056_testuser left join elvis1056_register on elvis1056_testuser.user_id = elvis1056_register.id WHERE parent_id = 0 order by created_at DESC";
			echo $sql;
			$results = $conn->query( $sql );

			if( $results->num_rows > 0 ) {
				while($row = $results->fetch_assoc()) {
		?>

			<div class="comment">
				<div class="comment__user">		
					<div class="comment__author"><?php echo $row["nickname"]; ?></div>
					<div class="comment__time"><?php echo $row["created_at"]; ?></div>
				</div>
				<div class="comment__content"><?php echo $row["content"]; ?></div>
				<div class="board__subcomments">

					<?php
						$parent_id = $row["id"];
						$sub_sql = "SELECT elvis1056_testuser.*, elvis1056_register.nickname FROM elvis1056_testuser left join elvis1056_register on elvis1056_testuser.user_id = elvis1056_register.id WHERE parent_id = $parent_id order by created_at DESC";

						$sub_result = $conn->query( $sub_sql );
						while( $sub_row = $sub_result->fetch_assoc() ) {
					?>

					<div class="comment__user__sub">	
						<div class="comment__author"><?php echo $sub_row["nickname"]; ?></div>
						<div class="comment__time"><?php echo $sub_row["created_at"]; ?></div>
					</div>
					<div class="board__subcomment__content"><?php echo $sub_row["content"]; ?></div>

					<?php
						}
					?>
					
					<!-- 次留言撰寫 -->
					<div class="comment__subform">
						<form method="post" action="add__comment.php">
							<!--  次留言暱稱
							<div class="comment__subform__user">		
								<input name="nickname" type="text" placeholder="暱稱" required />
							</div>
							-->
							<div class="comment__subform__textarea">
								<textarea name="content" placeholder="請在這輸入"></textarea>
							</div>
							<input name="parent_id" type="hidden" value=<?php echo $row['id']; ?> />
							<?php
								if ($is_login) {
									echo "<input type='submit' class='comment__subform__button' value='送出' />";
								} else {
									echo "<input type='submit' class='comment__subform__button' value='請先登入' disabled />";
								}
							?>
						</form>
					</div>
				</div>
			</div>

		<?php
					}
			} else {
				echo " 0 results ";
			}
		?>

		</div>

		<div class="pagesnum">
			<div class="totalpages">
			<?php
				//分頁頁碼
				echo '共 '.$pagesnum.' 頁-第 '.$page.' 頁';
			?>
			</div >
				<ul class="every_num">
					<?php
						for($i=1; $i <= $pagesnum; $i++ ){
							if( $i === $page ) { 
								echo "<li>[ $i ]</li>";
							} else {
							echo "<li><a href='index.php?page=" . $i . "'>" . $i . "</a></li>";
							}
						}
					?>
				</ul>
			
		</div>
		
	</div>
</body>
</html>