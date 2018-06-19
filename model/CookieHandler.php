<?php
class CookieHandler
{

    public $name;
    public $data = [];

    public function __construct($name, $time)
    {

        $this->name = $name;

        if (!isset($_COOKIE[$name])) {
            setcookie($name, NULL, time() + $time);
        } else {
            $this->data = unserialize($_COOKIE[$name]);
        }
    }

    public function saveCookie()
    {
        setcookie($this->name, serialize($this->data));
    }

}