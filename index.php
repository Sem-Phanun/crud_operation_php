<?php
    $host= "localhost";
    $username = "root";
    $password = "";
    $database = "crud_php";

    $conn = new mysqli($host, $username, $password, $database);
    if($conn -> connect_error){
        die("Error connect to database". $conn->connect_error);
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD</title>
    <link rel="stylesheet" href="./style/index.css">
</head>

<body>
    <h1 class="title">PHP CRUD</h1>

    <div class="container">
        <div class="table">
        <button class="btn"><a href="add.php">Add</a></button>
            <div class="table-header">
                <div class="header__item"><a id="name" class="filter__link" href="#">Name</a></div>
                <div class="header__item"><a id="name" class="filter__link" href="#">Email</a></div>
                <div class="header__item"><a id="wins" class="filter__link filter__link--number" href="#">Age</a></div>
                <div class="header__item"><a id="draws" class="filter__link filter__link--number" href="#">Address</a></div>
                <div class="header__item"><a id="losses" class="filter__link filter__link--number" href="#">Action</a></div>

            </div>
            <div class="table-content">
                <?php
                    $sql = "SELECT * FROM users";
                    $result = $conn->query($sql);
                    if(!$result){
                        die("Error getting data from db");
                    }

                    while($row = $result->fetch_assoc()){
                        echo "
                            <div class='table-row'>
                                <div class='table-data'>$row[name]</div>
                                <div class='table-data'>$row[email]</div>
                                <div class='table-data'>$row[age]</div>
                                <div class='table-data'>$row[address]</div>
                                <div class='table-data'>
                                    <button class='btn-edit'><a href='./edit.php?id=$row[id]'>Edit</a></button>
                                    <button class='btn-delete'><a href='./delete.php?id=$row[id]'>Delete</a></button>
                                </div>
                            </div>
                        ";
                    }

                ?>
            </div>
        </div>
    </div>
</body>

</html>