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
    font-size: 50px;
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
    font-size: 60px;
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


$sql = "SELECT id,pname, price, image_url,description, seller, category,  stars,seller_time, features FROM product WHERE id = $product_id"; 
$result = $dbc->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "
        <div id=\"content\">
            <body>
                <div class=\"container\">
                    <div class=\"image-container\">
                        <img src=\"" . $row["image_url"] . "\" alt=\"Product Image\">
                        <!-- 添加更多的图片 -->
                    </div>
                    <div class=\"info-container\">
					<div id=\"timeLeft\" class = \"time\">Loading...</div>
                        <h1>" . $row["pname"] . "</h1>
                        <p id=\"p1\">Modal:" . $row["features"] . "<br>" . $row["description"] . "<br></p>
                        <p id=\"p2\">Price now: $" . $row["price"] . "</p>
                        <p id=\"p3\">The product is available for immediate auction online. </p>
                        <p id=\"p4\">Enter your bid:</p>
                        <form action= method=\"post\">
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
}
	
	
    else {
		//request method is POST
		if (empty($_POST['price'])){
			echo'<p class=error>First name cannot be empty!</p>';
}
	if(isset($price)){
			require('db_connect.php');
			
			$sql = "INSERT INTO product (price)
			        VALUES ('$price',NOW())";
			$result = mysqli_query($dbc,$sql);
		
			
			if($result)
				//succeed
				echo "<h2>You are registered!</h2>";
			else{
				//failed
				echo "<h2>Failed to register!</h2>";
				echo '<p>'.mysqli_error($dbc)."</p><p>Query:$sql</p>";
				echo'<p><a herf="">Please try again</a></p>';
			}
				
				
		} else
			echo'<p><a href="">Please try again</a></p>';
	}
	

?>
</div>
<?php
	include_once("footer.php");
	
	?>
