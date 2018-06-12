<?php
require './model/productsLogic.php';

class ContactsController{

    public function __construct(){
        $this->productsLogic = new productsLogic();
    }

    public function __destruct()
    {
    }

    public function handleRequest()
    {
        $op = isset($_GET["op"]) ? $_GET["op"] : "";
        try {
            switch ($op) {
                case "create";
                    $this->collectCreateContact();
                    break;
                case "shop";
                    $this->shopping();
                    break;
                case "read";
                    $this->collectImage();
                    break;
                case "update";
                    $this->collectUpdateContact();
                    break;
                case "search";
                    $this->collectSearchProducts();
                    break;
                case "delete";
                    $this->collectDeleteContact();
                    break;
                case "allProducts" :
                    $this->collectAllProducts();
                    break;
                case "contact" :
                    $this->collectContact();
                    break;
                case "admin" :
                    $this->collectAdmin();
                    break;
                default:
                    $this->collectReadHome();
                    break;
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function collectCreateContact()
    {
        if (isset($_POST['send'])) {
            $create = $this->productsLogic->createContact($_POST['product_type_code'], $_POST['supplier_id'], $_POST['product_name'], $_POST['price'], $_POST['other_product_details']);
            $this->collectReadContact($create);
        } else {
            $form = $this->productsLogic->createForm();
            include 'view/form.php';
        }
    }

    public function collectSearchProducts(){
        $search = $this->productsLogic->searchProducts($_REQUEST['w']);
        $result = $this->productsLogic->printDiv($search);
        
        include 'view/products.php';
    }

    public function shopping()
    {
        include 'view/shopping.php';
    }

    public function collectReadHome()
    {
        include 'view/home.php';

    }

    public function collectImage()
    {
        $products = $this->productsLogic->createCarouselImage($_GET['id']);
        $result = $this->productsLogic->createCarousel($products);
        $product = $this->productsLogic->readProduct($_GET['id']);
        $table = $this->productsLogic->printDetailTable($product);
        // echo"<pre>";
        // var_dump($this->productsLogic->createCarouselImage());
        // echo "</pre>";
        // var_dump($products);

        include 'view/details.php';

    }


    public function collectUpdateContact()
    {
        if (isset($_POST['send'])) {
            $this->productsLogic->updateContact($_POST['product_type_code'], $_POST['supplier_id'], $_POST['product_name'], $_POST['price'], $_POST['other_product_details'], $_GET['id']);
            $this->collectReadContact($_GET['id']);
        } else {
            $dataProduct = $this->productsLogic->readProduct($_GET['id'])[0];
            $form = $this->productsLogic->createForm($dataProduct);
            include 'view/form.php';
        }
    }

    public function collectDeleteContact()
    {
        $delete = $this->productsLogic->deleteContact($_GET['id']);
        $this->collectReadProducts();
    }

    public function collectAllProducts()
    {
        $products = $this->productsLogic->readProducts();
        // echo"<pre>";
        // var_dump($products);
        // echo"</pre>";

//        var_dump($a);
//        $result = $this->productsLogic->printTable($a);
        $result = $this->productsLogic->printDiv($products,"product_name","image_path","price");

        // echo "<pre>";
        // var_dump($products);
        // echo "</pre>"; 
        $pages = $this->productsLogic->pagination();
        include "view/products.php";
    }

    public function collectContact(){
        include "view/contact.php";
    }
    public function collectAdmin(){
        include "view/admin.php";
    }

//<a class='btn btn-primary' href='index.php?op=read&id=$value[product_id]' ><i class='fas fa-book'></i> Read</a>

    function btnInArray($array)
    {
        foreach ($array as $key => $value) {
            $array[$key]["Action"] =
                "<div class=\"btn btn-primary mb-2\" onclick=\"document.getElementById('content').innerHTML = loadPage('index.php?op=read&id=');\"><i class='fas fa-book'></i> read</div>
                 <div class=\"btn btn-success mb-2\" onclick=\"document.getElementById('content').innerHTML = loadPage('index.php?op=update&id=');\"><i class='fas fa-edit'></i> Update</div>
                 <a class='btn btn-danger' href='index.php?op=delete&id='><i class='fas fa-trash-alt'></i> Delete</a>";
        }
        return $array;
    }

    public function replace($array)
    {
        foreach ($array as $key => $value) {
            $array[$key]["price"] = "€ " . str_replace(".", ",", $value['price']);
        }
        return $array;
    }
}

?>
