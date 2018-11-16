<?php
$makers = ["Toyota","BMW","Mercedes"];
$engine = ["gas","diesel","petroleum"];
$cars = [["id"=>"0","maker"=>"Toyota","model"=>"Corolla","year"=>"2015","engine"=>"petroleum","price"=>"30000","additional"=>["tax","investment"]],["id"=>"1","maker"=>"BMW","model"=>"X5","year"=>"2012","engine"=>"gas","price"=>"25000","additional"=>["tax","investment","check"]],["id"=>"2","maker"=>"Toyota","model"=>"Camry","year"=>"2008","engine"=>"diesel","price"=>"35000","additional"=>["investment","check"]]];
$selected_car = NULL;
if (isset($_REQUEST["id"])){
  $selected_car = $cars[$_REQUEST["id"]];
}
?>
<html>
<head>
<style>
select{
  width:200px;
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
<form action="task9_3.php">
<select name="id" onchange="this.parentNode.submit()">
  <option value="-1">Select car</option>


<?php foreach($cars as $car) {
  echo "<option value='".$car["id"]."'>".$car["maker"]." ".$car["model"]." (".$car["year"].")";
  echo "</option>";
} ?>
</select>
</form>
<form action="">
  <table border="1" style="border-collapse: collapse">
    <tr>
      <td>Maker:</td>
      <td><select name="maker">
        <?php foreach($makers as $maker){
          if($selected_car == NULL){?> <option><?=$maker?></option><?php
        }
          else{
            if($maker === $selected_car["maker"]) {
              ?> <option selected="selected"><?=$maker?></option><?php
            }
            else{
              ?><option><?=$maker?></option><?php
            }
          }
        }
        ?>
      </select></td>
    </tr>
    <tr>
      <td>Year:</td>
      <td><select name="year">
        <?php
        for ($i=1975; $i < 2018; $i++) { 
           if ($selected_car == NULL) {
             ?> <option><?=$i?></option><?php
           }
           else{
            if ($i === intval($selected_car["year"])) {
              ?> <option selected="selected"><?=$i?></option><?php
            }
            else{
              ?> <option><?=$i?></option><?php
            }
           }
         } 
        ?>
      </select></td>
    </tr>
    <tr>
      <td>Model:</td>
      <td><?php
      if ($selected_car == NULL) {
         ?><input type="text" name="model" value="Corolla"><?php
       }
      else{
         ?><input type="text" name="model" value=<?=$selected_car["model"]?>><?php
      } 
      ?>  
      </td>
    </tr>
    <tr>
      <td>Engine:</td>
      <td><?php
      foreach ($engine as $i) {
         if ($selected_car == NULL) {
           ?> <label><input type="radio" name="engine" checked="checked" value=<?=$i?> ><?=$i?></label><?php
         }
         else{
          if ($i == $selected_car["engine"]) {
            ?> <label><input type="radio" name="engine" checked="checked" value=<?=$i?> ><?=$i?></label><?php
          }
          else{
            ?> <label><input type="radio" name="engine" value=<?=$i?> ><?=$i?></label><?php
          }
         }
       } 
      ?></td>
    </tr>
    <tr>
      <td>Price:</td>
      <td><?php 
      if ($selected_car == NULL) {
        ?><input type="number" name="price" value="30000"><?php
      }
      else{
        ?><input type="number" name="price" value=<?=$selected_car["price"]?>><?php
      }
      ?>
      </td>
    </tr>
    <tr>
      <td>Additional:</td>
      <td><?php 
      if ($selected_car == NULL) {
        ?>
        <input type="checkbox" name="tax_payed" checked="checked">tax payed</br>
        <input type="checkbox" name="tech_check">technical check pass</br>
        <input type="checkbox" name="investment">doesn't require investemt</br>
        <?php
      }
      else{
        if (in_array("tax_payed", $selected_car["additional"])) {
          ?><input type="checkbox" name="tax" checked="checked">tax payed</br><?php
        }else{
          ?><input type="checkbox" name="tax_payed">tax payed</br><?php
        }
        if (in_array("check", $selected_car["additional"])) {
          ?><input type="checkbox" name="tech_check" checked="checked">technical check pass</br><?php
        }else{
          ?><input type="checkbox" name="tech_check">technical check pass</br><?php
        }
        if (in_array("investment", $selected_car["additional"])) {
          ?><input type="checkbox" name="investment" checked="checked">doesn't require investemt</br><?php
        }else{
          ?><input type="checkbox" name="investment">doesn't require investemt</br><?php
        }
      }
      ?>  
      </td>
    </tr>
  </table>
    <input type="submit" value="Submit" />
</form>