<?php
//connection Database
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "dbname";
$conn = mysqli_connect($servername, $username, $password, $dbname);
//get Account
session_start();
$id = $_SESSION['id'];
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$pass = $_SESSION['pass'];
//request Edit Account
if ($_SERVER["REQUEST_METHOD"] == "POST") {
//
if (isset($_POST["update"])) {
//
if (!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["pass"])) {
//
$name_update = $_POST["name"];
$email_update = $_POST["email"];
$pass_update = $_POST["pass"];
$sql = "UPDATE accounts SET name = '$name_update', email = '$email_update', pass = '$pass_update' WHERE id = '$id'";
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
    <title>Update Accounts</title>

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
                        <h2 class="form-title">Update Accounts</h2>
                        <form method="POST" class="register-form" id="edit-form" action="">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" value="<?php echo $name; ?>" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" value="<?php echo $email; ?>" placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" value="<?php echo $pass; ?>" placeholder="Password"/>
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