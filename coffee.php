
<?php
include('mvc/CoffeeController.php');
$coffeeController = new CoffeeController();

if(isset($_POST['types']))
{

    $coffeeTables = $coffeeController->CreateCoffeeTables($_POST['types']);
}
else
{

    $coffeeTables = $coffeeController->CreateCoffeeTables('%');
}


$title = 'Coffee overview';
$content = $coffeeController->CreateCoffeeDropdownList(). $coffeeTables;
include 'template.php';

?>
