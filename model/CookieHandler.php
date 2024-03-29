<?php
class CookieHandler
{

    public $name;
    public $data = [];


    /**
     * CookieHandler constructor.
     * sets a cookie and gives it a max time until it expires
     */
    public function __construct($name, $time)
    {

        $this->name = $name;

        if (!isset($_COOKIE[$name])) {
            setcookie($name, NULL, time() + $time);
        } else {
            $this->data = unserialize($_COOKIE[$name]);
        }
    }

    /**
     * saves a cookie
     */
    public function saveCookie()
    {
        setcookie($this->name, serialize($this->data));
    }

}