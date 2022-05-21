<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="checkoutsyle.css?v=<?php echo time(); ?>">
</head>

<body>
    <section class="showcase">
        <header>
            <h2 class="logo">Faster Food</h2>
            <div class="toggle"></div>
        </header>

        <video src="videoo.mp4" muted loop autoplay></video>

        <div class="overlay"></div>

        <div class="text">
            <h2>Almost done</h2>
            <h3>Order Overview</h3>
            <h3>- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -</h3>
            
            <p>Bon Apetit!</p>

            <a href="index.php">Go back</a>
        </div>


        <div class="cardform">
            <form action = "" method="POST">        <!--Form to submit the order to the database.-->
            
                <h2>Total:</h2>
                <input type="text" id="total" name = "total" readonly>
                <h2>Description: </h2>
                <textarea id="descrip" rows="4" cols="100" name = "descrip" placeholder="No special instructions"></textarea>
                <h2>- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -</h2>

                <h2>Address: </h2>
                <textarea id="addressbox" rows="2" cols="100" name = "addressbox" placeholder="EXAMPLE: 23 Columns Garden" required></textarea>
                <h2>Phone number for delivery: </h2>
                <textarea id="phonebox" rows="1" cols="30" name = "phonebox"placeholder="EXAMPLE: 069 1234789" maxlength="15" required></textarea>
                <h2>- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -</h2>
                
                <!--Note: Payment information is not saved.-->
                <h2>Input your payment details below, then proceed to the Checkout button on the left</h2>
                <h2>Card number: </h2>
                <textarea id="cardnrbox" rows="1" cols="50" placeholder="EXAMPLE: 12345678912345" maxlength="16" required></textarea>
                <h2>Security code:</h2>
                <textarea id="cardsecuritybox" rows="1" cols="3" placeholder="123" maxlength="3" required></textarea>
                <h2>Expiry date:</h2>
                <input type="month" id="cardexpirybox" required>
                <h3>- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -</h3>
                
                <input type="submit" class="checkoutbutton" value="Check Out">
            </form>
        </div>

    </section>

    <script src="cardscript.js"></script> <!--Import for local storage-->

</body>

</html>


<?php       //Database submission code.

    $totalprice = $_POST['total'];
    $description = $_POST['descrip'];
    $address= $_POST['addressbox'];
    $phone = $_POST['phonebox'];

if (!empty($totalprice) || !empty($description) || !empty($address) || !empty($phone)) {

    if($totalprice == "$0.00"){     //condition to filter empty orders
        echo "<script> window.alert(\"Purchase unsuccessful. Your total cannot be $0.\") </script>";
        die();
    }
    
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

        $INSERT = "INSERT Into orders (total,description,address,number) values (?,?,?,?)";
        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("ssss", $totalprice, $description, $address, $phone);
        $stmt->execute();
        $stmt->close();
        $conn->close();

        echo "<script> window.alert(\"Purchase succesful. Order has been placed.\") </script>";

        die();
    }
}
?>