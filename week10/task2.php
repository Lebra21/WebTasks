<html>
<head>
<style>
select{
  width:100%;
  background:white;
  padding:5px;
  border-radius:5px;
  color:#444444;
}
input{
  border-radius:5px;
  padding:5px;
}
input[type='text'],input[type='number']{
  width:calc(100% - 12px);
}
table tr td{
  padding:3px;
}
</style>
</head>
<?php
$makers = ["Toyota","BMW","Mercedes"];
$engine = ["gas","diesel","petroleum"];
?>
<form action="Task2_submit.php">
  <table border="1" style="border-collapse: collapse;">
    <tr>
      <td>Maker:</td>
      <td><select name="maker">
        <?php
        foreach ($makers as $maker) {
           ?> <option><?=$maker?></option><?php
         } 
        ?>
      </select></td>
    </tr>
    <tr>
      <td>Year:</td>
      <td><select name="year">
        <?php
        for ($i=2018; $i > 1998; $i--) { 
           ?> <option><?=$i?></option><?php
         } 
        ?>
      </select></td>
    </tr>
    <tr>
      <td>Model:</td>
      <td><input type="text" name="model" value="Corolla"></td>
    </tr>
    <tr>
      <td>Engine:</td>
      <td><?php
      foreach ($engine as $value) {
         ?> <label><input type="radio" name="engine" checked="checked" value=<?=$value?> ><?=$value?></label><?php
       } 
      ?></td>
    </tr>
    <tr>
      <td>Price:</td>
      <td><input type="number" name="price" value="30000"></td>
    </tr>
    <tr>
      <td>Additional:</td>
      <td>
        <input type="checkbox" name="tax" checked="checked">tax payed</br>
        <input type="checkbox" name="tech">technical check pass</br>
        <input type="checkbox" name="investemt">doesn't require investemt</br>
      </td>
    </tr>
  </table>
  <input type="submit"/ value="Submit">
</form>