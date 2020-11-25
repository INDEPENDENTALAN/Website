<?php
//connection Dataase
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "dbname";
$conn = mysqli_connect($servername, $username, $password, $dbname);
//request Edit Accounts
if ($_SERVER["REQUEST_METHOD"] == "POST") {
//
if (isset($_POST["edit"])) {
//
if (!empty($_POST["id"]) && !empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["pass"])) {
//
$id = $_POST["id"];
$name = $_POST["name"];  
$email = $_POST["email"];
$pass = $_POST["pass"];
session_start();
$_SESSION['id'] = $id;
$_SESSION['name'] = $name;
$_SESSION['email'] = $email;
$_SESSION['pass'] = $pass;
header("Location: update_accounts.php");
} else {
//
}
//request Delete Accounts
} else if (isset($_POST["delete"])) {
//
if (!empty($_POST["id"])) {
//
$id = $_POST["id"];
$sql = "DELETE FROM accounts WHERE id = '$id'";
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
    <title>Accounts</title>

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
                        <h2 class="form-title">Accounts</h2>
                        <!-- -->
                        <?php
                        //
                        $sql = "SELECT * FROM accounts";
                        if ($result = mysqli_query($conn, $sql)) {
                        //
                        if(mysqli_num_rows($result) > 0) {
                        //    
                        while($row = mysqli_fetch_array($result)) {
                        //    
                        $id = $row["id"];
                        $name = $row["name"];  
                        $email = $row["email"];
                        $pass = $row["pass"];
                        ?>
                        <!-- -->
                        <form method="POST" class="register-form" id="account-form" action="">
                            <p><!-- -->
                            <?php
                            //
                            echo $name;
                            ?>
                            <!-- --></p>
                            <input type="hidden" name="id" id="id" value="<?php echo $id; ?>"/>
                            <input type="hidden" name="name" id="name" value="<?php echo $name; ?>"/>
                            <input type="hidden" name="email" id="email" value="<?php echo $email; ?>"/>
                            <input type="hidden" name="pass" id="pass" value="<?php echo $pass; ?>"/>
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
                        <a href="sign_in.php" class="signup-image-link">Sign Out</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>