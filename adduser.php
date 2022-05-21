<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Editor</title>
    <link rel="stylesheet" href="datastyle.css" <?php echo time(); ?>>
</head>

<body>
    <div class="text1">
        <p>Please enter the information accordingly:</p>
    </div>

    <form action="" method="POST"><!--Form for creation-->
        <div class="nameentry">
            <label for="Product">Enter the username: </label>
            <input type="text" name="username" placeholder="Username" required>
        </div>

        <div class="descentry">
            <label for="Description">Enter a password: </label>
            <input type="text" name="password" placeholder="Password" required>
        </div>
        <input type="submit" class="btn btn primary">
    </form>

    <div class="backbutton">
        <a href="conn.php">
            <button style="margin:8px;">Go back</button>
        </a>

        <table> <!--start table creation-->
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Password</th>
            </tr>
</body>

</html>

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
echo "Connected successfully";

$sql = "SELECT * from users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["username"] . "</td><td>" . $row["password"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

//adding the entry

$username = $_POST['username'];
$password = $_POST['password'];

if (!empty($username) || !empty($password)) {
    $INSERT = "INSERT Into users (username,password) values (?,?)";
    $stmt = $conn->prepare($INSERT);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();

    echo '<script> window.alert("User insertion successful.")</script>';
    header("Location: http://localhost/foodmanagement/adduser.php");
    $stmt->close();
    $conn->close();

    die();
}
$conn->close()
?>