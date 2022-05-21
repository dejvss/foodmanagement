<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Editor</title>
    <link rel="stylesheet" href="datastyle.css">
</head>


<!-- site formatting-->

<body>
    <div class="text1">
        <p>Please enter the information accordingly:</p>
    </div>

    <form action="insert.php" method="POST">
        <div class="nameentry">
            <label for="Product">Enter the name of the product: </label>
            <input type="text" name="Product" placeholder="Product Name" required>
        </div>

        <div class="descentry">
            <label for="Description">Enter a short description for the product: </label>
            <input type="text" name="Description" placeholder="Product description" required>
        </div>

        <div class="priceentry">
            <label for="Price">Enter the price of the product (min 0.1$): </label>
            <input type="number" placeholder="0.1" min="0.1" name="Price" step=".1" required>
        </div>
        <input type="submit" class="btn btn primary">
    </form>

    <div class="backbutton">
        <a href="conn.php">
            <button style="margin:8px;">Go back</button>
        </a>

        <table>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Description</th>
                <th>Price</th>
            </tr>
</body>

</html>

<!--Php connection to show table-->
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

$sql = "SELECT * from menu";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["ID"] . "</td><td>" . $row["Product"] . "</td><td>" . $row["Description"] . "</td><td>" . $row["Price"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();

?>