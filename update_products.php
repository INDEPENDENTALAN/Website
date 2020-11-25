<?php
//connection Database
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "dbname";
$conn = mysqli_connect($servername, $username, $password, $dbname);
//get Products
session_start();
$id = $_SESSION['id'];
$name = $_SESSION['name'];
$type = $_SESSION['type'];
$price = $_SESSION['price'];
$discount = $_SESSION['discount'];
//request Edit Products
if ($_SERVER["REQUEST_METHOD"] == "POST") {
//
if (isset($_POST["update"])) {
//
if (!empty($_POST["name"]) && !empty($_POST["type"]) && !empty($_POST["price"]) && !empty($_POST["discount"])) {
//
$name_update = $_POST["name"];
$type_update = $_POST["type"];
$price_update = $_POST["price"];
$discount_update = $_POST["discount"];
$sql = "UPDATE products SET name = '$name_update', type = '$type_update', price = '$price_update', discount = '$discount_update' WHERE id = '$id'";
if (mysqli_query($conn, $sql)) {
//
header("Location: index.php");
} else {
//
}
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
    <title>Update Products</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main">

        <!-- Update form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Update Products</h2>
                        <form method="POST" class="register-form" id="edit-form" action="">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" value="<?php echo $name; ?>" placeholder="Name"/>
                            </div>
                            <div class="form-group">
                                <label for="type"><i class="zmdi zmdi-email"></i></label>
                                <input type="text" name="type" id="type" value="<?php echo $type; ?>" placeholder="Type"/>
                            </div>
                            <div class="form-group">
                                <label for="price"><i class="zmdi zmdi-lock"></i></label>
                                <input type="text" name="price" id="price" value="<?php echo $price; ?>" placeholder="Price"/>
                            </div>
                            <div class="form-group">
                                <label for="discount"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="text" name="discount" id="discount" value="<?php echo $discount; ?>" placeholder="Discount"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="update" id="update" class="form-submit" value="Update"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="edit image"></figure>
                        <a href="#" class="signup-image-link"></a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>