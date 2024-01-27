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
    $id = "";
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {

        if(!isset($_GET['id'])){
            header('location: ./index.php');
            exit;
        }

        $id = $_GET['id'];

        $sql = "SELECT * FROM users WHERE id = $id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if (!$row) {
            die("Error while getting data");
            header('location: ./index.php');
        }

        $name = $row['name'];
        $email = $row['email'];
        $age = $row['age'];
        $address = $row['address'];
    }else{
        $name = $_POST['name'];
        $email = $_POST['email'];
        $age = $_POST['age'];
        $address = $_POST['address'];
        $id = $_POST['id'];


        if ($name == "" || $email == "" || $age == "" || $address == "") {
            echo "
            <script>alert('Fill can't be empty.')</script>
            ";
            die();
        }

        $sql = "UPDATE users SET name = '$name', email = '$email', age = '$age', address = '$address' WHERE id= $id";
        $result = $conn->query($sql);
        if(!$result){
            echo "
            <script>alert('update not success')</script>
            ";
            die();
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
    <title>Edit User</title>
    <link rel="stylesheet" href="./style/edit.css">
</head>

<body>

    <h1>Edit User</h1>

    <form method="POST">
        <div class="container">
            <input type="hidden" name="id" value="<?php echo $id?>">
            <label for="name">Name:</label><br>
            <input type="text" name="name" placeholder="Enter Name" value="<?php echo $name ?>"/><br>
            <label for="name">Email:</label><br>
            <input type="email" name="name" placeholder="email address" value="<?php echo $email ?>"/><br>
            <label for="age">Age:</label><br>
            <input type="text" name="age" placeholder="Enter Age" value="<?php echo $age ?>"/><br><br>
            <label for="address">Address:</label>
            <input type="text" name="address" placeholder="address" value="<?php echo $address ?>"/>
            <button type="submit">Edit</button>
        </div>
    </form>
</body>

</html>