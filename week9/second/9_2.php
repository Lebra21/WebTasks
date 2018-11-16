<?php
$maker = $_REQUEST["maker"];
$year = $_REQUEST["year"];
$model = $_REQUEST["model"];
$engine = $_REQUEST["engine"];
$price = $_REQUEST["price"];
$tax_payed = "no";
$tech_check = "no";
$investment = "no";
if (isset($_REQUEST["tax_payed"])) {
	$tax_payed = "yes";
}
if (isset($_REQUEST["tech_check"])) {
	$tech_check = "yes";
}
if (isset($_REQUEST["investemt"])) {
	$investment = "yes";
}
echo "You added new item: ";?> <strong><?=$maker." ".$model?></strong><br><?php 
echo "produced in "?><?=$year?><?php echo " ("?><?php echo 2018-intval($year) . "years old) with " . $engine . " engine"?><br><?php
echo "Tax payed: "?> <strong><?=$tax_payed?></strong><br><?php
echo "Technical check passed: "?> <strong><?=$tech_check?></strong><br><?php
echo "Doesn't require investment: "?> <strong><?=$investment?></strong><br><?php
echo "$ ".$price;
?>