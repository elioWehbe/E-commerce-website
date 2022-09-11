<?php
require "mvc/CoffeeController.php";

$coffeeController=new CoffeeController();
$title="Add a new Coffee";
if(isset($_GET["update"])){
    $coffee = $coffeeController->GetCoffeeById($_GET['update']);
    $content =
        "

<form method='post'>


     <fieldset>
    <table>
       <tr><td><legend>Add a new Coffee</legend></tr></td>
       <tr> <td><label for='name'>Name:</label></td>
       <td> <input type='text'  name='txtName' value='$coffee->name' ></td></tr>
        <tr><td><label>Type:</label></td>
       <td><select class='inputField' name='ddlType'>
            <option value='%'>All</option>"
        . $coffeeController->CreateOptionValues($coffeeController->GetCoffeeTypes()) .
        "</select></td></tr>
      <tr> <td><label for='price'>Price:</label></td>
      <td>  <input type='text' name='txtPrice' value='$coffee->price'></td></tr>

       <tr><td> <label for='avgReview'>Country:</label></td>
        <td><input type='text' name='txtCountry' value='$coffee->country' ></td></tr>
      <tr> <td><label for='avgReview'>Image:</label></td>
        <td><select class='inputField' name='ddlImage'>" . $coffeeController->GetImages() . "</select></td></tr>
        <tr><td><label for='avgReview'>kcal:</label></td>
        <td><input type='text' name='kcal' value='$coffee->kcal' ></td></tr>
       <tr><td> <label for='avgReview'>Review:</label></td>
        <td><textarea name='txtReview'></textarea></td></tr>
        <tr><td> <input type='submit' value='Submit'>$coffee->review</tr></td>
    </table>
   </fieldset>

</form>
";

}
else{
    $content =
        "
<form method='post'>
 
      
     <fieldset>
    <table>
       <tr><td><legend>Add a new Coffee</legend></tr></td>
       <tr> <td><label for='name'>Name:</label></td>
       <td> <input type='text'  name='txtName' ></td></tr>
        <tr><td><label>Type:</label></td>
       <td><select class='inputField' name='ddlType'>
            <option value='%'>All</option>"
        .$coffeeController->CreateOptionValues($coffeeController->GetCoffeeTypes()).
        "</select></td></tr>
      <tr> <td><label for='price'>Price:</label></td>
      <td>  <input type='text' name='txtPrice' ></td></tr>
     
       <tr><td> <label for='avgReview'>Country:</label></td>
        <td><input type='text' name='txtCountry'></td></tr>
      <tr> <td><label for='avgReview'>Image:</label></td>
        <td><select class='inputField' name='ddlImage'>".$coffeeController->GetImages()."</select></td></tr>
        <tr><td><label for='avgReview'>kcal:</label></td>
        <td><input type='text' name='kcal'></td></tr>
       <tr><td> <label for='avgReview'>Review:</label></td>
        <td><textarea name='txtReview'></textarea></td></tr>
        <tr><td> <input type='submit' value='Submit'></tr></td>
    </table>
   </fieldset>
   
</form>
";

}




if(isset($_GET["update"])){
if(isset($_POST["txtName"])) {
    $coffeeController->UpdateCoffee($_GET['update']);
}}
 else {
     if (isset($_POST['txtName'])) {
         $coffeeController->InsertCoffee();
     }}

include "template.php";
?>


