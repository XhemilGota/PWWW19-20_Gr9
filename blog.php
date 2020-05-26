<!DOCTYPE html>
<html>

    <head>

        <?php include("header.php");?>
        <link href="css/blog.css" rel="stylesheet">
        
        <title>Blog</title>

    </head>

    <div id="body-part">
        <!--Wrapper div used to work with this part as a whole-->
        <div id="wrapper">
        <?php include("menu.php");?>

            <div id="pageName">
            	<h1>Blog</h1>
        	</div>

            <div class="blog-container">
  				<div class="blog-item" onclick="window.open('blog-1.html');">
  					<div class="blog-item-card-x">
  						
  						<div class="blog-card-front" style="background-image: url(img/blog/blog-1.jpg); background-size: cover; background-blend-mode: overlay;">
  							
  							<h3>Getting Started: 1</h3>
  						</div>

  						<div class="blog-card-back-x">
  							<h3>Buying and Selling a House at the Same Time: Where to Begin</h3>
  						</div>

  					</div>
  				</div>
			    
			    <div class="blog-item" onclick="window.open('blog-2.html');">
  					<div class="blog-item-card">
  						
  						<div class="blog-card-front" style="background-image: url(img/blog/blog-2.jpg); background-size: cover;background-blend-mode: overlay;">
  							
  							<h3>Getting Started: 2</h3>
  						</div>

  						<div class="blog-card-back">
  							<h3>Understanding the Differences: Real Estate Broker vs. Agent</h3>
  						</div>

  					</div>
  				</div>

  				<div class="blog-item" onclick="window.open('blog-3.html');">
  					<div class="blog-item-card-x">
  						
  						<div class="blog-card-front" style="background-image: url(img/blog/blog-3.jpg); background-size: cover;background-blend-mode: overlay;">
  							<h3>Getting Started: 3</h3>
  						</div>

  						<div class="blog-card-back-x">
  							<h3>Homeownership 101: Are You Ready?</h3>
  						</div>

  					</div>
  				</div>

  				<div class="blog-item" onclick="window.open('blog-4.html');">
  					<div class="blog-item-card">
  						
  						<div class="blog-card-front" style="background-image: url(img/blog/blog-4.jpg); background-size: cover; background-blend-mode: overlay;">
  							<h3>Money Matters: 1</h3>
  						</div>

  						<div class="blog-card-back">
  							<h3>What Is a Mortgage and How Does It Work?</h3>
  						</div>

  					</div>
  				</div>

  				<div class="blog-item" onclick="window.open('blog-5.html');">
  					<div class="blog-item-card-x">
  						
  						<div class="blog-card-front" style="background-image: url(img/blog/blog-5.jpg); background-size: cover; background-blend-mode: overlay;">
  							<h3>Money Matters: 2</h3>
  						</div>

  						<div class="blog-card-back-x">
  							<h3>Is Getting Pre-approved for a Home Loan the Same as Pre-qualifying?</h3>
  						</div>

  					</div>
  				</div>

  				<div class="blog-item" onclick="window.open('blog-6.html');">
  					<div class="blog-item-card">
  						
  						<div class="blog-card-front" style="background-image: url(img/blog/blog-6.jpg); background-size: cover; background-blend-mode: overlay;">
  							<h3>Money Matters: 3</h3>
  						</div>

  						<div class="blog-card-back">
  							<h3>What Type of Mortgage Is Best for You?</h3>
  						</div>

  					</div>
  				</div>
			            
        </div>
    </div>


    <?php include("footer.php");?>
    
        <script src="js/general.js" onload="changeColorOfMenu('aboutUs')">
         </script>
    </body>
</html>