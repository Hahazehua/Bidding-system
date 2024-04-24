<?php
$page_title = "product1";
require("header.php");
?>
<style>
	@import url('https://fonts.googleapis.com/css?family=Fjalla+One|Montserrat:300,400,700,800|Open+Sans:300');

.container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}

.card{
  flex: 0 1 calc(50% );
  margin-bottom: 20px;
  box-shadow: 0 6px 6px rgba(#000, 0.3);
  transition: 200ms;
  background: #fff;
  
  .card__title{
    display: flex;
    align-items: center;
    padding: 30px 40px;
    
    h3{
      flex: 0 1 200px;
      text-align: right;
      margin: 0;
      color: #252525;
      font-family: sans-serif;
      font-weight: 600;
      font-size: 20px;
      text-transform: uppercase;
    }
    
    .icon{
      flex: 1 0 10px;
      background: #252525;
      color: #fff;
      padding: 10px 10px;
      transition: 200ms;
      
      > a{
        color: #fff;
      }
      
      &:hover{
        background: #252525;
      }
    }
  }
  
  .card__body{
    padding: 0 40px;
    display: flex;
    flex-flow: row no-wrap;
    margin-bottom: 25px;
    
    > .half{
      box-sizing: border-box;
      padding: 0 15px;
      flex: 1 0 50%;
    }
    
    .featured_text{
      h1{
        margin: 0;
        padding: 0;
        font-weight: 800;
        font-family: "Montserrat", sans-serif;
        font-size: 64px;
        line-height: 50px;
        color: #181e28;
      }
      
      p{
        margin: 0;
        padding: 0;
        
        &.sub{
          font-family: "Montserrat", sans-serif;
          font-size: 26px;
          text-transform: uppercase;
          color: #686e77;
          font-weight: 300;
          margin-bottom: 5px;
        }
        
        &.price{
          font-family: "Fjalla One", sans-serif;
          color: #252525;
          font-size: 26px;
        }
      }
    }
    
    .image{
      padding-top: 15px;
      width: 100%;
      
      img{
        display: block;
        max-width: 100%;
        height: auto;
      }
    }
    
    .description {
    margin-bottom: 25px;
}

.description p {
    margin: 0;
    font-family: "Open Sans", sans-serif;
    font-weight: 300;
    line-height: 27px;
    font-size: 16px;
    color: #555;
}

	  .features {
    padding: 20px;
    background-color: #FFFFFF;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
    margin-top: 20px;
	font-family: "Open Sans", sans-serif;
    font-weight: bold;
}

.features p {
    font-family: 'Open Sans', sans-serif;
    font-size: 16px;
    color: #252525;  
    line-height: 1.6;
}

.features p.price {
    font-weight: bold;
    color: #252525; 
}

}
span.stock {
    font-family: "Montserrat", sans-serif;
    font-weight: 600;
    color: #a1cc16;
}


.reviews > span {
    font-family: "Open Sans", sans-serif;
    font-size: 14px;
    margin-left: 5px;
    color: #555;
}

.card__footer {
    padding: 30px 40px;
    display: flex;
    flex-flow: row no-wrap;
    align-items: center;
    position: relative;
}

.card__footer::before {
    content: "";
    position: absolute;
    display: block;
    top: 0;
    left: 40px;
    width: calc(100% - 40px);
    height: 3px;
    background: #252525;
    background: linear-gradient(to right, #252525 0%,#252525 100%,#ddd 0%,#ddd 100%);
}

.card__footer .recommend {
    flex: 1 0 10px;
}

.card__footer .recommend p {
    margin: 0;
    font-family: "Montserrat", sans-serif;
    text-transform: uppercase;
    font-weight: 600;
    font-size: 14px;
    color: #555;
}

.card__footer .recommend h3 {
    margin: 0;
    font-size: 20px;
    font-family: "Montserrat", sans-serif;
    font-weight: 600;
    text-transform: uppercase;
    color: #252525;
}

.card__footer .action button {
    cursor: pointer;
    border: 1px solid #252525;
    padding: 14px 30px;
    border-radius: 200px;
    color: #fff;
    background: #252525;
    font-family: "Open Sans", sans-serif;
    font-size: 16px;
    transition: 200ms;
}

.card__footer .action button:hover {
    background: #fff;
    color: #252525;
}


	
	</style>
</head>

<body>
  <main>
	  <div class="container">
  <div id="content">
	<?php
	require("db_connect2.php");
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if (!$dbc) {
    die("error connect：" . mysqli_connect_error());
    }
	
	$sql = "SELECT id,pname, price, image_url,description, seller, category, seller_time, features,bids FROM product2"; 
    $result = $dbc->query($sql);

    if ($result->num_rows > 0) {
    echo '<div class="container">';
    while ($row = $result->fetch_assoc()) {
        echo '<div class="card">
                <div class="card__title">
                  <div class="icon">
                    <a href="Mainpage.php"><i class="fa fa-arrow-left"></i></a>
                  </div>
                  <h3 id="timeLeft_' . $row["id"] . '">Loading...</h3>
                </div>
                <div class="card__body">
                  <div class="half">
                    <div class="featured_text">
                      <h1>' . $row["pname"] . '</h1>
                      <p class="sub">' . $row["category"] . '</p>
                      <p class="price">¥' . $row["price"] . ' NOW!</p>
                    </div>
                    <div class="image">
                       <img src="' . $row["image_url"] . '" alt="">
                    </div>
                  </div>
                  <div class="half">
                    <div class="description">
                      <p>' . $row["description"] . '</p>
                    </div>
                    <div class="features">
                      <p>Product Modal:' . $row["features"] . '</p>
                    </div>
                    <span class="stock"><i class="fa fa-pen"></i>' . $row["bids"] . ' bids</span>
                    <div class="reviews">
                      <span>(64 reviews)</span>
                    </div>
                  </div>
                </div>
                 <div class="card__footer">
                      <div class="recommend">
                        <p>Selled by</p>
                        <h3>' . $row["seller"] . '</h3>
                      </div>
                      <div class="action">
                        <a href="product_detail.php?page=product2&id=' . $row["id"] . '"><button type="button">Go for bid</button></a>
                      </div>
                    </div>
                  </div>';
        echo '<script>
               var sellerTime = "' . $row["seller_time"] . '";
                var auctionTime = new Date(sellerTime);
                var timer = setInterval(function() {
                    var now = new Date().getTime();
                    var distance = auctionTime - now;
                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                    document.getElementById("timeLeft_' . $row["id"] . '").innerHTML = days + "d " + hours + "h "
                    + minutes + "m " + seconds + "s ";
                    if (distance < 0) {
                        clearInterval(timer);
                        document.getElementById("timeLeft_' . $row["id"] . '").innerHTML = "EXPIRED";
                    }
                }, 1000);
              </script>';
    }
    echo '</div>';
} else {
    echo "No information";
}
?>

	



</div>
<?php
	include_once("footer.php");
	
	?>
