<?php
//connection Database
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "dbname";
$conn = mysqli_connect($servername, $username, $password, $dbname);
//request Sign Up
if ($_SERVER["REQUEST_METHOD"] == "POST") {
//
if (isset($_POST["signup"])) {
//
if (!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["pass"]) && !empty($_POST["specific"])) {
//
$name = $_POST["name"];
$email = $_POST["email"];
$pass = $_POST["pass"];
$specific = $_POST["specific"];
$sql = "INSERT INTO accounts (name, email, pass, specific_account) VALUES ('$name', '$email', '$pass', '$specific')";
if (mysqli_query($conn, $sql)) {
//
if ($specific == 0) {
//    
header("Location: merchants.php");
} else if ($specific == 1) {
//    
header("Location: clients_categories.php");
}
//
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
    <title>Sign Up</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign Up</h2>
                        <form method="POST" class="register-form" id="register-form" action="">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Your Password"/>
                            </div>
                            <div class="form-group">
                                <label for="specific"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="text" name="specific" id="specific" placeholder="Merchant : 0 - Client : 1"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Sign Up"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="sign_in.php" class="signup-image-link">You have an account?</a>                        
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>