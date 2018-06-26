<?php
require './model/productsLogic.php';
require './model/ShoppingCartLogic.php';

class ContactsController
{

    public function __construct()
    {
        $this->productsLogic = new productsLogic();
        $this->cartLogic = new ShoppingCartLogic();
    }

    /**
     * retrieves a operation in the url and binds a function to it
     */
    public function handleRequest()
    {
        $op = isset($_GET["op"]) ? $_GET["op"] : "";
        try {
            switch ($op) {
                case "create";
                    $this->collectCreateProduct();
                    break;
                case "shop";
                    $this->shopping();
                    break;
                case "paying";
                    $this->paying();
                    break;
                case "read";
                    $this->collectImage();
                    break;
                case "update";
                    $this->collectUpdateProduct();
                    break;
                case "contact":
                    $this->collectContact();
                    break;
                case "search";
                    $this->collectSearchProducts();
                    break;
                case "delete";
                    $this->collectDeleteProduct();
                    break;
                case "allProducts" :
                    $this->collectAllProducts();
                    break;
                case "admin" :
                    $this->collectAdmin();
                    break;
                case "addToCart" :
                    $this->collectAddToCart();
                    break;
                case "deleteCart" :
                    $this->deleteCart();
                    break;
                case "cart" :
                    $this->collectCart();
                    break;
                case "order" :
                    $this->collectOrder();
                    break;
                default:
                    $this->collectReadHome();
                    break;
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * collects value from the form and puts it in InsertOrders function
     */
    public function collectOrder()
    {
        if (isset($_POST["send"])) {
            $order = $this->productsLogic->InsertOrder($_POST["firstname"], $_POST["lastname"], $_POST["straat"], $_POST["country"], $_POST["postcode"], $_POST["iban"], $_POST["huisnummer"]);

            echo "<div class='alert mt-3 alert-success alert-dismissible fade show'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <strong>Success!</strong> betalling is gelukt
          </div>";

            $this->collectReadHome();

        } else {
            echo "Error something went wrong";
        }
    }

    /**
     * collects values from a form and puts them in the createProdcut function
     */
    public function collectCreateProduct()
    {
        if (isset($_POST['send'])) {
            $create = $this->productsLogic->createProduct($_POST['price'], $_POST['platform'], $_POST['resolution'], $_POST['refresh_rate'], $_POST['function'], $_POST['color'], $_POST['accessoires'], $_POST['product_name']
                , $_POST['detail'], $_POST['connection'], $_POST['brand'], $_POST['EAN'], $_POST['image_path']);

            $host = $_SERVER['HTTP_HOST'];
            $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $extra = 'index.php?op=admin';
            header("Location: http://$host$uri/$extra");

        } else {
            $form = $this->productsLogic->createForm();
            include 'view/form.php';
        }
    }

    /**
     * prints a table with products in a cart
     */
    public function collectCart()
    {
        $products = $this->cartLogic->readCart();


        $table = $this->productsLogic->printCart($products);
//
        include "view/shopping.php";
    }

    /**
     * deletes a products in a cart
     */
    public function deleteCart()
    {
        $products = $this->cartLogic->deleteProductInCart($_REQUEST["id"]);
//
        $this->collectCart();
    }

    /**
     * adds prodcuts in teh cart
     */
    public function collectAddToCart()
    {
        $this->cartLogic->addProductToCart($_REQUEST["id"], isset($_REQUEST["amount"]) ? $_REQUEST["amount"] : 1);
        // $table = $this->productsLogic->printTable($products);     
        $this->collectCart();
    }


    /**
     * search products prints in a div
     */
    public function collectSearchProducts()
    {
        $search = $this->productsLogic->searchProducts($_REQUEST['w']);
        $result = $this->productsLogic->printDiv($search);


        include 'view/products.php';
    }

    /**
     *  brings you to the checkout form
     */
    public function paying()
    {
        $products = $this->cartLogic->readCart();

        $table = $this->productsLogic->printTable($products);
//
        include 'view/paying.php';
    }

    /**
     * an include
     */
    public function shopping()
    {
        include 'view/shopping.php';
    }


    /**
     * prints a table with buttons for admin functions
     */
    public function collectAdmin()
    {
        $array = $this->productsLogic->readAdminProducts();
        $a = $this->replace($array);
        $b = $this->btnInArray($a);
        $table = $this->productsLogic->printTable($b);
        $pages = $this->productsLogic->pagination();

        include "view/admin.php";
    }


    /**
     * prodives the home page
     */
    public function collectReadHome()
    {

        $product = $this->productsLogic->readProductsHome();

        $item = $this->productsLogic->printDiv($product);

        include 'view/home.php';
    }

    /**
     * collects the images for a products and prints them in a table
     */
    public function collectImage()
    {
        $products = $this->productsLogic->createCarouselImage($_GET['id']);
        $result = $this->productsLogic->createCarousel($products);
        $product = $this->productsLogic->readProduct($_GET['id']);
        $table = $this->productsLogic->printDetailTable($product);

        include 'view/details.php';

    }

    /**
     * updates a products and returns you to the admin page
     */
    public function collectUpdateProduct()
    {
        if (isset($_POST['send'])) {
            $this->productsLogic->updateProduct($_POST['price'], $_POST['platform'], $_POST['resolution'], $_POST['refresh_rate'], $_POST['function'], $_POST['color'], $_POST['accessoires'], $_POST['product_name']
                , $_POST['detail'], $_POST['connection'], $_POST['brand'], $_GET['id']);
            $host = $_SERVER['HTTP_HOST'];
            $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $extra = 'index.php?op=admin';
            header("Location: http://$host$uri/$extra");
        } else {
            $dataProduct = $this->productsLogic->readProduct($_GET['id'])[0];
            $form = $this->productsLogic->createForm($dataProduct);
            include 'view/form.php';
        }
    }

    /**
     * deletes a product and brings you back to the admin page
     */
    public function collectDeleteProduct()
    {
        $delete = $this->productsLogic->deleteProduct($_GET['id']);
        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = 'index.php?op=admin';
        header("Location: http://$host$uri/$extra");
    }

    /**
     * handles all the products and prints them in a div
     */
    public function collectAllProducts()
    {
        $products = $this->productsLogic->readProducts();

        $result = $this->productsLogic->printDiv($products, "product_name", "image_path", "price");

        $pages = $this->productsLogic->pagination();
        include "view/products.php";
    }


    /**
     * makes action buttons for the admin page
     */
    function btnInArray($array)
    {
        foreach ($array as $key => $value) {
            $array[$key]["Action"] =

                "<a class='btn btn-primary' href='index.php?op=read&id=$value[EAN]'><i class='fas fa-book'></i> Read</a>
                 <a class='btn btn-success' href='index.php?op=update&id=$value[EAN]'><i class='fas fa-edit'></i> Update</a>
                 <a class='btn btn-danger' href='index.php?op=delete&id=$value[EAN]'><i class='fas fa-trash-alt'></i> Delete</a>";
        }
        return $array;
    }

    /**
     * replaces a . into a , and adds a € infront of the priceS
     */
    public function replace($array)
    {
        foreach ($array as $key => $value) {
            $array[$key]["price"] = "€ " . str_replace(".", ",", $value['price']);
        }
        return $array;
    }
}

?>
