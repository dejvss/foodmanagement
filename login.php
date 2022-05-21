<!--PHP script for retrieving login data-->
<?php

$servername = "localhost";
$username = "root";
$password = "";
$db_used = "food_table";

// Create connection
$conn = new mysqli($servername, $username, $password, $db_used);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['username'])) {
    $uname = $_POST['username'];
    $password = $_POST['password'];

    $sql = "select * from users where username = '" . $uname . "' 
    AND password = '" . $password . "' limit 1";

    $result = $conn->query($sql);

    if (mysqli_num_rows($result) == 1) {
        echo "<script>window.alert(\"You have successfully logged in.\");</script>";
        header("Location: http://localhost/foodmanagement/conn.php");
        exit();
    } else {
        echo "One or more of your credentials were wrong. Please try again.";
        header("Location: http://localhost/foodmanagement/login.php");
        exit();
    }
}

$conn->close();
?>

<!-- HTML configuration for the login page-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="loginstyle.css"> <?php echo time(); ?>
</head>

<body>
    <div class="intro">
        <h2>Login for Faster Food</h2>
        <p>Warning: If you are not a manager/administrator, please go back.</p>
    </div>


    <form action="" method="POST"> <!--Form for posting-->
        <div class="username">
            <label for="user">Username: </label>
            <input type="text" name="username" placeholder="Username" required>
        </div>
        <div class="password">
            <label for="pass">Password: </label>
            <input type="password" name="password" placeholder="Password" required>
        </div>
        <div class="submitbtn">
            <input type="submit" class="submit" value="Login">
        </div>
    </form>

    <div class="backbutton">
        <a href="index.php">
            <button style="margin:8px;">Go back</button>
        </a>
    </div>

</body>

</html>