
<?php

class entite
{
    public $coffeeId;
    public $name;
    public $type;
    public $price;
    public $avgReview;
    public $country;
    public $image;
    public $kcal;
    public $review;

    function __construct($coffeeId, $name, $type, $price, $avgReview, $country, $image,$kcal,$review) {
        $this->coffeeId = $coffeeId;
        $this->name = $name;
        $this->type = $type;
        $this->price = $price;
        $this->avgReview = $avgReview;
        $this->country = $country;
        $this->image = $image;
        $this->kcal=$kcal;
        $this->review=$review;
    }

}

?>

