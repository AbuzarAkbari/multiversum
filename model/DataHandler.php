<?php

class DataHandler
{

    public $conn;

    /**
     * DataHandler constructor.
     * makes a connection with the database
     */
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

    /**
     * excutes a create data sql and return the last inserted id
     */
    function CreateData($sql)
    {
        $this->conn->exec($sql);
        return $this->conn->lastInsertId();
    }
    /**
     * excutes a read data sql
     */
    function ReadData($sql)
    {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    /**
     * excutes a update sql
     */
    function UpdateData($sql)
    {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }
    /**
     * excutes a delete data sql
     */
    function DeleteData($sql)
    {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }
}

?>
