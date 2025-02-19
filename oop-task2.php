<?php


//parent class Product



class Product
{

    public $name;
    public $price;
    public $description;
    public $image;

    public function  __construct($name = ""  , $price  =  "", $description = "" , $image = "" )
    {
        $this->name=$name;
        $this->price=$price;
        $this->description=$description;
        $this->image = $image;
       
    } 
        
    

    public function upload_image()
    {
      
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           
            if (isset($_FILES['image'])  && is_array($_FILES['image']['name'])) {
                /*  echo "<pre>" ;
        var_dump($_FILES); 
 */
                foreach ($_FILES['image']['name'] as $key => $value) {
                    // var_dump($_FILES['image']['name'][$key]);
                    $tmp = $_FILES['image']['tmp_name'][$key];
                    // var_dump($tmp);
                   $this->image = $_FILES['image']['name'][$key];
                    if (move_uploaded_file($tmp, "images/" . $this->image)) {
                        echo " uploaded success";
                    } else {
                        echo "uploaded failed";
                    }
                }
            }
        }
    }

    public function calc_price($price){

         return $this->price = $price ;

    }
}


// child class Book
class Book extends Product
{
   private $puplishers = [];
    public $writer;
    public $color;
    public $supplier;

    public function set_publisher($puplishers) {
if(is_array($puplishers)){
    foreach($puplishers as $puplisher){
        $this->puplishers[] = $puplisher ; 
    }
}
      
        
    }
    public function choose_publisher() {
       $this->puplishers ;
       if(empty($this->puplishers)){
        echo "no publishers added";
       }else{
       $random_puplisher = array_rand( $this->puplishers);
       var_dump($random_puplisher);
       }


    }


    public function show_all_publishers() {}
}


//child class BabyCar

class BabyCar extends Product
{
    private $age;
    private $weight;
    public array $material;
    private $special_tax;

    public function display_material() {}

    public function get_final_price() {}
}

$product = new Product("php book" ,"500" ,"programming" );
$product->name = "pic";
$product->upload_image();
$book = new Book();
$book->set_publisher([
    "ahmed",
    "amr",
    "yasmeen",
    "reem"
]);
$book->choose_publisher();
?>

<form action="#" method="POST" enctype="multipart/form-data">

    <input type="file" name="image[]" multiple>

    <input type="submit" value="upload">



</form>