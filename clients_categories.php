<?php
//connection Dataase
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "dbname";
$conn = mysqli_connect($servername, $username, $password, $dbname);
//
if ($_SERVER["REQUEST_METHOD"] == "POST") {
//request Products
if (isset($_POST["products"])) {
//
if (!empty($_POST["id"]) && !empty($_POST["name"]) && !empty($_POST["description"])) {
//
$id = $_POST["id"];
$name = $_POST["name"];  
$description = $_POST["description"];
session_start();
$_SESSION['id'] = $id;
$_SESSION['name'] = $name;
$_SESSION['description'] = $description;
header("Location: clients_products.php");
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
    <title>Clients Categories</title>

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
                        <h2 class="form-title">Clients Categories</h2>
                        <?php
                        //
                        $sql = "SELECT * FROM categories";
                        if ($result = mysqli_query($conn, $sql)) {
                        //
                        if(mysqli_num_rows($result) > 0) {
                        //    
                        while($row = mysqli_fetch_array($result)) {
                        //    
                        $id = $row["id"];
                        $name = $row["name"];  
                        $description = $row["description"];
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
                            echo $description;
                            ?>
                            <!-- --></p>
                            <input type="hidden" name="id" id="id" value="<?php echo $id; ?>"/>
                            <input type="hidden" name="name" id="name" value="<?php echo $name; ?>"/>
                            <input type="hidden" name="description" id="description" value="<?php echo $description; ?>"/>
                            <div class="form-group form-button">
                                <input type="submit" name="products" id="products" class="form-submit" value="Products"/>
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
                        <a href="sign_in.php" class="signup-image-link">Sign Out</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>