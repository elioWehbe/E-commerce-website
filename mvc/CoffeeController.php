<head> <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    function showConfirm(coffeeId) {
        var c=confirm("Are you sure you wish to delete this item?");
        if(c)
            window.location="CoffeeOverview.php?delete="+coffeeId;

        
    }


</script>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="Style/stylesheet.css">
</head>
<?php

include('CoffeeModel.php');

class CoffeeController
{
    function CreateOverviewTable(){
        $result="
        <table border='2'>
        <tr>
        <td></td>
        <td></td>
        <th>Coffee Id</th>
        <th>Name</th>
        <th>Price</th>
        <th>Type</th>
        <th>Kcal</th>
        <th>Country</th>
        </tr>
        
        ";
        $coffeeArray=$this->GetCoffeeByType('%');
        foreach($coffeeArray as $key => $value){
          $result=$result.
          "<tr><td><a href='CoffeeAdd.php?update=$value->coffeeId'>Update</a> </td>
              <td><a href='#' onclick='showConfirm($value->coffeeId)'>Delete</a> </td>
              <td>$value->coffeeId</td>
              <td>$value->name</td>
              <td>$value->price</td>
              <td>$value->type</td>
              <td>$value->kcal</td>
              <td>$value->country</td></tr>";
              }
    $result=$result."</table>";
        return $result;
    }


    function CreateCoffeeDropdownList() {
        $coffeeModel = new CoffeeModel();
        $result = "<form action = '' method = 'post'>
 <div class='form-group'>
                    Please select a type: 
                    <select name = 'types' class='form-control'>
                        <option value = '%' >All</option>
                        " . $this->CreateOptionValues($coffeeModel->GetCoffeeTypes()) .
            "</select>
                        </div>
                     <input type = 'submit' class='btn btn-secondary btn-lg' value = 'Search' />
                    </form>";

        return $result;
    }

    function CreateOptionValues(array $valueArray) {
        $result = "";

        foreach ($valueArray as $value) {
            $result = $result . "<option value='$value'>$value</option>";
        }

        return $result;
    }

    function CreateCoffeeTables($types)
    {
        $coffeeModel = new CoffeeModel();
        $coffeeArray = $coffeeModel->GetCoffeeByType($types);
        $result = "";



        foreach ($coffeeArray as $key => $coffee)
        {
            $result = $result .
                "<div class='table'> 
<div class='thead'>
<div class='thead'>
                        <div class='table-row'>
                        
       
                         <div class='table-cell-image'>  <img src = '$coffee->image' class='imgResponsive'/></div>
                            <div class='table-cell'>Name: 
                         $coffee->name
                     </div></div>
                        
                       <div class='table-row'>
                         <div class='table-cell'>    Type: 
                           $coffee->type</div>
                        </div>
                        </div>
                        <div class='table-row'>
 <div class='table-cell'>Kcal:
  $coffee->kcal</div>
</div>
                     <div class='table-row'>
                      <div class='table-cell'>  Price:
                          $coffee->price</div>
                        </div>
                    <div class='table-row'> 
                    <div class='table-cell'>Average Review:</div>
                      $coffee->avgReview</div>
                      </div>
                                                

                   <div class='table-row'> 
                            <div class='table-cell'>Origin: 
                        $coffee->country</div>
                        </div>
                        </div>
                          <div class='table-row'>   <div class='table-cell'>   $coffee->review</div>
                        </div>
                     </div>";
        }
        return $result;

    }
    function GetImages(){
        $handle=opendir("Images/Coffee");
       while ($image=readdir($handle)){
           $images[]=$image;
       }
       closedir($handle);
       $imageArray=array();
       foreach ($images as $image){
    if(strlen($image)>2){
        array_push($imageArray,$image);
    }
        }
        $result=$this->CreateOptionValues($imageArray);
       return $result;
    }
    function InsertCoffee(){
        $name=$_POST['txtName'];
        $type=$_POST['ddlType'];
        $price=$_POST['txtPrice'];
        $country=$_POST['txtCountry'];
        $image=$_POST['ddlImage'];
        $kcal=$_POST['kcal'];
        $review=$_POST['txtReview'];
        $coffee=new entite(-1,$name,$type,$price,"",$country,$image,$kcal,$review);
        $coffeeModel=new CoffeeModel();
        $coffeeModel->InsertCoffee($coffee);
    }
    function UpdateCoffee ($coffeeId){
        $name=$_POST['txtName'];
        $type=$_POST['ddlType'];
        $price=$_POST['txtPrice'];
        $country=$_POST['txtCountry'];
        $image=$_POST['ddlImage'];
        $kcal=$_POST['kcal'];
        $review=$_POST['txtReview'];
        $coffee=new entite(-1,$name,$type,$price,"",$country,$image,$kcal,$review);
        $coffeeModel=new CoffeeModel();
        $coffeeModel->UpdateCoffee($coffeeId,$coffee);

    }
    function DeleteCoffee($coffeeId){
        $coffeeModel=new CoffeeModel();
        $coffeeModel->DeleteCoffee($coffeeId);

    }
    function GetCoffeeById($coffeeId){
        $coffeeModel=new CoffeeModel();
        return $coffeeModel->GetCoffeeById($coffeeId);
    }
    function GetCoffeeByType($type){
        $coffeeModel=new CoffeeModel();
        return $coffeeModel->GetCoffeeByType($type);
    }
    function GetCoffeeTypes(){
        $coffeeModel=new CoffeeModel();
        return $coffeeModel->GetCoffeeTypes();
    }
}

?>

