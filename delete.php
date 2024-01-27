<?php
    $host= "localhost";
    $username = "root";
    $password = "";
    $database = "crud_php";

    $conn = new mysqli($host, $username, $password, $database);
    if($conn -> connect_error){
        die("Error connect to database". $conn->connect_error);
    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];


        $sql = "DELETE FROM users WHERE id=$id";
        $conn->query($sql);

    }
    header('location: ./index.php');
    exit;
?>