<?php

class DataHandler
{

    public $conn;

    function __construct($dbtype, $servername, $dbname, $username, $password)
    {
        try {
            $this->conn = new PDO("$dbtype:host=$servername;dbname=$dbname;charset=utf8;", $username, $password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    function CreateData($sql)
    {
        $this->conn->exec($sql);
        return $this->conn->lastInsertId();
    }

    function ReadData($sql)
    {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function UpdateData($sql)
    {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    function DeleteData($sql)
    {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }
}

?>
