<?php
$dbc = mysqli_connect('localhost','root','','hometask');
if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = $_POST['password1'];
	$query = "SELECT* FROM signup WHERE username ='$username' AND password = '$password'";
	$data = mysqli_query($dbc,$query);
	$result = mysqli_fetch_array($data);
	if($result){
		
		header("location:index.php");

	}else{
	
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
		<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<style>
		li:hover{
			background-color: #4CAF50;
			
		}
		li{

		}
	</style>
	<style>
		form{
			position: fixed;
			border: 1px solid #4CAF50;
			right: 40%;
			top: 20%;
			width: 20%;
			height: 40%;
		}
		form label{
			font-size: 20px;
			color: #4CAF50;
		}
		form input{
			height: 30px;
			width: 90%;
			border-radius: 5px;
		}
		
		form div{
			display: flex;
			flex-direction: column;
			margin:20px 0 0 20px;
		}
		form button{
			background-color: #4CAF50;
			border: none;
			color: white;
			padding: 15px 32px;
			text-align: center;
			text-decoration: none;
		    font-size: 16px;
			margin: 10px 0 0 20px;
			cursor: pointer;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="hm1/index.php" class="navbar-brand">RCG</a>
			</div>
			<div>
				<ul class="nav navbar-nav">
					<li class="active"><a href="index.php">Main</a></li>
					<li><a href="login.php">Login</a></li>
					<li><a href="signup.php">Registration</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<content>
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<div>
				<label for="username">Login</label>
				<input type="text" name="username">
			
				<label for="password">Password</label>
				<input type="password" name="password1">
			</div>
				<button name="submit" type="submit">Log In</button>
				
		</form>
	</content>
</body>
</html>