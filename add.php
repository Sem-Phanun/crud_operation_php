<?php
    $host= "localhost";
    $username = "root";
    $password = "";
    $database = "crud_php";

    $conn = new mysqli($host, $username, $password, $database);
    if($conn -> connect_error){
        die("Error connect to database". $conn->connect_error);
    }

    $name = "";
    $email = "";
    $age = "";
    $address = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $age = $_POST['age'];
        $address = $_POST['address'];

        if ($name == "" || $email == "" || $age == "" || $address == "") {
            echo "
            <script>alert('fill can't be empty.')</script>
            ";
        }

        $sql = "INSERT INTO users (name, email, age, address) VALUES('$name', '$email', '$age', '$address')";

        $result = $conn->query($sql);
        if (!$result) {
            die("Error while adding data");
        }

        header('location: ./index.php');
        exit;
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" href="./style/add.css">
</head>

<body>

    <h1>Add User</h1>

    <form method="POST">
        <div class="container">
            <label for="name">Name:</label><br>
            <input type="text" name="name" value=""/><br>
            <label for="email">Email:</label><br>
            <input type="email" name="name" value=""/><br>
            <label for="age">Age:</label><br>
            <input type="text" name="age" value=""/><br><br>
            <label for="address">Address:</label>
            <input type="text" name="address" value=""/>
            <button type="submit">Add</button>
        </div>
    </form>
</body>

</html>