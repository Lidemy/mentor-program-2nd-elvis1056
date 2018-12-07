<?php
require_once('conn.php');
?>
<!DOCTYPE html>
<html>

<head>
	<title>index.php</title>
</head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<body>
	<div class="container">
		<div class="row">
			<div class="col-3"></div>
			<div class="col-3">
				<form method="POST" action="utils.php">
				  <div class="form-row align-items-center">
				    <div class="col-auto my-1">
				      <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
				      <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
				        <option selected>選擇購買數量</option>
				        <option name="1" value="1">One</option>



				      </select>
				    </div>
				    <div class="col-auto my-1">
				      <button type="submit" class="btn btn-primary">Submit</button>
				    </div>
				  </div>
				</form>
			</div>
			<?php
			    $sql = "SELECT * FROM elvis1056_cartest where id = 1";
			    $results = $conn->query($sql);
			    if($results->num_rows > 0){
			    	while($row = $results->fetch_assoc()){
			?>
			<button type="button" class="btn btn-primary"><?php echo "剩餘數量:" . $row['amount']; ?></button>
			<?php
			    	} 
			    } else {
			    	echo "連線失敗了!";
			    }
			?>
		</div>
	</div>
</body>
</html>