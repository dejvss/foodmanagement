<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders Table</title>
    <link rel="stylesheet" href="datastyle.css " <?php echo time(); ?>>
</head>

<body>

    <table> <!--Table building-->
        <tr>
            <th>ID</th>
            <th>Total</th>
            <th>Description</th>
            <th>Address</th>
            <th>Number</th>
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

        $sql = "SELECT * from orders";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"] . "</td><td>" . $row["Total"] . "</td><td>" . $row["Description"] . "</td><td>" . $row["Address"] . "</td><td>" . $row["Number"] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        ?>

        <div class="removeorderform">
            <!--Form for order removal-->
            <form method="POST">

                <label>Enter the ID of the order you would like to remove</label>
                <input id="removeid" name="removeid" type="text" placeholder="ID for the order."></input>
                <br>
                <input style="margin:15px;" type="submit" class="delete" value="Delete Entry">

            </form>
        </div>

        <div class="backbutton">
            <!--Button for navigation-->
            <a href="orderstable.php">
                <button style="margin:10px; width: 100px; height: 40px;">Go back</button>
            </a>
        </div>

        <?php //php side of the functionality

        $id = $_POST['removeid'];
        $query = "DELETE FROM `orders` WHERE id = '$id';";

        $runquery = mysqli_query($conn, $query);

        if ($runquery) {
            echo 'Success.';
        }
        $conn->close();
        die();
        ?>
</body>

</html>