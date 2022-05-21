
<!--This function is called under the addentry file. Used as a test to check the action for any specified form.-->
<?php
$product = $_POST['Product'];
$description = $_POST['Description'];
$price = $_POST['Price'];

if (!empty($username) || !empty($description) || !empty($price)) {//if condition to filter out
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_used = "food_table";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $db_used);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        echo "Connected successfully";

        $INSERT = "INSERT Into menu (product,description,price) values (?,?,?)";
        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("ssd", $product, $description, $price);
        $stmt->execute();

        echo '<script> window.alert("Product insertion successful.")</script>';
        $stmt->close();
        $conn->close();

        die();
    }
}

$conn->close();
?>