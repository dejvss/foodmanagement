<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete Data</title>
  <link rel="stylesheet" href="datastyle.css">
</head>

<body>
  <h1>Delete an item</h1>

  <form action="" method="POST"> <!--Form so we can use the post method-->

    <div class="nameentry">
      <label for="Product">Enter the ID of the product: </label>
      <input type="text" name="id" placeholder="Product ID" required>
    </div>
    <input type="submit" class="delete" value="Delete Entry">
  </form>

  <div class="backbutton">
    <a href="conn.php">
      <button style="margin:8px;">Go back</button>
    </a>

    <table> <!--Table building-->
      <tr>
        <th>ID</th>
        <th>Product</th>
        <th>Description</th>
        <th>Price</th>
      </tr>
</body>

</html>

<?php //table building and deletion
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

$id = $_POST['id'];
$query = "DELETE FROM `menu` WHERE ID = '$id';";

$runquery = mysqli_query($conn, $query);

if ($runquery) {
  echo 'Success.';
}
$conn->close();
die();
?>