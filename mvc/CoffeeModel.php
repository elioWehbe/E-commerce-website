<?php
include('entite.php');

class CoffeeModel
{
    function GetCoffeeTypes() {
        include ('config/config.php');


        $sql="SELECT DISTINCT type FROM coffee";


        $result = mysqli_query($con,$sql) or die(mysqli_error());
        $types = array();


        while ($row = mysqli_fetch_array($result)) {
            array_push($types,$row[0]);
        }

        mysqli_close($con);
        return $types;
    }
    function GetCoffeeByType($type) {
        include 'config/config.php';



        $query = "SELECT * FROM coffee WHERE type LIKE '$type'";
        $result = mysqli_query($con,$query);
        $coffeeArray = array();


        while ($row = mysqli_fetch_array($result)) {
        $coffeeId=$row[0];
        $name=$row[1];
        $type=$row[2];
        $price=$row[3];
        $avgReview=$row[4];
        $country=$row[5];
        $image=$row[6];
        $kcal=$row[7];
        $review=$row[8];
      $coffee=new entite($coffeeId,$name,$type,$price,$avgReview,$country,$image,$kcal,$review);
            array_push($coffeeArray, $coffee);
        }

        mysqli_close($con);
        return $coffeeArray;
    }
    function GetCoffeeById($coffeeId){
        require 'config/config.php';


       $coffeeArray=array();
        $query = "SELECT * FROM coffee WHERE coffeeId LIKE '$coffeeId'";
        $result = mysqli_query($con,$query);



        while ($row = mysqli_fetch_array($result)) {

            $name=$row[1];
            $type=$row[2];
            $price=$row[3];
            $avgReview=$row[4];
            $country=$row[5];
            $image=$row[6];
            $kcal=$row[7];
            $review=$row[8];
            $coffee=new entite($coffeeId,$name,$type,$price,$avgReview,$country,$image,$kcal,$review);
            array_push($coffeeArray, $coffee);
        }

        mysqli_close($con);
        return $coffee;
    }
    function InsertCoffee(entite $coffee){
        include "config/config.php";
       $query= sprintf("insert into coffee(name,type,price,avgReview ,country,image,kcal,review) 
       VALUES ('%s','%s','%s','%s','%s','%s','%s','%s')",
        mysqli_real_escape_string($con,$coffee->name),
        mysqli_real_escape_string($con,$coffee->type),
        mysqli_real_escape_string($con,$coffee->price),
        mysqli_real_escape_string($con,$coffee->avgReview),
        mysqli_real_escape_string($con,$coffee->country),
        mysqli_real_escape_string($con,"Images/Coffee/".$coffee->image),
           mysqli_real_escape_string($con,$coffee->kcal),
           mysqli_real_escape_string($con,$coffee->review)
       );
       $this->PerformQuery($query);

    }
    function UpdateCoffee($coffeeId,entite $coffee){

        include ("config/config.php");
        $query=sprintf("UPDATE coffee SET name='%s',type='%s',price='%s',avgReview='%s',country='%s',image='%s',kcal='%s',review='%s' where coffeeId=$coffeeId",
            mysqli_real_escape_string($con,$coffee->name),
            mysqli_real_escape_string($con,$coffee->type),
            mysqli_real_escape_string($con,$coffee->price),
            mysqli_real_escape_string($con,$coffee->avgReview),
            mysqli_real_escape_string($con,$coffee->country),
            mysqli_real_escape_string($con,"Images/Coffee/".$coffee->image),
            mysqli_real_escape_string($con,$coffee->kcal),
            mysqli_real_escape_string($con,$coffee->review)
        );
        $this->PerformQuery($query);

    }
    function DeleteCoffee($coffeeId){
        $query="DELETE FROM coffee where coffeeId=$coffeeId";
        $this->PerformQuery($query);
    }
    function PerformQuery($query){
        include ('config/config.php');
        mysqli_query($con,$query);
        mysqli_close($con);
    }

}
?>

