<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Website</title>
    <style>
        
        body {
            margin: 0;
            padding: 0;
            background-color: #000; 
            color: #fff; 
            font-family: Arial, sans-serif;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            padding: 20px;
            align-items: flex-start; 
            border-bottom: 1px solid #fff; 
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
        }
        .fun-links {
    position: fixed;
    top: 4%;  
    right: 2%;  
    display: flex;
    gap: 20px;
    font-family: Serif;
		}
        .login-links a {
            color: #fff;
            text-decoration: none;
            font-size: 24px;
        }
        .small-icon {
            width: 250px; 
            
        }
        .search-icon {
            width: 50px; 
            margin-top: -15px;
			margin-right: 20px;
            
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">
			<a href="portal.php"><img src="ICON3.png" alt="Your Logo" class="small-icon"></a>
        </div>
        <div class="fun-links">
            <img src="search.png" alt="Your Logo" class="search-icon">
            <img src="SHOPPINGCART.png" alt="Your Logo" width="56" height="48" class="search-icon">
        </div>
    </div>
    
</body>
</html>