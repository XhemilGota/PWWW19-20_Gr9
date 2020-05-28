<!DOCTYPE html>
<html>

    <head>
        <?php 
        
            include("header.php");

            $views = 0;
            $visitors_file = "visitors.txt";

            if (file_exists($visitors_file))
            {
                $views = (int)file_get_contents($visitors_file); 
            }

            $views++;

            $views %= 9;

            file_put_contents($visitors_file, $views);
        
        ?>

        <link href='css/homepagestyle.css' rel='stylesheet'>
        <link href='css/entry.css' rel='stylesheet'>

        <?php       

            include("configDB.php");

            $conn=Database::getConnection();

            $listing_ID = intval($_GET['id']);
            
            setcookie("listingCookie[".$views."]", $listing_ID, time() + 86400);

            $listing_data_query = "SELECT * FROM listings WHERE Id = $listing_ID";

            $query_result = mysqli_query($conn, $listing_data_query);

            $listing_data = mysqli_fetch_assoc($query_result);

            $listing_photos_query = "SELECT imagePath FROM house_photos WHERE Id = $listing_ID";

            $query_result = mysqli_query($conn, $listing_photos_query);

            $listing_photos;
            while($row = mysqli_fetch_array($query_result, MYSQLI_ASSOC))
            {
                //print_r($row);
                $listing_photos[] = $row['imagePath'];
            }
            
            echo "<script> var photos=[];";
            
            for($i = 0; $i < count($listing_photos); $i++)
            {
                echo "photos[". $i . "] = '". $listing_photos[$i] . "';";
            }
            echo 
            "var index = 0;" .
            "var lat = " . $listing_data['lat'] . ";" .
            "var lng = " . $listing_data['lng'] . ";" .
            "</script>";
        ?>
    </head>

    <body>
    <div id="body-part">
        <!--Wrapper div used to work with this part as a whole-->
        <div id="wrapper">
            <?php include("menu.php");   ?>
        <div id="slideshow">

        

        <div id="slideshow2">
        <img src="" id="slideshowImg" style="max-width: 100%;">

        <div>
            <p id="pageNum">5/8</p>
        </div>

        <div class="prev" onclick="plusSlides(-1)"><p>&#10094;</p></div>
        <div class="next" onclick="plusSlides(1)"><p>&#10095;</p></div>

        </div>

        <div id="description">

        <div id="map" style="width:450px; height: 350px; float:right; margin: 30px 150px 0 0; border: 1px solid white;">
            
        </div>

        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDBxeeraroriooA1NxYn6QW6NLlYlvQvn4&callback=initMap">
        
        </script>

        <div style="width:400px; height:400px; margin-bottom: 30px;">
            <p class="imp" id="street"><?php echo $listing_data['street'] ?></p>
            <p class="imp" id="price">
                <?php 
                      echo number_format($listing_data['price'], 2); 
                ?>$
            </p>
            <p id="city"><?php echo $listing_data['city'] ?></p>
            <p id="bedroom">Bedrooms: <?php echo $listing_data['bedroom'] ?></p>
            <p id="bathroom">Bathrooms: <?php echo $listing_data['bathroom'] ?></p>
            <p id="sqrt"><?php echo $listing_data['sqrfe'] ?> sqft</p>
            <p id="downPayment">Down payment: <?php echo number_format($listing_data['price']*0.1,2) ?>$</p>
            <p id="installment">Monthly installment: <?php echo number_format($listing_data['price']/(20 * 12),2) ?>$</p>
        </div>

        <h2>Description</h2>

        <p id="descriptionText"><?php echo $listing_data['description'] ?></p>

        <p>If you're interested in this property, then <a href=<?php echo '"interestedContact.php?Id=' . $listing_ID . '"'?> id="descriptionContact" target="blank">Contact Us</a></p>
        </div>
    </div>


        </div>
    </div>

        <?php include("footer.php");?>
        
        <script src="js/general.js" onload="changeColorOfMenu('homepage')"></script>
        <script src="js/homepage.js"></script>
        
    </body>
       
</html>