<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editing an entry</title>
    <link rel="stylesheet" href="datastyle.css">
</head>

<body>
    <h1>Editing users</h1>

    <form action="" method="POST"> <!--Form for information-->
        <div class="identry">
            <label for="ID">Enter the user ID you would like to edit: </label>
            <input type="text" name="ID" placeholder="Insert ID" required>
        </div>

        <div class="nameentry">
            <label for="Product">Enter the new username: </label>
            <input type="text" name="username" placeholder="Username" required>
        </div>

        <div class="descentry">
            <label for="Description">Enter the password: </label>
            <input type="text" name="password" placeholder="Password" required>
        </div>

        <input type="submit" class="update" value="Update">
    </form>

    <div class="backbutton">
        <a href="conn.php">
            <button style="margin:8px;">Go back</button>
        </a>

        <table>
            <tr> <!--Table building-->
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
$conn = new mysqli($servername, $username, $password, $db_used);

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

$id = $_POST['ID'];
$username = $_POST['username'];
$password = $_POST['password'];
$query = "UPDATE `users` SET `username`='$username',`password`='$password' WHERE ID ='$id'";
$query_run = mysqli_query($conn, $query);

$conn->close();
?>