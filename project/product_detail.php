<?php
$page_title = "product_detail";
require("header.php");
?>
<style>
       .container {
    display: flex;
}
.image-container, .info-container {
    width: 50%;
}
.image-container img {
    width: 100%;
    height: auto;
}
.info-container {
    position: fixed;
    right: 0;
    overflow: auto;
    height: 100vh;
	
}
h1 {
    position: absolute;
    top: 50px;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    font-size: 40px;
    font-weight: bold;
	margin-bottom: 20px;
	text-align: center;
}
#p1 {
    position: absolute;
    top: 250px;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    font-size: 20px;
    font-weight: bold;
	margin-bottom: 20px;
	
}
#p2 {
    position: absolute;
    top: 450px; /* Adjust this value based on the actual height of your h1 and p1 elements */
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    font-size: 40px;
    font-weight: bold;
    text-align: center;
	margin-bottom: 20px;
}
#p3 {
    position: absolute;
    top: 550px;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    font-size: 20px;
    font-weight: bold;
    text-align: center;
	margin-bottom: 20px;
}
#p4 {
    position: absolute;
    top: 600px;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    font-size: 30px;
    font-weight: bold;
}
input {
    position: absolute;
    top: 700px; /* Adjust this value based on the actual height of your h1, p1, p2 and p3 elements */
    left: 50%;
    transform: translate(-50%, -50%);
}
input[type="text"] {
    padding: 10px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid #ccc;
}
input[type="submit"] {
    position: absolute;
    top: 800px;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    border: none;
    color: white;
    background-color: #5cb85c;
}
	.time {
    position: absolute; 
    top: 10px; 
    right: 10px;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    color: white;
    font-weight: bold;
    font-size: 30px;
}

    </style>
<div id="content">
<?php

require("db_connect2.php");
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (!$dbc) {
    die("error connect：" . mysqli_connect_error());
}
$product_id = $_GET['id'];
$page = isset($_GET['page']) ? $_GET['page'] : 'product1';
$table = $page;


$sql = "SELECT id,pname, price, image_url,description, seller, category, seller_time, features,url2,url3,url4,url5,bids,url6 FROM $table WHERE id = $product_id"; 
$result = $dbc->query($sql);
if ($result === false) {
    die("SQL query error: " . $dbc->error);
}
	$current_price = 0;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
		 $current_price = floatval($row["price"]);
        echo "
        <div id=\"content\">
            <body>
                <div class=\"container\">
                    <div class=\"image-container\">
                        <img src=\"" . $row["image_url"] . "\" alt=\"No picture\">
                        <img src=\"" . $row["url2"] . "\" alt=\"\">
						<img src=\"" . $row["url3"] . "\" alt=\"\">
						<img src=\"" . $row["url4"] . "\" alt=\"\">
						
                    </div>
                    <div class=\"info-container\">
					<div id=\"timeLeft\" class = \"time\">Loading...</div>
                        <h1>" . $row["pname"] . "</h1>
                        <p id=\"p1\"><br>" . $row["bids"] . " Bid times<br> Modal:" . $row["features"] . "<br>" . $row["description"] . "<br></p>
                        <p id=\"p2\">Price now: $" . $row["price"] . "</p>
                        <p id=\"p3\">The product is available for immediate auction online. </p>
                        <p id=\"p4\">Enter your bid:</p>
                        <form  method=\"post\">
                            <input type=\"text\" id=\"bid\" name=\"bid\">
                            <input type=\"submit\" value=\"Input your price\">
                        </form>
						
                    </div>
                </div>
            </body>
			</div>
        
        <script>
            var sellerTime = \"" . $row["seller_time"] . "\";
            var auctionTime = new Date(sellerTime);
            var timer = setInterval(function() {
                var now = new Date().getTime();
                var distance = auctionTime - now;
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                document.getElementById(\"timeLeft\").innerHTML = days + \"d \" + hours + \"h \"
                + minutes + \"m \" + seconds + \"s \";
                if (distance < 0) {
                    clearInterval(timer);
                    document.getElementById(\"timeLeft\").innerHTML = \"EXPIRED\";
                }
            }, 1000);
        </script>";}
	
	
    
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $now = new DateTime();
    $result = $dbc->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $sellerTime = new DateTime($row["seller_time"]);
        $current_price = floatval($row["price"]);
    if ($now->getTimestamp() > $sellerTime->getTimestamp()) {
        echo "<script>alert('The product is expired.');</script>";
    } else {
        $user_bid = floatval($_POST['bid']);
        if (!is_numeric($user_bid)) {
            echo "<script>alert('Your bidding must be a number!');</script>";
        } else if ($user_bid > $current_price) {
            $sql = "UPDATE $table SET price = $user_bid WHERE id = $product_id";
            if ($dbc->query($sql) === TRUE) {
                echo "<script>alert('Price is successfully registered');</script>";
            } else {
                echo "<script>alert('error: " . $dbc->error . "');</script>";
            }

            $sql = "UPDATE $table SET bids = bids + 1 WHERE id = $product_id";
            if ($dbc->query($sql) === TRUE) {
                echo "Bid count is successfully updated";
            } else {
                echo "<script>alert('error: " . $dbc->error . "');</script>";
            }
        } else {
            echo "<script>alert('Your price must be higher than the present price!');</script>";
        }
    }
}

}
}
?>
</div>
<?php
	include_once("footer.php");
	
	?>
