<?php
$maker = $_REQUEST["maker"];
$year = $_REQUEST["year"];
$model = $_REQUEST["model"];
$engine = $_REQUEST["engine"];
$price = $_REQUEST["price"];
$tax = "no";
$tech = "no";
$invest = "no";
if (isset($_REQUEST["tax"])) {
	$tax = "yes";
}
if (isset($_REQUEST["tech"])) {
	$tech = "yes";
}
if (isset($_REQUEST["investemt"])) {
	$invest = "yes";
}
?>
<html>
<head>
	<title></title>
</head>
<body>
	You added item: <strong><?=$maker." ".$model?></strong></br>
	Produced in <?=$year?>(<?=2018-$year?> years old) with <?=$engine?> engine</br>
	Tax payed: <strong><?=$tax?></strong></br>
	Technical check passed: <strong><?=$tech?></strong></br>
	Doesn't require investemt: <strong><?=$invest?></strong></br>
	$<?=$price?></br>
</body>
</html>