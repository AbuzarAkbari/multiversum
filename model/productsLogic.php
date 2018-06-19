<?php require_once 'DataHandler.php';

class productsLogic
{
    public $DataHandler;

    public function __construct()
    {
        $this->DataHandler = new DataHandler("mysql", "localhost", "multiversum", "root", "");
    }

    public function createContact($code, $supplier_id, $product_name, $price, $other_product_details)
    {
        try {
            return $this->DataHandler->CreateData("INSERT INTO products (product_type_code, supplier_id, product_name, price, other_product_details) VALUES ('$code','$supplier_id', '$product_name', '$price','$other_product_details')");
        } catch (Exeption $e) {
            throw $e;
        }
    }

    public function createCarouselImage($id)
    {
        try {
            return $this->DataHandler->ReadData("SELECT image_path FROM products INNER JOIN photos ON `products`.EAN = `photos`.Products_EAN WHERE EAN = '$id'");
        } catch (Exeption $e) {
            throw $e;
        }
    }

    public function searchProducts($search)
    {
        $offset = isset($_GET['page']) ? ($_GET['page'] * 5) : 0;

        try {
            return $this->DataHandler->ReadData("SELECT * FROM products INNER JOIN photos ON `products`.EAN = `photos`.Products_EAN WHERE product_name LIKE '%$search%' OR detail LIKE '%$search%' GROUP BY `photos`.Products_EAN LIMIT 5 OFFSET $offset;");
        } catch (Exeption $e) {
            throw $e;
        }
    }

    public function readProduct($id)
    {
        try {
            return $this->DataHandler->ReadData("SELECT platform,resolution,refresh_rate,function,color,accessoires,EAN,connection,brand,detail,price,product_name FROM products WHERE EAN = '$id'");
        } catch (Exeption $e) {
            throw $e;
        }
    }
/**/
    public function readProducts()
    {

        $offset = isset($_GET['page']) ? ($_GET['page'] * 5) : 0;

        try {
            return $this->DataHandler->ReadData("SELECT * FROM `products` INNER JOIN photos ON `products`.EAN = `photos`.Products_EAN GROUP BY `photos`.Products_EAN LIMIT 6 OFFSET $offset");
        } catch (Exeption $e) {
            throw $e;
        }
    }

    public function readProductsHome()
    {

        try {
            return $this->DataHandler->ReadData("SELECT * FROM `products` INNER JOIN photos ON `products`.EAN = `photos`.Products_EAN GROUP BY `photos`.Products_EAN LIMIT 6 ");
        } catch (Exeption $e) {
            throw $e;
        }
    }

    public function readAdminProducts() {

        $offset = isset($_GET['page']) ? ($_GET['page'] * 5) : 0;

        try {
            return $this->DataHandler->ReadData("SELECT EAN,price,platform,product_name,color,brand FROM `products` LIMIT 5 OFFSET $offset");
        } catch (Exeption $e) {
            throw $e;
        }
    }

    // function readAdminProducts(){
    //   try {
    //
    //       $data = $this->DataHandler->ReadData("SELECT price,resolution,refresh_rate,color,brand FROM products LIMIT 5");
    //
    //       foreach ($data as $key => $value) {
    //           $data[$key]['price'] ="€ ".str_replace( ".", ",", $data[$key]['price']);
    //   }
    //       return $data;
    //
    //   } catch (Exception $e){
    //     throw $e;
    //   }
    // }
    public function totalRows()
    {
        return (int)$this->DataHandler->ReadData("SELECT count(*) FROM products")[0]["count(*)"];
    }

    public function updateContact($code, $supplier_id, $product_name, $price, $other_product_details, $id)
    {
        return $this->DataHandler->updateData("UPDATE products SET `product_type_code` = '$code', `supplier_id` = '$supplier_id', `product_name` = '$product_name', `price` = $price, `other_product_details` = '$other_product_details' WHERE EAN = '$id'");
    }

    public function deleteContact($id)
    {
        return $this->DataHandler->DeleteData("DELETE FROM products WHERE EAN = $id");
    }

    function pagination($perPage = 6)
    {
        $count = $this->totalRows();
        $pages = ceil($count / $perPage);

        return $pages;
    }

    public function describeProduct()
    {
        return $this->DataHandler->ReadData("DESCRIBE multiversum.products");
    }

    public function createForm($dataProduct = FALSE)
    {
        $form = "
        <div class='my-5 container col-md-4'>
        <form method='post'>";
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
                $form .= "<input class='form-control col-lg-12' type='$type' name='$value[Field]' value='" . ($dataProduct ? $dataProduct[$value['Field']] : "") . "'>";
            }
        }
        $form .= "<input class='btn btn-primary my-3 mr-1' type='submit' name='send'>";
        $form .= "<a href='index.php?op=admin' class='btn btn-primary'>Terug</a>";
        $form .= "</form></div>";

        return $form;
    }

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

    public function printDetailTable($array){
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

    public function printDiv($array)
    {

        $table="";
        foreach ($array as $key => $value) {


            $table .= "<div class='col-lg-4 col-md-6 mb-4 d-flex'>
                        <div class='card mb-3 d-flex '>
                        <a href='index.php?op=read&id=$value[EAN]'><img class='card-img'  src='$value[image_path]' alt='Card image'></a>
                        <div class='card-body'>
                            <a href='index.php?op=read&id=$value[EAN]' class='card-title'>$value[product_name]</a>
                            <p class='card-text'>". substr($value['detail'],0,90). "..." .
                            "</p>
                            <h5 class='card-title'>€ ". str_replace(".", ",", $value["price"]) ."</h5>
                        </div>
                        <div class='card-footer'>
                        <p class='card-text'>
                            <small>
                            <a type='button' class='btn MoonYellow'>Kopen</a>
                            <a type='button' href='index.php?op=read&id=$value[EAN]' class='btn text-dark LightSeaGreen'>Lees meer</a>
                            </small></p>
                        </div>
                        </div>
                    </div>


              ";
        }

        // Dit moet na index.php?op=read&id= $value[EAN]'


        return $table;
    }

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
                        <span class='carousel-control-prev-icon bg-secondary ' aria-hidden='true'></span>
                        <span class='sr-only '>Previous</span>
                    </a>
                    <a class='carousel-control-next' href='#carouselExampleIndicators' role='button' data-slide='next'>
                         <span class='carousel-control-next-icon bg-secondary' aria-hidden='true'></span>
                         <span class='sr-only'>Next</span>
                     </a>
                     </div></div>

                     <div class='card-footer'>
                        <a   href=\"#\" class=\"btn btn-success\">Winkelwagen</a>
                        <input class='float-right' type='number' value='' size='4'>
                     </div>
                     ";

        return $detail;
    }
}




?>
