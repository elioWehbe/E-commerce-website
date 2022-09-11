<?php
include ("mvc/CoffeeController.php");
$title="Manage Coffee";
$coffeeController=new CoffeeController();
$content=$coffeeController->CreateOverviewTable();
if(isset($_GET['delete'])){
    $coffeeController->DeleteCoffee($_GET['delete']);
}
include 'template.php';
?>