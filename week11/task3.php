<?php
	$con = mysqli_connect("localhost:3306","root","","week12");
	if (!$con) {
		die("Could not connect");
	}
	if (isset($_REQUEST["id"])) {
		$id = $_REQUEST["id"];
		$sql_delete = "DELETE FROM `cars` WHERE `id`=$id";
		if (mysqli_query($con, $sql_delete)){echo "Delete succesfull";}
	}
	if (isset($_REQUEST["maker"]) && isset($_REQUEST["model"]) && isset($_REQUEST["price"])&& isset($_REQUEST["year"]) && isset($_REQUEST["url"])) { 
		$model=$_REQUEST["maker"];
		$maker=$_REQUEST["model"];
		$price=(int)$_REQUEST["price"];
		$year=(int)$_REQUEST["year"];
		$url=$_REQUEST["url"];
		$sql_add = "INSERT INTO cars (`maker`, `model`, `price`, `year`, `url`) VALUES ('$model', '$maker', $price, $year, '$url');";
		if(mysqli_query($con, $sql_add)){echo "Add succesfull";}
		else echo "noo";
	}
	$sql = "SELECT * FROM `cars` WHERE 1";
	$result = mysqli_query($con, $sql);
	$num = mysqli_num_rows($result);
?>
<html>
<head>
	<title></title>
	<style>
	/* Styles go here */
		.cars{
			display: flex;
			flex-wrap: wrap;
			align-items: center;
			justify-content: space-around;
		}
		.car{
		  display:flex;
		  border:1px solid red;
		  border-radius:5px;
		  width: 300px;
			margin: 20px;
		}
		.car .right{
			padding: 5px;
		}
		.title{
		  font-size:16px;
		  font-weight:bold;
		}
		.attributes .row{
		  display:flex;
		}
		.attributes .row div{
		  width:50%;
		}
		.attributes .row .name{
		  font-weight:bold;
		}
		.car img{
		  border-radius: 5px;
		}
	</style>
</head>
<body>
	<div class="create">
		<form action="Task3.php">
			<table>
			<tr><td><label>Maker: </label></td><td><input type="text" name="model"></td></tr>
			<tr><td><label>Model: </label></td><td><input type="text" name="maker"></td></tr>
			<tr><td><label>Price: </label></td><td><input type="number" name="price"></td></tr>
			<tr><td><label>Year: </label></td><td><input type="number" name="year"></td></tr>
			<tr><td><label>Image(URL): </label></td><td><input type="text" name="url"></td></tr>
			</table>
			<input type="submit" value="Add new">
		</form>
	</div>
	<div class="cars">
		<?php
		for ($i=0; $i < $num; $i++) { 
		$row = mysqli_fetch_assoc($result);
		?>
			<div class="car">
				<img height="80" width="100" src=<?=$row["url"]?>>
				<div class="right">
					<div class="title"><?=$row["maker"]." ".$row["model"]?></div>
					<div class="atr">
						<div class="row"><div>Year: <?=$row["year"]?></div></div>
						<div class="row"><div>Price: <?=$row["price"]?></div></div>
						<a href="Task3.php?id=<?=$row["id"]?>">Delete</a>
					</div>
				</div>
			</div>
		<?php
		}
		?>
	</div>
</body>
</html>