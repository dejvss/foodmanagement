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
    <h1>Editing an entry</h1>
    <p>General Info</p>

    <form action="" method="POST">
        <!--Form to get values to edit the entry-->
        <div class="identry">
            <label for="ID">Enter the name ID the product you would like to edit: </label>
            <input type="text" name="ID" placeholder="Insert ID" required>
        </div>

        <div class="nameentry">
            <label for="Product">Enter the new product name: </label>
            <input type="text" name="Product" placeholder="Product Name" required>
        </div>

        <div class="descentry">
            <label for="Description">Enter the new description for the product: </label>
            <input type="text" name="Description" placeholder="Product description" required>
        </div>

        <div class="priceentry">
            <label for="Price">Enter the new price of the product (min 0.1$): </label>
            <input type="number" name="Price" placeholder="0.1" min="0.1" step=".1" required>
        </div>
        <input type="submit" class="update" value="Update">
    </form>

    <div class="backbutton">
        <a href="conn.php">
            <button style="margin:8px;">Go back</button>
        </a>

        <table>
            <!--Table building-->
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Description</th>
                <th>Price</th>
            </tr>
</body>

</html>

<?php       //finishing the table build and also completing the update to the specific entry
$servername = "localhost";
$username = "root";
$password = "";
$db_used = "food_table";
$conn = new mysqli($servername, $username, $password, $db_used);

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

$id = $_POST['ID'];
$product = $_POST['Product'];
$description = $_POST['Description'];
$price = $_POST['Price'];
$query = "UPDATE `menu` SET `Product`='$product',`Description`='$description',`Price`='$price' WHERE ID ='$id'";
$query_run = mysqli_query($conn, $query);

$conn->close();
?>