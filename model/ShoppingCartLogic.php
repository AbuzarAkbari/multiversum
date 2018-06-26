<?php
require_once 'CookieHandler.php';
require_once 'productsLogic.php';

class ShoppingCartLogic
{
    public $cookiehandler;

    /**
     * ShoppingCartLogic constructor.
     */
    public function __construct()
    {
//        sets the cookie name and expiration date
        $this->cookieHandler = new CookieHandler("shoppingCart", (24 * 60 * 60 * 2));
        $this->product = new productsLogic();
    }

    /**
     * function that sets the amount of a prodocts and by default is the amount is 1
     */
    public function addProductToCart($ean, $amount = 1)
    {
        $this->cookieHandler->data[$ean] = $amount;
        $this->cookieHandler->saveCookie();
    }

    /**
     * updates the amount
     */
    public function updateProductInCart($ean, $amount = 1)
    {
        $this->cookieHandler->data[$ean] = $amount;
    }

    /**
     * deletes a product in the cookie
     */
    public function deleteProductInCart($ean)
    {
        unset($this->cookieHandler->data[$ean]);
        $this->cookieHandler->saveCookie();
    }

    /**
     * function that puts the cookie in a array and returns it
     */
    public function readCart()
    {
        $products = [];

        foreach ($this->cookieHandler->data as $ean => $amount) {
            $product = $this->product->FindData($ean)[0];
            $product["Aantal"] = $amount;
            $products[] = $product;
        }

        return $products;
    }
}