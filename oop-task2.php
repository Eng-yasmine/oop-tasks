<?php


//parent class Product



class Product
{
    public $name;
    public $price;
    public $description;
    public $image;

    public function upload_image()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->name;
            if (isset($_FILES['image'])  && is_array($_FILES['image']['name'])) {
                /*  echo "<pre>" ;
        var_dump($_FILES); 
 */
                foreach ($_FILES['image']['name'] as $key => $value) {
                    // var_dump($_FILES['image']['name'][$key]);
                    $tmp = $_FILES['image']['tmp_name'][$key];
                    // var_dump($tmp);
                    $imgname = $_FILES['image']['name'][$key];
                    if (move_uploaded_file($tmp, "images/" . $imgname)) {
                        echo " uploaded success";
                    } else {
                        echo "uploaded failed";
                    }
                }
            }
        }
    }
}


// child class Book
class Book extends Product
{
    private array $puplishers;
    private $writer;
    public $color;
    public $supplier;

    public function choose_publisher() {}

    public function set_publisher($publishers) {}

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

$product = new Product();
$product->name = "pic";
$product->upload_image();
?>

<form action="#" method="POST" enctype="multipart/form-data">

    <input type="file" name="image[]" multiple>

    <input type="submit" value="upload">



</form>