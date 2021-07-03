<?php

class Connection 
{
    static public function connect(){

        $host = "localhost";
        $db = "store";

        $conn = new PDO(
            "mysql:host=".$host.
            ";dbname=".$db,
            "root",
            "");

        $conn -> exec("set names utf8");

        return $conn;
    }
}

?>