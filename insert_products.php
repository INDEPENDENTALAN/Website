<?php
//connection Database
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "dbname";
$conn = mysqli_connect($servername, $username, $password, $dbname);
//
session_start();
$categories_id = $_SESSION['id'];
$categories_name = $_SESSION['name'];
//request Insert Products
if ($_SERVER["REQUEST_METHOD"] == "POST") {
//
if (isset($_POST["insert"])) {
//
if (!empty($_POST["name"]) && !empty($_POST["type"]) && !empty($_POST["price"])) {
//
$name = $_POST["name"];
$type = $_POST["type"];
$price = $_POST["price"];
if ($type == 0) {
$discount = 0;
} else {
$discount = $_POST["discount"];
}
$sql = "INSERT INTO products (name, type, price, discount, categories_id, categories_name) VALUES ('$name', '$type', '$price', '$discount', '$categories_id', '$categories_name')";
if (mysqli_query($conn, $sql)) {
//
header("Location: merchants_products.php");
} else {
//
}
mysqli_close($conn);
} else {
//
}
}
}
//
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insert Products</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main">

        <!-- Insert form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Insert Products</h2>
                        <form method="POST" class="register-form" id="register-form" action="">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Name"/>
                            </div>
                            <div class="form-group">
                                <label for="type"><i class="zmdi zmdi-email"></i></label>
                                <input type="text" name="type" id="type" placeholder="Normal : 0 - Discount : 1"/>
                            </div>
                            <div class="form-group">
                                <label for="price"><i class="zmdi zmdi-lock"></i></label>
                                <input type="text" name="price" id="price" placeholder="Price"/>
                            </div>
                            <div class="form-group">
                                <label for="discount"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="text" name="discount" id="discount" placeholder="Discount"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="insert" id="insert" class="form-submit" value="Insert"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>