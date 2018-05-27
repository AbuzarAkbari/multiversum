<?php
    class DataHandler {


        function __construct($servername,$dbname,$username,$password) {
            try {
                $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                // set the PDO error mode to exception
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }
            catch(PDOException $e)
                {
                 $e->getMessage();

                }
        }

        function CreateData($sql){

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $this->conn->lastInsertId();

            // set the resulting array to associative


            }

        function ReadData($sql){
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            // set the resulting array to associative
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }
        function UpdateData($sql){
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

        }
        function DeleteData($sql){
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            // set the resulting array to associative

        }


    }
?>
