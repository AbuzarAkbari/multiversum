<?php
require_once 'DataHandler.php';

class productslogic {

    public function __construct() {
        $this->DataHandler = new DataHandler("localhost","stardunks","root","");
    }

    public function __destruct() {

    }

    public function createProduct($type_code,$supplier,$name,$price,$details) {
        return $this->DataHandler->CreateData("INSERT INTO products(`product_type_code`,`supplier_id`,`product_name`,`product_price`,`other_product_details`)
        VALUES ('$type_code','$supplier','$name','$price','$details')");

    }

    public function readProduct($id) {
        return $this->DataHandler->ReadData("SELECT * FROM products WHERE product_id=$id");
    }

    public function readproducts($perPage,$start) {
        return $this->DataHandler->ReadData("SELECT  * FROM products LIMIT $start,$perPage");
    }

    public function total() {
        return $this->DataHandler->ReadData("SELECT COUNT(product_id) FROM products")[0]["COUNT(product_id)"];
    }

    public function searchTotal($value) {
        return $this->DataHandler->ReadData("SELECT COUNT(product_id) FROM products WHERE product_name LIKE '%$value%'")[0]["COUNT(product_id)"];
    }

    public function searchProducts($value,$start,$perPage) {
        return $this->DataHandler->ReadData("SELECT * FROM products WHERE product_name LIKE '%$value%' LIMIT $start,$perPage");
    }

    public function updateProduct($type_code,$supplier,$name,$price,$details,$id) {
        return $this->DataHandler->UpdateData("UPDATE products SET `product_type_code`='$type_code', `supplier_id`='$supplier',`product_name`='$name',`product_price`='$price',`other_product_details`='$details' WHERE `product_id`=$id");
    }

    public function deleteProduct($id) {
        return $this->DataHandler->DeleteData("DELETE FROM products WHERE product_id=$id");
    }

    public function DescribeProducts() {
        return $this->DataHandler->ReadData("DESCRIBE stardunks.products");
    }

    public function createForm($dataForm = false) {
        $form = "<form method='post'>";
        $data = $this->DescribeProducts();
        // echo "<pre>";
        // var_dump($data);
        // echo "</pre>";
        foreach ($data as $key => $value) {
            if ($value['Extra'] != "auto_increment") {

                $a = preg_split("/\W+/", $value['Type']);
                $number = "";
                $type = "text";

                switch ($a[0]) {
                    case "int":
                    case "float":
                    case "double":
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
                $form .= "<input class='form-control' value='". ($dataForm ? $dataForm[0][$value['Field']] : " ") ."' type='$type' max='$number' name='$value[Field]' id='$value[Field]'>";
            }
        }
        $form .= "<input class='btn btn-primary mt-3' type='submit' name='send'>";
        $form .= "</form>";

        return $form;

    }

}
?>
