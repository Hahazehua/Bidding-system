<?php
$page_title = "Home Page";
require("header.php");
?>
<title>WUHANG</title>

    <style>
	#image-container {
    display: flex;
    flex-direction: column;
    align-items: center;
}

    #image-container img {
    width: 100%; 
    height: auto;  
    object-fit: cover;
    margin-bottom: 5px;
}
		 #image-container p {
        color: white;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        font-weight: bold;
        text-align: center; 
        position: relative;     
        padding-top: 50px; /* Adjust this value to position the text in the middle of the space */
        max-width: 100%; /* Ensure the text does not overflow its parent */
        white-space: nowrap; /* Prevent the text from wrapping to the next line */
	
		}
		#image-container a {
        text-decoration: none; /* Remove underline from links */
    }
		
		
		
		

       
    </style>
    <script>
        var _hmt = _hmt || [];
        (function () {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?294bf634eac03fa80fd410b49422ded8";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
<div id="content">
    <body>
		 <div id="image-container">
        <a href="product1.php">
            <img src="P0.avif" alt="Your Image">
			 <p>FRAGRANCE J'ADORE</p> 
        </a>
			
	    <a href="product2.php"><img src="P5.webp" alt="SAFAS">
			 <p>ROUGE DIOR</p> 
			 </a>
        
        
			<a href="product3.php">
			<img src="P2.avif" alt="SAFAS">
			<p>FRAGRANCE DIOR HOMME</p> 
			 </a>
        
        <a href="product4.php">
            <img src="P3.avif" alt="SAFAS">
			<p>FRAGRANCE COLOGNE</p> 
        </a>
        
        <a href="">
            <img src="P4.webp" alt="SAFAS">
			<p>SPRING 2024 COLLECTION</p> 
        </a>
        

        
        
        <a href="">
			<img src="P6.avif" alt="SAFAS">
			<p>PROFESSIONAL INSPIRED APPLICATOR</p> 
			 </a>
        
			 
		
    </body>
		






	
<?php
	include_once("footer.php");
	?>