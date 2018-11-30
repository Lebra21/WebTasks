<?php
$usernames = ["billgates","johndoe","stevejobs"];
$username = "";
$password = "";
$confirm_password = "";
if (isset($_REQUEST["username"])){
	$username = $_REQUEST["username"];
	if ($username === "") {
		?> <div class="error">Username should not be empty</div> <?php
	}
}
if (isset($_REQUEST["password"]) || isset($_REQUEST["confirm_password"])) {
		$password = $_REQUEST["password"];
		$confirm_password = $_REQUEST["confirm_password"];
	if ($password === "" || $confirm_password === ""){
		?> <div class="error">Password and Confirm Password should not be empty</div> <?php
	}
}
if (in_array($username, $usernames)) {
	?> <div class="error">Username <?=$username?> already exists</div> <?php
}
if ($password !== $confirm_password) {
	?> <div class="error">Password and Confirm Password doesn't equal to each other</div> <?php
}
?>
<html>
<head><style>
.error{
	border:1px solid red;
	font-weight:bold;
	padding:5px;
	width:400px;
	margin:4px;
}
</style></head>
<body>
<form action="task1.php" method="post">
	<table>
		<tr>
			<td>
				Username:
			</td>
			<td>
				<input type="text" name="username" placeholder="Enter your nickname">
			</td>
		</tr>
		<tr>
			<td>
				Password:
			</td>
			<td>
				<input type="password" name="password" placeholder="Enter password">
			</td>
		</tr>
		<tr>
			<td>
				Confirm Password:
			</td>
			<td>
				<input type="password" name="confirm_password" placeholder="Confirm your password">
			</td>
		</tr>

	</table>
	<input type="submit" value="Submit" />
</form>
</body>
</html>