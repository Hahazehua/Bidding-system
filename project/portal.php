<!DOCTYPE html>
<html>
<?php
include 'header.php';

?>

<head>
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
        }

        .bg {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .small-img {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            margin: auto;
            width: 500px;
        }

        .search-img {
            position: absolute;
            top: 10px;
            right: 70px;
            width: 50px;
            height: 50px;
        }

        .SC-img {
            position: absolute;
            top: 10px;
            right: 150px;
            width: 50px;
            height: 50px;
        }

        .employ {
            display: inline-block;
            font-size: 2em;
            background: #fff;
            padding: 10px 30px;
            text-decoration: none;
            color: #111;
            margin-top: 40px;
            transition: 0.2s;
        }
    </style>
</head>

<body>

    <video class="bg" autoplay muted loop>
        <source src="v1.mp4" type="video/mp4">
    </video>
    <a href="portal.php"><img class="small-img" src="ICON3.png"></a>
    <a href="search.php"><img class="search-img" src="search.png"></a>
    <img class="SC-img" src="SHOPPINGCART.png">
    <a href="Mainpage.php">
        <div
            style="text-align: center; position: fixed; bottom: 200px; left: 50%; transform: translateX(-50%); width: 10%; height: 50px; background-color: transparent; border: 1px solid white; color: white; font-size: 24px;font-family: Arial;">
            SHOP NOW
        </div>
		 </a>
		 <a href="sell.php">
		 <div
            style="text-align: center; position: fixed; bottom: 300px; left: 50%; transform: translateX(-50%); width: 10%; height: 50px; background-color: transparent; border: 1px solid white; color: white; font-size: 24px;font-family: Arial;">
            SELL NOW
        </div>
    </a>


</body>

</html>