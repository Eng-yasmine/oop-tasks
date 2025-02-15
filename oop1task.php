<?php

class Product 
{
    public $name ;
    public $price ;
    public $brand ;
    public $image ;
    public $describtion ;
    public $tax ;

    function get_name(){
        return "product name : " . $this->name ;
    }


    function get_brand_name(){
        return "brand name of this product : " . $this->brand ;
    }

    function Price_after_discount($discount){
        return $this->price - ($this->price * $discount); 
    }

    function final_price($discount){
        $price_after_discount = $this->Price_after_discount($discount);

      return $price_after_discount +($price_after_discount * $this->tax ) ;


    }
}

$product1 = new Product();
$product1->name = "laptop" ;
$product1->price = 6000 ;
$product1->brand = "dell" ;
$product1->image = "laptop.jpg";
$product1->describtion = "pwerful laptop for work";
$product1->tax = 0.15 ;
$product1->get_brand_name() ;
$product1->Price_after_discount(0.10);
$product1->final_price(0.10);

$product2 = new Product();
$product2->name = "iphon" ;
$product2->price = 30000 ;
$product2->brand = "iphon12" ;
$product2->image = "iphon.jpg";
$product2->describtion = "this is last update of great camera";
$product2->tax = 0.10 ;
$product2->get_brand_name() ;
$product2->Price_after_discount(0.15);
$product2->final_price(0.15);


$product3 = new Product();
$product3->name = "TV" ;
$product3->price = 20000 ;
$product3->brand = "LG_Smart" ;
$product3->image = "lg.jpg";
$product3->describtion = "4k smart ";
$product3->tax = 0.15 ;
$product3->get_brand_name() ;
$product3->Price_after_discount(0.15);
$product3->final_price(0.10);


$products = [$product1 , $product2 , $product3] ;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Cards</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
<?php foreach($products as $product): ?>
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="images/"<?=$product->image ; ?> alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?= $product->get_name() ; ?></h5>
    <p class="card-text"><?= $product->get_brand_name() ; ?></p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><?="price " . $product->price ; ?></li>
    <li class="list-group-item"><?= "in sale " . $product->Price_after_discount(0.15) ; ?></li>
    <li class="list-group-item"><?= "price with tax " . $product->final_price(0.10) ; ?></li>
  </ul>
  <div class="card-body">
    <a href="#" class="card-link"> buy </a>
    <a href="#" class="card-link"> info </a>
  </div>
</div>
<?php endforeach; ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html



