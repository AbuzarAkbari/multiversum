<?php
require_once 'model/productsLogic.php';
require_once 'model/HtmlElements.php';

class productsController {

    public $productslogic;
    public $HtmlElements;

    public function __construct(){
        $this->productslogic = new productslogic();
        $this->HtmlElements = new HtmlElements();
    }
    public function __destruct() {

    }

    public function handleRequest() {
        try {
            switch (isset($_GET['op']) ? $_GET['op'] : "") {
                case 'create':
                    $this->collectCreateProduct();
                    break;
                case 'update':
                    $this->collectUpdateProduct();
                    break;
                case 'search':
                    $this->collectSearchProducts();
                    break;
                case 'delete':
                    $this->collectDeleteProduct();
                    break;
                case 'read':
                    $this->collectReadProduct();
                    break;
                default:
                    $this->collectReadProducts();
            }
        } catch (Exception $e){
            throw $e;
        }
    }    
    
    public function addActionButtons($array){
        foreach ($array as $key => $value) {
            $array[$key]["Action"] =
                "<div class=\"btn btn-primary mb-2\" onclick=\"document.getElementById('content').innerHTML = loadPage('index.php?op=read&id=$value[product_id]');\"><i class='fa fa-book'></i> Read</div>
                <div class=\"btn btn-info mb-2\" onclick=\"document.getElementById('content').innerHTML = loadPage('index.php?op=delete&id=$value[product_id]');\"><i class='fa fa-pencil'></i> Delete</div>
                <div class=\"btn btn-danger mb-2\" onclick=\"document.getElementById('content').innerHTML = loadPage('index.php?op=update&id=$value[product_id]');\"><i class='fa fa-times'></i> Update</div>"
                ;
        }

        return $array;
    }

    // public function addCheckBoxes($array){
    //     foreach ($array as $key => $value) {
    //         $array[$key]["<input type='checkbox' name='' value='index.php?op=read&id=$value[product_id]'>"] =
    //             "<input type='checkbox' name='' value='index.php?op=read&id=$value[product_id]'>";
    //     }
  
    //     return $array;
    // }

    public function Replace($array){
        foreach ($array as $key => $value) {
            $array[$key]["product_price"] = "€ " . str_replace("." , "," , $value['product_price']);
        }
        return $array;
    }
    
    public function createTable($array){
        $table = "";

        $table = "<table class='table table-striped' ";

        foreach ($array as $key => $value) {
            $table .= "<thead class='thead-dark'><tr>";
            foreach ($value as $k => $v) {
                $table .= "<th class='text-center'>" . $k . "</th>";
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

    public function createGrid($array, $columnTitle,$productPrice,$image){
        $table = "";


        foreach($array as $k => $v) {

            $table .= "
        <div class='col-lg-4 col-md-6 mb-4'>
            <div class='card'>
              <a href='#'><img class='card-img-top' src='$v[$image]' alt=></a>
              <div class='card-body'>
                <h4 class='card-title'>
                  <a href='#'>$v[$columnTitle]</a>
                </h4>";

                foreach ($v as $key => $value) {
                    $table .= "<li class='list-group-item'> <b>" . $key . "</b>" . $value . "</li>";
                }
            $table .= "
              </div>
              <div class='card-footer'>
                <small class='text-muted'>$v[$productPrice]</small>
              </div>
            </div>
         </div>";


        }

    return $table;
    }

    public function Pagination(){
        $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;

        $perPage = isset($_GET["per-page"]) && $_GET["per-page"] <=5 ? (int)$_GET["per-page"] : 5;

        $start = ($page > 1) ? ($page * $perPage) - $perPage : 0;  
        
        switch (isset($_GET['op'])) {
            case 'search':
                $total = $this->productslogic->searchTotal($_GET['q']);
                $product = $this->productslogic->searchProducts($_GET['q'],$start,$perPage);
            break;
            case 'delete':
            default:    
                $total = $this->productslogic->total();
                $product = $this->productslogic->readProducts($perPage,$start);
            break;
        }

        $pages = ceil($total / $perPage);

        $product = $this->Replace($product);  
        
        $buttons = $this->addActionButtons($product);
            
        // $checkboxes = $this->addCheckBoxes($buttons);

        $table = $this->createGrid($product,"product_name","product_price","image");
        // $table = $this->createTable($buttons);  
        
        include 'view/home.php';
    }    

    public function collectCreateProduct(){
        
        if(isset($_POST["send"])) {    
            $id = $this->productslogic->createProduct($_POST["product_type_code"],$_POST["supplier_id"],$_POST["product_name"],$_POST["product_price"],$_POST["other_product_details"] );
            header("Location: /stardunks/index.php?op=read&id=$id");
        }else{
            $form = $this->HtmlElements->createForm($this->productslogic->DescribeProducts());
            include ("view/form.php");
        }
    }
    
    public function collectReadProduct(){
        $product = $this->productslogic->readProduct($_GET["id"]);
        $product = $this->Replace($product);
        $products = $this->addActionButtons($product);
        $table = $this->createTable($products);

        include 'view/products.php';    
    }

    public function collectReadProducts(){
        $this->pagination();            
    }

    public function collectUpdateProduct(){
        if(isset($_POST["send"])) {            
            $this->productslogic->updateProduct($_POST["product_type_code"],$_POST["supplier_id"],$_POST["product_name"],$_POST["product_price"],$_POST["other_product_details"],$_GET["id"]);
            $this->collectReadProduct();
        }else{
            $dataForm = $this->productslogic->readProduct($_GET["id"]);
            $form = $this->HtmlElements->createForm($this->productslogic->DescribeProducts(),$dataForm);
            include ("view/form.php");
        }
        
        
    }
    public function collectDeleteProduct(){
        $product = $this->productslogic->deleteProduct($_GET["id"]);
        $this->collectReadProducts();
    }

    public function collectSearchProducts(){
        $this->Pagination();
    }
    

}




?>