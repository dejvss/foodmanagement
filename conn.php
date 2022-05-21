<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Display</title>
  <link rel="stylesheet" href="datastyle.css " <?php echo time(); ?>>
</head>

<body>

  <table> <!--table creation for menu editing-->
    <tr>
      <th>ID</th>
      <th>Product</th>
      <th>Description</th>
      <th>Price</th>
    </tr>

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

    <div class="editortext">
      <p>To navigate or edit the database, please use the buttons below:</p>
    </div>
    <!--Buttons for navigation-->
    <div class="addbutton">
      <a href="addentry.php">
        <button style="margin:8px;">Add an entry</button>
      </a>

      <a href="adduser.php">
        <button style="margin:8px">Add another user</button>
      </a>

    </div>

    <div class="editbutton">
      <a href="edit.php">
        <button style="margin:8px;">Edit an entry</button>
      </a>

      <a href="edituser.php">
        <button style="margin:8px;">Edit a user</button>
      </a>
    </div>

    <div class="removebutton">
      <a href="remove.php">
        <button style="margin:8px;">Remove an entry</button>
      </a>

      <a href="removeuser.php">
        <button style="margin:8px;">Remove a user</button>
      </a>

    </div>

    <a href="orderstable.php">
      <button style="margin:20px; width: 100px; height: 40px;">Check Orders</button>
    </a>

    <div class="indexbutton">
      <a href="index.php">
        <button style="margin:20px; width: 100px; height: 40px;">Logout</button>
      </a>
    </div>


</body>

</html>