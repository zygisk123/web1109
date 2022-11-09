<?php

class DB{
    public $conn;

    public function __construct(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "web1109";
        $this->conn = new mysqli($servername, $username, $password, $db);
    }





}

?>