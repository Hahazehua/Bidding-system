<?php
$page_title = "product1";
require("header.php");
?>
<style>
        body {
            font-family: Arial, sans-serif;
        }
        form {
            width: 300px;
            margin: 0 auto;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
	
	.form-group select {
            width: 107%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .form-group button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
			display: block;
            margin: auto;
        }
        .form-group button:hover {
            background-color: #0056b3;
			
        }
	
	     h1 {
        color: white;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        font-weight: bold;
        text-align: center; 
        position: relative;     
        max-width: 100%; 
        white-space: nowrap; 
	    text-align: center;
	    font-size: 50px
	
		}
    </style>
<?php
if ($_SERVER['REQUEST_METHOD']=="GET")  {
		echo'
<div id="content">
	<h1>Register your product information to sell product</h1> 
	<form method="POST" action="">
        <div class="form-group">
            <label for="productName">Product name</label>
            <input type="text" id="productName" name="productName" required>
			</div>
        
        <div class="form-group">
            <label for="productPrice">Product Starting Price</label>
            <input type="number" id="productPrice" name="productPrice" required>
			</div>
		<div class="form-group">
            <label for="productdescription">Product Description</label>
            <input type="text" id="productdescription" name="productdescription" required>
			</div>
		<div class="form-group">
            <label for="seller">Product seller name</label>
            <input type="text" id="seller" name="seller" required>
			</div>
		<div class="form-group">
            <label for="productfeature">Product Feature</label>
            <input type="text" id="productfeature" name="productfeature" required>
			</div>
		<div class="form-group">
            <label for="productbrand">Product Brand</label>
            <input type="text" id="productbrand" name="productbrand" required>
			</div>
		<div class="form-group">
           <label for="producttime">Selling Ending Time</label>
           <input type="datetime-local" id="producttime" name="producttime" required>	
        </div>
		<div class="form-group">
    <label for="url1">Put Your Product Picture1</label>
    <input type="url" id="url1" name="url1" required>	
</div>
<div class="form-group">
    <label for="url2">Put Your Product Picture2</label>
    <input type="url" id="url2" name="url2" required>	
</div>
<div class="form-group">
    <label for="url3">Put Your Product Picture3</label>
    <input type="url" id="url3" name="url3" required>	
</div>
<div class="form-group">
    <label for="url4">Put Your Product Picture4</label>
    <input type="url" id="url4" name="url4" required>	
</div>
<div class="form-group">
    <label for="url5">Put Your Product Picture5</label>
    <input type="url" id="url5" name="url5" required>	
</div>
<div class="form-group">
    <label for="productType">Choose Product Type</label>
    <select id="productType" name="productType" required>
        <option value="product1">Perfume</option>
        <option value="product2">Lipstick</option>
		<option value="product3">Eye cream</option>
		<option value="product4">Cream</option>
		<option value="product5">Eyeshodow</option>
		<option value="product6">Others</option>
    </select>
</div>
 <div class="form-group">
            <button type="submit">Submit</button>
        </div>
    </form>
</div>';
}
	

else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productDescription = $_POST['productdescription'];
    $seller = $_POST['seller'];
    $productFeature = $_POST['productfeature'];
    $productBrand = $_POST['productbrand'];
    $productTime = $_POST['producttime'];
    $url1 = $_POST['url1'];
    $url2 = $_POST['url2'];
    $url3 = $_POST['url3'];
    $url4 = $_POST['url4'];
    $url5 = $_POST['url5'];
	$productType = $_POST['productType'];

    
    require("db_connect2.php");
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (!$dbc) {
    die("error connect：" . mysqli_connect_error());
}
	

    
    $sql = "INSERT INTO $productType (pname, price, description, seller, features, category, seller_time, image_url, url2, url3, url4, url5) VALUES ('$productName', '$productPrice', '$productDescription', '$seller', '$productFeature', '$productBrand', '$productTime', '$url1', '$url2', '$url3', '$url4', '$url5')";

    if (mysqli_query($dbc, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($dbc);
    }

    
    mysqli_close($dbc);
}
?>


</div>
<?php
	include_once("footer.php");
	
	?>