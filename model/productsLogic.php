<?php require_once 'DataHandler.php';

class productsLogic
{
    public $DataHandler;

    /**
     * productsLogic constructor.
     * with the database logins and database name
     */
    public function __construct()
    {
        $this->DataHandler = new DataHandler("mysql", "localhost", "multiversum", "root", "");
    }

    /**
     * a insert sql that makes a new product
     */
    public function createProduct($price, $platform, $resolution, $refresh_rate, $function, $color, $accessoires, $product_name, $detail, $connection, $brand, $EAN)
    {
        try {
            return $this->DataHandler->CreateData("INSERT INTO products (price, platform, resolution, refresh_rate, function, color, accessoires, product_name, detail, connection, brand, EAN)
            VALUES ('$price', '$platform', '$resolution', '$refresh_rate', '$function', '$color', '$accessoires', '$product_name', '$detail', '$connection', '$brand', '$EAN')");
        } catch (Exeption $e) {
            throw $e;
        }
    }


    /**
     * a sql qeury that returns a image path (view/assets/images/example/example.png)
     */
    public function createCarouselImage($id)
    {
        try {
            return $this->DataHandler->ReadData("SELECT image_path FROM products INNER JOIN photos ON `products`.EAN = `photos`.Products_EAN WHERE EAN = '$id'");
        } catch (Exeption $e) {
            throw $e;
        }
    }


    /**
     * a sql qeury for the shopping cart what values it will return to put in the in shopping cart
     */
    public function FindData($id)
    {
        try {
            return $this->DataHandler->ReadData("SELECT EAN , image_path as 'Image', product_name as 'Product' ,price as 'Prijs' FROM products INNER JOIN photos ON `products`.EAN = `photos`.Products_EAN WHERE EAN = '$id'");
        } catch (Exeption $e) {
            throw $e;
        }
    }

    /**
     * sql qeury that puts the values from the checkout form
     */
    public function InsertOrder($firstname, $lastname, $straat, $country, $postcode, $iban, $huisnummer)
    {
        try {
            return $this->DataHandler->CreateData("INSERT INTO `orders`(`firstname`, `lastname`, `straat`, `country`, `postcode`, `iban`, `huisnummer`) 
            VALUES ('$firstname','$lastname','$straat','$country','$postcode','$iban','$huisnummer')");
        } catch (Exeption $e) {
            throw $e;
        }
    }

    /**
     * searches prodcuts and has puts a limit of 6 prodcuts and a offset that is given with a variable
     */
    public function searchProducts($search)
    {
        $offset = isset($_GET['page']) ? ($_GET['page'] * 6) : 0;

        try {
            return $this->DataHandler->ReadData("SELECT * FROM products INNER JOIN photos ON `products`.EAN = `photos`.Products_EAN WHERE product_name LIKE '%$search%' OR detail LIKE '%$search%' GROUP BY `photos`.Products_EAN LIMIT 5 OFFSET $offset;");
        } catch (Exeption $e) {
            throw $e;
        }
    }

    /**
     * returns a sql qeury of a select from one product and as variable you  give a id which is the EAN
     */
    public function readProduct($id)
    {
        try {
            return $this->DataHandler->ReadData("SELECT platform,resolution,refresh_rate,function,color,accessoires,EAN,connection,brand,detail,price,product_name FROM products WHERE EAN = '$id'");
        } catch (Exeption $e) {
            throw $e;
        }
    }

    /*
     * sql qeury that prints all the products with a limit on it of 6 and a offset
     * */
    public function readProducts()
    {

        $offset = isset($_GET['page']) ? ($_GET['page'] * 5) : 0;

        try {
            return $this->DataHandler->ReadData("SELECT * FROM `products` INNER JOIN photos ON `products`.EAN = `photos`.Products_EAN GROUP BY `photos`.Products_EAN LIMIT 6 OFFSET $offset");
        } catch (Exeption $e) {
            throw $e;
        }
    }

    /**
     * returns the image path for the images   (view/assets/images/example/example.png)
     */
    public function readProductsHome()
    {

        try {
            return $this->DataHandler->ReadData("SELECT * FROM `products` INNER JOIN photos ON `products`.EAN = `photos`.Products_EAN GROUP BY `photos`.Products_EAN LIMIT 6 ");
        } catch (Exeption $e) {
            throw $e;
        }
    }


    /**
     * return a sql qeury with all the products with less columns
     */
    public function readAdminProducts()
    {

        $offset = isset($_GET['page']) ? ($_GET['page'] * 5) : 0;

        try {
            return $this->DataHandler->ReadData("SELECT image_path,EAN,price,platform,product_name,color,brand FROM `products` INNER JOIN `photos`  LIMIT 5 OFFSET $offset");
        } catch (Exeption $e) {
            throw $e;
        }
    }


    /**
     * sql qeury that counts up total rows
     */
    public function totalRows()
    {
        return (int)$this->DataHandler->ReadData("SELECT count(*) FROM products")[0]["count(*)"];
    }


    /**
     * sql qeury that updates a product
     */
    public function updateProduct($price, $platform, $resolution, $refresh_rate, $function, $color, $accessoires, $product_name, $detail, $connection, $brand, $EAN)
    {
        return $this->DataHandler->updateData("UPDATE products SET `price` = '$price'
            ,`platform` = '$platform',`resolution` = '$resolution',`refresh_rate` = '$refresh_rate',`function` = '$function',`color` = '$color',`accessoires` = '$accessoires',`product_name` = '$product_name',`detail` = '$detail'
            ,`connection` = '$connection',`brand` = '$brand' WHERE `EAN` = '$EAN'");
    }


    /**
     * a sql qeury that deletes a products on a given id variable which is the EAN
     */
    public function deleteProduct($id)
    {
        return $this->DataHandler->DeleteData("DELETE FROM products WHERE `EAN` = '$id'");
    }

    /**
     * functnion returns how many pages
     */
    function pagination($perPage = 6)
    {
        $count = $this->totalRows();
        $pages = ceil($count / $perPage);

        return $pages;
    }

    /**
     * returns the description for each column from the table products and returns them
     */
    public function describeProduct()
    {
        return $this->DataHandler->ReadData("DESCRIBE multiversum.products");
    }


    /**
     * Creates a form based with the input types based on what describeProduct() returns and then returns the form
     */
    public function createForm($dataProduct = FALSE)
    {
        $form = "
        <div class='my-5 container col-md-4'>
        <form enctype='multipart/form-data' method='post'>";
        $data = $this->describeProduct();
        foreach ($data as $key => $value) {
            if ($value['Extra'] != "auto_increment") {

                $a = preg_split("/\W+/", $value['Type']);
                $number = "";
                $type = "text";

                switch ($a[0]) {
                    case "int":
                    case "float":
                    case "double":
                    case "decimal":
                        $type = "number";
                        if (isset($a[1])) {
                            $number = $a[1];
                        }
                        break;
                    default:
                        if (isset($a[1])) {
                            $number = $a[1];
                        }
                        $type = "text";
                }

                $form .= "<label class='form-control-label'>" . ucfirst(str_replace("_", " ", $value['Field'])) . "</label>";
                $form .= "<input class='form-control col-lg-12' type='text' name='$value[Field]' value='" . ($dataProduct ? $dataProduct[$value['Field']] : "") . "'>";
            }
        }
        $form .= "<label class='form-control-label col-md-12'>Selecteer uw foto:</label>";
        $form .= "<input class='form-control-input col-md-12' type='file' name='upload' id='upload'>";

        $form .= "<input class='btn btn-primary my-3 mr-1' type='submit' name='send'>";
        $form .= "<a href='index.php?op=admin' class='btn btn-primary'>Terug</a>";
        $form .= "</form></div>";

        return $form;
    }

    /**
     * a funtions thats makes a table and returns the table
     */
    public function printTable($array)
    {
        $table = "<table class='table'>";

        foreach ($array as $key => $value) {
            $table .= "<thead class='thead-inverse'><tr>";

            foreach ($value as $k => $v) {
                $table .= "<th>" . $k . "</th>";
            }
            break;
        }
        foreach ($array as $k => $v) {
            $table .= "<tr>";
            foreach ($v as $key => $value) {
                $table .= "<td>" . $value . "</td>";
            }
        }
        $table .= "</table>";
        return $table;
    }


    /**
     * a funtions thats makes a cart table and returns the table
     */
   public function printCart($array)
   {

    $table="";

       foreach ($array as $key => $value) {
       $table.= "<table class='table' >";
           
           $table .= "<td><img src='$value[Image]' height='50'></td>
           <td>$value[Product]</td>
           <td> €  " . $value['Prijs'] * $value['Aantal']  . " </td>
           <td><input type='number' style='width: 40px' value='$value[Aantal]'></td>
           <td><a class='btn btn-danger' href='index.php?op=deleteCart&id=$value[EAN]'><i class='fas fa-trash-alt'></i> Delete</a></td>";
       $table .= "</table>";
       }

       return $table;
   }

    /**
     * a funtions thats makes a table and returns the table
     */
    public function printDetailTable($array)
    {
        $table = "<table class='table table-responsive'>";

        foreach ($array as $k => $v) {
            foreach ($v as $key => $value) {
                $table .= "<tr>";
                $table .= "<th>" . $key . "</th>";
                $table .= "<td>" . $value . "</td>";
                $table .= "<tr>";
            }

        }
        $table .= "</table>";
        return $table;
    }

    /**
     * a funtions thats makes the product page with the prodcuts specfication and images
     */
    public function printDiv($array)
    {

        $table = "";
        foreach ($array as $key => $value) {


            $table .= "<div class='col-lg-4 col-md-6 mb-4 d-flex'>
                        <div class='card mb-3 d-flex '>
                        <a href='index.php?op=read&id=$value[EAN]'><img class='card-img'  src='$value[image_path]' alt='Card image'></a>
                        <div class='card-body'>
                            <a href='index.php?op=read&id=$value[EAN]' class='card-title'>$value[product_name]</a>
                            <p class='card-text'>" . substr($value['detail'], 0, 90) . "..." .
                "</p>
                            <h5 class='card-title'>€ " . str_replace(".", ",", $value["price"]) . "</h5>
                        </div>
                        <div class='card-footer'>
                        <p class='card-text'>
                            <small>
                            <a href='index.php?op=addToCart&id=$value[EAN]' type='button' class='btn MoonYellow text-white'>Kopen</a>
                            <a type='button' href='index.php?op=read&id=$value[EAN]' class='btn text-white LightSeaGreen'>Lees meer</a>
                            </small></p>
                        </div>
                        </div>
                    </div>


              ";
        }


        return $table;
    }


    /**
     * Creates a carousel and returns it
     */
    function createCarousel($array)
    {
        $detail = "";
        $detail .= "<div class='col-md-12'>

                    <div id='carouselExampleIndicators' class='carousel slide' data-ride='carousel'>
                    <ol class='carousel-indicators'>";
        foreach ($array as $key => $value) {
            $detail .= "<li data-target='#carouselExampleIndicators' data-slide-to=$key></li>";
        }
        $detail .= "</ol>";
        $detail .= "<div class='carousel-inner' role='listbox'>";

        foreach ($array as $key => $value) {
            $detail .= "<div   class='carousel-item " . ($key == 0 ? 'active' : '') . "' style='background-image: url($value[image_path])'>
                            <img src='$value[image_path]'  class='d-block w-100 h-auto' alt=''>
                        </div>";
        }

        $detail .= "</div>
                    <a class='carousel-control-prev text-black' href='#carouselExampleIndicators' role='button' data-slide='prev'>
                        <span class='carousel-control-prev-icon  ' aria-hidden='true'></span>
                        <span class='sr-only '>Previous</span>
                    </a>
                    <a class='carousel-control-next' href='#carouselExampleIndicators' role='button' data-slide='next'>
                         <span class='carousel-control-next-icon' aria-hidden='true'></span>
                         <span class='sr-only'>Next</span>
                     </a>
                     </div></div>
                     <div class='card-footer'>
                     <form method='post' action='index.php?op=addToCart'>
                        <span class='float-left mr-1'>aantal</span><input class='float-left' name='amount' id='amount' type='number' >
                        <input name='id' type='hidden' value='$_GET[id]'>
                         <button href='index.php?op=addToCart&id=$_GET[id]' class='float-right LightSeaGreen btn btn-success'>Winkelwagen</button>
                    </form>


                     </div>
                     ";

        return $detail;
    }
}


?>
