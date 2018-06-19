<?php require_once 'CookieHandler.php';
require_once 'productsLogic.php';

class shoppingCartLogic
{
    public $cookiehandler;

    public function __construct()
    {
        $this->cookieHandler = new CookieHandler("shoppingCart", (24 * 60 * 60 * 2));
        $this->product = new productsLogic();
    }

    public function addProductToCart($ean, $amount = 1)
    {
        $this->cookieHandler->data[$ean] = $amount;
        $this->cookieHandler->saveCookie();
    }

    public function updateProductInCart($ean, $amount = 1)
    {
        $this->cookieHandler->data[$ean] = $amount;
    }

    public function deleteProductInCart($ean)
    {
        unset($this->cookieHandler->data[$ean]);
        $this->cookieHandler->saveCookie();
    }

    public function readCart()
    {
        $products = [];

        foreach ($this->cookieHandler->data as $ean => $amount) {
            $product = $this->product->readProductImg($ean);
            $product["amount"] = $amount;
            $products[] = $product;
        }

        return $products;
    }
}