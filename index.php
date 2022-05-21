<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Good quality food, straight to your door.">
    <meta name="keywords" content="burger, drink, fast food, faster food, delivery,byrek, taco, special,cheese,cheeeseburger,hamburger,meat,cubano,coffee,espresso"> <!--tags-->
    <title>Faster Food</title>
    <link rel="stylesheet" href="indexstyle.css?v= <?php echo time(); ?>"> <!-- I have used echo time because sometimes my css was not loading because of cache issues. This seems to resolve it.-->
</head>

<body>
    <section class="showcase">
        <!--There is an active version of the showcase in css and javascript used for the right side menu.-->
        <header>
            <h2 class="logo">Faster Food</h2>
            <div class="toggle"></div>
            <!--This toggle is important because of the menu on the right. There is an active version of this made through css and javascript down below.-->
        </header>

        <video src="videoo.mp4" muted loop autoplay></video> <!-- Video is muted and on loop, below it we have the overlay used to make everything else on the site understandable. -->

        <div class="overlay"></div> <!-- Overlay for the video. -->

        <div class="text">
            <h2>Feeling hungry?</h2>
            <h3>Take a quick look</h3>
            <p>Fresh products, stright to your home. Pick and choose according to your taste and we will deliver!</p>
            <p>Simply press add to cart for the product that you desire and add any comments regarding your order down in the box.</p>
            <p>Bon Apetit!</p>
            <a href="checkoutdelivery.php" class="checkouts" id="checkoutdelivery">Payment on delivery</a>
            <!--same class, different buttons and redirects-->
            <a href="checkoutcard.php" class="checkouts" id="checkoutcard">Payment through card</a>
            <!--same class, different buttons and redirects-->

            <label for="total">Total:</label>
            <input type="text" value="$0" id="total" readonly>

            <div class="instructionbox">

                <div class="inst">
                    <h3>Instructions: </h3>
                </div>
                <textarea id="desc" rows="4" cols="80" placeholder="EXAMPLE: No tomatoes on the burger and Fanta as a soft drink."></textarea>
                <!--This order information is saved within the local storage through javascript later on so it can move through multiple pages.-->
            </div>
        </div>

        <table>
            <!--Table delcaration and fill with PHP and HTML-->
            <tr>
                <th>Item</th>
                <th>Description</th>
                <th>Price ($)</th>
            </tr>

            <?php
            //setup for php connection
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

            $sql = "SELECT * from menu";
            $result = $conn->query($sql);
            $counter = 0;

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { //entire table created down below
                    echo "<tr><td>" . $row["Product"] . "</td><td>" . $row["Description"] . "</td><td data-td-type=\"price\">$" . $row["Price"] . "</td><td><button class=\"addbtn\">Add to cart</button></td><td><button class=\"removebtn\">Remove</button></td><td><input type = \"number\" value=0 class=\"quantity\" min=\"0\" readonly></td></tr>";
                    $counter = $counter + 1;
                }
                echo "</table>";
            } else {
                echo "0 results";
                die();
            }
            ?>

    </section>

    <!--Simple menu used for a good looking way to enter the login screen. Activated through javascript.-->
    <div class="menu">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </div>

    <script src="indexscript.js"></script>  <!--Javascript import-->

</body>

</html>