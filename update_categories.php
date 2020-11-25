<?php
//connection Database
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "dbname";
$conn = mysqli_connect($servername, $username, $password, $dbname);
//get categories
session_start();
$id = $_SESSION['id'];
$name = $_SESSION['name'];
$description = $_SESSION['description'];
//request Edit Categories
if ($_SERVER["REQUEST_METHOD"] == "POST") {
//
if (isset($_POST["update"])) {
//
if (!empty($_POST["name"]) && !empty($_POST["description"])) {
//
$name_update = $_POST["name"];
$description_update = $_POST["description"];
$sql = "UPDATE categories SET name = '$name_update', description = '$description_update'";
if (mysqli_query($conn, $sql)) {
//
header("Location: merchants_categories.php");
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
    <title>Update Categories</title>

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
                        <h2 class="form-title">Update Categories</h2>
                        <form method="POST" class="register-form" id="edit-form" action="">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" value="<?php echo $name; ?>" placeholder="Name"/>
                            </div>
                            <div class="form-group">
                                <label for="description"><i class="zmdi zmdi-email"></i></label>
                                <input type="text" name="description" id="description" value="<?php echo $description; ?>" placeholder="Description"/>
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