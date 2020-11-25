<?php
//connection Dataase
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "dbname";
$conn = mysqli_connect($servername, $username, $password, $dbname);
//
session_start();
$categories_id = $_SESSION['id'];
$categories_name = $_SESSION['name'];
//request Edit Merchants Products
if ($_SERVER["REQUEST_METHOD"] == "POST") {
//
if (isset($_POST["edit"])) {
//
if (!empty($_POST["id"]) && !empty($_POST["name"]) && !empty($_POST["type"]) && !empty($_POST["price"]) && !empty($_POST["discount"])) {
//
$id = $_POST["id"];
$name = $_POST["name"];  
$type = $_POST["type"];
$price = $_POST["price"];
$discount = $_POST["discount"];
//
$_SESSION['id'] = $id;
$_SESSION['name'] = $name;
$_SESSION['type'] = $type;
$_SESSION['price'] = $price;
$_SESSION['discount'] = $discount;
header("Location: update_products.php");
} else {
//
}
//request Delete Merchants Products
} else if (isset($_POST["delete"])) {
//
if (!empty($_POST["id"])) {
//
$id = $_POST["id"];
$sql = "DELETE FROM products WHERE id = '$id'";
if (mysqli_query($conn, $sql)) {
//
} else {
//
}
} else {
//
}
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Merchants Products</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main">

        <!-- Merchants Products form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Merchants Products</h2>
                        <!-- -->
                        <?php
                        //
                        $sql = "SELECT * FROM products WHERE categories_id = '$categories_id'";
                        if ($result = mysqli_query($conn, $sql)) {
                        //
                        if(mysqli_num_rows($result) > 0) {
                        //    
                        while($row = mysqli_fetch_array($result)) {
                        //    
                        $id = $row["id"];
                        $name = $row["name"];  
                        $type = $row["type"];
                        $price = $row["price"];
                        $discount = $row["discount"];
                        ?>
                        <!-- -->
                        <form method="POST" class="register-form" id="account-form" action="">
                            <p><!-- -->
                            <?php
                            //
                            echo $name;
                            ?>
                            <!-- --></p>
                            <p><!-- -->
                            <?php
                            //
                            echo $type;
                            ?>
                            <!-- --></p>
                            <p><!-- -->
                            <?php
                            //
                            echo $price;
                            ?>
                            <!-- --></p>
                            <p><!-- -->
                            <?php
                            //
                            echo $discount;
                            ?>
                            <!-- --></p>
                            <p><!-- -->
                            <?php
                            //
                            echo $categories_name;
                            ?>
                            <!-- --></p>
                            <input type="hidden" name="id" id="id" value="<?php echo $id; ?>"/>
                            <input type="hidden" name="name" id="name" value="<?php echo $name; ?>"/>
                            <input type="hidden" name="type" id="type" value="<?php echo $type; ?>"/>
                            <input type="hidden" name="price" id="price" value="<?php echo $price; ?>"/>
                            <input type="hidden" name="discount" id="discount" value="<?php echo $discount; ?>"/>
                            <div class="form-group form-button">
                                <input type="submit" name="edit" id="edit" class="form-submit" value="Edit"/>
                                <input type="submit" name="delete" id="delete" class="form-submit" value="Delete"/>
                            </div>
                        </form>
                        <!-- -->
                        <?php
                        //
                        }                        
                        } else {
                        //    
                        echo "0 results";
                        }
                        } else {
                        //    
                        }
                        ?>
                        <!-- -->
                        
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="insert_products.php" class="signup-image-link">Insert Products</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>