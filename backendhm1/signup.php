<?php
$dbc = mysqli_connect('localhost','root','','hometask');
if(isset($_POST['submit'])){
	$username = mysqli_real_escape_string($dbc,trim($_POST['username']));
	$password1 = mysqli_real_escape_string($dbc,trim($_POST['password1']));
	$password2 = mysqli_real_escape_string($dbc,trim($_POST['password2']));
	if(!empty($username) && !empty($password1) && !empty($password2) &&($password1 == $password2)){
		$query = "SELECT * FROM `signup` WHERE username = '$username'";
		$data = mysqli_query($dbc,$query);
		if(mysqli_num_rows($data) == 0){
			$query = "INSERT INTO `signup` (username,password) VALUES ('$username','$password2')";
			mysqli_query($dbc,$query);
			echo "Nice!!!!!";
			mysqli_close($dbc);
			exit();
		}
		else{
			echo "Login est";
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
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

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
				<label for="username">Username</label>
				<input type="text" name="username" id="one">
			
				<label for="password">Password</label>
				<input type="password" name="password1">
			
				<label for="password">Password</label>
				<input type="password" name="password2">
			
				
			</div>

			<button name="submit" type="submit">Sign In</button>
		</form>
	</content>
</body>
</html>