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
//
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clients Products</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main">

        <!-- Account form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Clients Products</h2>
                        <!-- -->
                        <?php
                        //
                        $sql = "SELECT * FROM products where categories_id = '$categories_id'";
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
                        <a href="sign_in.php" class="signup-image-link">Sign Out</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>