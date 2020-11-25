<?php
//connection Database
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "dbname";
$conn = mysqli_connect($servername, $username, $password, $dbname);
//request Insert Categories
if ($_SERVER["REQUEST_METHOD"] == "POST") {
//
if (isset($_POST["insert"])) {
//
if (!empty($_POST["name"]) && !empty($_POST["description"])) {
//
$name = $_POST["name"];
$description = $_POST["description"];
$sql = "INSERT INTO categories (name, description) VALUES ('$name', '$description')";
if (mysqli_query($conn, $sql)) {
//
header("Location: merchants_categories.php");
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
    <title>Insert Categories</title>

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
                        <h2 class="form-title">Insert Categories</h2>
                        <form method="POST" class="register-form" id="register-form" action="">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Name"/>
                            </div>
                            <div class="form-group">
                                <label for="description"><i class="zmdi zmdi-email"></i></label>
                                <input type="text" name="description" id="description" placeholder="Description"/>
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