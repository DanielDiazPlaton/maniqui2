<?php 

try{
    $con = new PDO("mysql:dbname=maniqui;host=localhost", "root", "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch(PDOException $e){
    exit("Connection Failed" . $e->getMessage());
}
?>