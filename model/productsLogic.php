<?php require_once 'DataHandler.php';

class productsLogic
{
    public $DataHandler;

    public function __construct()
    {
        $this->DataHandler = new DataHandler("mysql", "localhost", "multiversum", "root", "");
    }

    public function createContact($code, $supplier_id, $product_name, $product_price, $other_product_details)
    {
        try {
            return $this->DataHandler->CreateData("INSERT INTO products (product_type_code, supplier_id, product_name, product_price, other_product_details) VALUES ('$code','$supplier_id', '$product_name', '$product_price','$other_product_details')");
        } catch (Exeption $e) {
            throw $e;
        }
    }

    public function searchContacts($search)
    {
        $offset = isset($_GET['page']) ? ($_GET['page'] * 5) : 0;

        try {
            return $this->DataHandler->ReadData("SELECT * FROM products WHERE product_name LIKE '%$search%' OR other_product_details LIKE '%$search%' LIMIT 5 OFFSET $offset;");
        } catch (Exeption $e) {
            throw $e;
        }
    }

    public function readProduct($id)
    {
        try {
            return $this->DataHandler->ReadData("SELECT * FROM products WHERE product_id = '$id'");
        } catch (Exeption $e) {
            throw $e;
        }
    }

    public function readProducts()
    {

        $offset = isset($_GET['page']) ? ($_GET['page'] * 5) : 0;

        try {
            return $this->DataHandler->ReadData("SELECT `product_price`,`platform`,`functies`,`color`,`image`,`product_name` FROM products LIMIT 6 OFFSET $offset");
        } catch (Exeption $e) {
            throw $e;
        }
    }

    public function totalRows()
    {
        return (int)$this->DataHandler->ReadData("SELECT count(*) FROM products")[0]["count(*)"];
    }

    public function updateContact($code, $supplier_id, $product_name, $product_price, $other_product_details, $id)
    {
        return $this->DataHandler->updateData("UPDATE products SET `product_type_code` = '$code', `supplier_id` = '$supplier_id', `product_name` = '$product_name', `product_price` = $product_price, `other_product_details` = '$other_product_details' WHERE product_id = '$id'");
    }

    public function deleteContact($id)
    {
        return $this->DataHandler->DeleteData("DELETE FROM products WHERE product_id = $id");
    }

    function pagination($perPage = 5)
    {
        $count = $this->totalRows();
        $pages = ceil($count / $perPage);

        return $pages;
    }

    public function describeProduct()
    {
        return $this->DataHandler->ReadData("DESCRIBE stardunks.products");
    }

    public function createForm($dataProduct = FALSE)
    {
        $form = "<form method='post'>";
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
                $form .= "<input class='form-control' type='$type' max='$number' name='$value[Field]' value='" . ($dataProduct ? $dataProduct[$value['Field']] : "") . "'>";
            }
        }
        $form .= "<input class='btn btn-primary my-3 mr-1' type='submit' name='send'>";
        $form .= "<a href='index.php' class='btn btn-primary'>Terug</a>";
        $form .= "</form>";

        return $form;
    }

    public function printTable($array)
    {
        $table = "<table class='table table-responsive'>";

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

    function printDiv($array, $columnTitle,$image,$productPrice)
    {
        $table = "";
        foreach ($array as $key => $value) {
            $table .= "<div class='col-lg-4 col-md-6 mb-4'>
            <div class='card'>
              <a href='#'><img class='card-img-top' src='$value[$image]' alt=></a>
              <div class=''>
                <h4 class='card-title'>
                  <a href='#'>$value[$columnTitle]</a>
                </h4>";
                foreach ($value as $key => $v) {
                    $table .= "<li class='list-group-item'> <b>" . $key . "</b>" . $v . "</li>";
                }
                $table .= "
                </div>
                <div class='card-footer'>
                  <small class='text-muted'>$value[$productPrice] 
                  </small>
                </div>
              </div>
           </div>";
        }


        
        return $table;
    }
}

?>
