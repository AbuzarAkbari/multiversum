<?php
require './model/productsLogic.php';

class ContactsController
{

    public function __construct()
    {
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
                case "read";
                    $this->collectReadContact();
                    break;
                case "update";
                    $this->collectUpdateContact();
                    break;
                case "search";
                    $this->collectSearchContact();
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
            $create = $this->productsLogic->createContact($_POST['product_type_code'], $_POST['supplier_id'], $_POST['product_name'], $_POST['product_price'], $_POST['other_product_details']);
            $this->collectReadContact($create);
        } else {
            $form = $this->productsLogic->createForm();
            include 'view/form.php';
        }
    }

    public function collectSearchContact()
    {
        $search = $this->productsLogic->searchContacts($_REQUEST['w']);
        $btn = $this->btnInArray($search);
        $result = $this->productsLogic->printTable($btn);
        $pages = $this->productsLogic->pagination();
        include 'view/home.php';
    }

    public function collectReadContact()
    {
        if (isset($_GET['id'])) {
            $product = $this->productsLogic->readProduct($_GET['id']);
            $btn = $this->btnInArray($product);
            $a = $this->replace($btn);
            $result = $this->productsLogic->printTable($a);
            include 'view/details.php';
        } else {
            $this->collectReadProducts();
        }
    }

    public function collectReadHome()
    {
        $contacts = $this->productsLogic->readProducts();
        $btn = $this->btnInArray($contacts);
        $a = $this->replace($btn);
//        var_dump($a);
//        $result = $this->productsLogic->printTable($a);
        $result = $this->productsLogic->printTable($a);
        $pages = $this->productsLogic->pagination();
        include 'view/home.php';

    }

    public function collectUpdateContact()
    {
        if (isset($_POST['send'])) {
            $this->productsLogic->updateContact($_POST['product_type_code'], $_POST['supplier_id'], $_POST['product_name'], $_POST['product_price'], $_POST['other_product_details'], $_GET['id']);
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
//        var_dump($a);
//        $result = $this->productsLogic->printTable($a);
        $result = $this->productsLogic->printDiv($products,"product_name","image","product_price");
        $pages = $this->productsLogic->pagination();
        include "view/products.php";
    }
    public function collectContact(){
        
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
            $array[$key]["product_price"] = "€ " . str_replace(".", ",", $value['product_price']);
        }
        return $array;
    }
}

?>
