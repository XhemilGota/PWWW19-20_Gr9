<!DOCTYPE html>
<html>

<head>

    <?php include("header.php");?>
    
    <link href="css/buyStyle.css" rel="stylesheet">
    <link href="css/entry.css" rel="stylesheet">
    
    <script src="js/buyPage.js"></script>
    <title>Buy</title>


</head>
<body>
    <div id="body-part">
        <div id="wrapper">
        <?php include("menu.php");?>

        <div id="pageName">
            <h1>Buy</h1>
        </div>
        <form id="filter" action="Buy_Page1.php" method="get">
        <section id="filterData">
            <div>
                <select  id="filterByCity" name="city">
                <option>City</option>
                <option>New York</option>
                <option>San Francisco</option>
                <option>Los Angeles</option>
                <option>Chicago</option>
                <option>Houston</option>
                <option>Miami</option>
                <option>Malibu</option>
                <option>Texas</option>
            </select>
            </div>
            
            <div>
            <select  id="filterByMinPrice" name="minPrice">
                <option>Min Price</option>
                <option>$50,000</option>
                <option>$100,000</option>
                <option>$150,000</option>
                <option>$200,000</option>
                <option>$250,000</option>
                <option>$500,000</option>
                <option>$1,000,000</option>
                <option>$2,000,000</option>
                <option>$5,000,000</option>
                <option>$10,000,000</option>
            </select> 
            <select id="filterByMaxPrice" name="maxPrice">
                <option>Max Price</option>
                <option>$50,000</option>
                <option>$100,000</option>
                <option>$150,000</option>
                <option>$200,000</option>
                <option>$250,000</option>
                <option>$500,000</option>
                <option>$1,000,000</option>
                <option>$2,000,000</option>
                <option>$5,000,000</option>
                <option>$10,000,000</option>
            </select>
            </div>
            
            <div>
            <select id="filterByMinSqrfe" name="minSqrfe">
                <option>Min Square Feet</option>
                <option>200</option>
                <option>300</option>
                <option>400</option>
                <option>500</option>
                <option>1000</option>
                <option>2000</option>
                <option>3000</option>
                <option>4000</option>
                <option>5000</option>
                <option>10000</option>
            </select> 
            <select id="filterByMaxSqrfe" name="maxSqrfe">
                <option>Max Square Feet</option>
                <option>200</option>
                <option>300</option>
                <option>400</option>
                <option>500</option>
                <option>1000</option>
                <option>2000</option>
                <option>3000</option>
                <option>4000</option>
                <option>5000</option>
                <option>10000</option>
            </select>
            </div>
            <div>
            <select id="filterByBedrooms" name="bedrooms" value="1+">
                <option>No. of Bedrooms</option>
                <option >1+</option>
                <option>2+</option>
                <option>3+</option>
                <option>4+</option>
                <option>5+</option>
                <option>10+</option>
            </select>
            </div>
            <input type="submit" id="submit" name="submit" value="Search">
        </section>
        </form>
        
        <p id="write"></p>
        
        <section id="photoSection">
            <div class="photos" style="margin-top: 40px; ">
                <div id="notFound" style="display: none;">
                    <canvas id="emoji" width="1000" height="300" ></canvas>
                </div>
            
                <script src="js/Canvas.js"></script>

                <?php

                require_once("configDB.php");

                $conn=Database::getConnection();

                $city_query =isset($_GET['city']) && $_GET['city']!="City" ? " AND city LIKE ". "'%".$_GET['city']."%' " : "";
                $minPrice_query =isset($_GET['minPrice']) && $_GET['minPrice']!="Min Price" 
                ? "AND price >= ". preg_replace('/[^0-9]/', '', $_GET['minPrice']) ." " : "";
                $maxPrice_query =isset($_GET['maxPrice']) && $_GET['maxPrice']!="Max Price" 
                ? "AND price <= ". preg_replace('/[^0-9]/', '', $_GET['maxPrice']). " " : "";
                $minSqrfe_query =isset($_GET['minSqrfe']) && $_GET['minSqrfe']!="Min Square Feet" 
                ? "AND sqrfe >= ". preg_replace('/[^0-9]/', '', $_GET['minSqrfe']). " " : "";
                $maxSqrfe_query =isset($_GET['maxSqrfe']) && $_GET['maxSqrfe']!="Max Square Feet" 
                ? "AND sqrfe <= ". preg_replace('/[^0-9]/', '', $_GET['maxSqrfe']). " " : "";
                $bedrooms_query =isset($_GET['bedrooms']) && $_GET['bedrooms']!="No. of Bedrooms" 
                ? "AND bedroom >= ". preg_replace('/[^0-9]/', '', $_GET['bedrooms']). " " : "";

                if(isset($_GET["submit"]))
                {
                     $sql = "SELECT listings.Id, city, bedroom, bathroom, sqrfe, price, temp.imagePath
                             FROM listings,
                             (SELECT * FROM `house_photos` WHERE imagePath LIKE '%main%') as temp
                             WHERE listings.Id = temp.Id $city_query $minPrice_query $maxPrice_query $minSqrfe_query $maxSqrfe_query 
                             $bedrooms_query";
                }
                else
                {
                    $sql = "SELECT listings.Id, city, bedroom, bathroom, sqrfe, price, temp.imagePath
                            FROM listings,
                            (SELECT * FROM `house_photos` WHERE imagePath LIKE '%main%') as temp
                            WHERE listings.Id = temp.Id";
                }
                $result = mysqli_query($conn, $sql);
                $number_of_results = mysqli_num_rows($result);
                $results_per_page = 12;
                $number_of_pages = ceil($number_of_results/$results_per_page);
                if (!isset($_GET['page']))$page = 1;
                else $page = $_GET['page'];

                $this_page_first_result = ($page-1)*$results_per_page;

                $sql .= " LIMIT " . $this_page_first_result . ',' .  $results_per_page;
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) 
                { 
                  $count = 1;
                  while($row = mysqli_fetch_assoc($result)) 
                  {
                    $tempId=$row['Id']; 
                    $tempCity=$row['city'];
                    $tempBedroom=$row['bedroom'];
                    $tempBathroom=$row['bathroom'];
                    $tempSqrfe=$row['sqrfe'];
                    $tempPrice=$row['price'];
                    $tempImagePath=$row['imagePath'];
                    if($count%3==0)$tempClass_Name = "imgBox lastBox";
                    else $tempClass_Name = "imgBox";
                    $count++;
                    echo 
                        "<script>
                            var index = '$tempId';
                            var city = '$tempCity';
                            var bedroom = '$tempBedroom';
                            var bathroom = '$tempBathroom';
                            var sqrfe = '$tempSqrfe';
                            var price = '$tempPrice';
                            var imagePath = '$tempImagePath';
                            var class_Name='$tempClass_Name';
                        </script>";
                    echo "<script src='js/printListings.js'></script>";
                  }
                }
                else 
                {
                    echo "<script>
                            document.getElementById('notFound').style.display='block';
                         </script>";
                }
            echo "</div>";
            echo "<div id='navigationWrapper'>";
            for ($page=1;$page<=$number_of_pages;$page++) 
            {
                $url =  "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
                $escaped_url = htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' );
                $a="";
                if(strpos($escaped_url, '?'))
                {   
                    $a = explode("?", $escaped_url)[1];
                    $search = "page";
                    if(preg_match("/{$search}/i", $a)) {
                        $a = substr($a, 11);
                    }
                }                
                echo '<a class="buyPageNavigator" href="Buy_Page1.php?page=' . $page . "&$a". '">' . $page . '</a> ';                
            }
            echo"</div>";
                ?>                
            </div>
        </section>
    </div>
</div>

           <div id="slideshow">

                        <div>
                            <p id="pageNum"></p>
                        </div>

                <div id="slideshow2">
                    <img src="" id="slideshowImg">
                    
                    <video  controls id="slideshowVideo" style="display: none">
                        <source src="" type="video/mp4">
                        <source src="" type="video/ogg">
                    </video>
                    
                    <div class="imgInfo">
                        
                        <p id="hoverText"></p>
                        
                    </div>

                    <div class="prev" onclick="plusSlides(-1)"><p>&#10094;</p></div>
                    <div class="next" onclick="plusSlides(1)"><p>&#10095;</p></div>
                    <a class="closeBtn" onclick="document.getElementById('slideshow').style.display = 'none'; unBlurOthers();">&times;</a>
                    <div id="descriptionBtn" onclick="descriptionExpand();"> &#10094; </div>
                </div>

                 <div id="description">
                        
                         <div id="map" style="width:450px; height: 350px; float:right; margin: 30px 150px 0 0; border: 1px solid white;">
                            
                        </div>
                     
                     <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDBxeeraroriooA1NxYn6QW6NLlYlvQvn4&callback=initMap">
                         
                     </script>
                        
                        <div style="width:400px; height:400px; margin-bottom: 30px;">
                        <p class="imp" id="street"></p>
                        <p class="imp" id="price">$</p>
                        <p id="city"></p>
                        <p id="bedroom"></p>
                        <p id="bathroom"></p>
                        <p id="sqrt"></p>
                        <p id="downPayment"></p>
                        <p id="installment"></p>
                        </div>

                        <h2>Description</h2>

                        <p id="descriptionText"></p>

                        <p>If you're interested in this property, then <a onclick="propertyIndex();" href="interestedContact.html" id="descriptionContact" target="blank">Contact Us</a></p>
                        <p>Did you like this? Then check our <a href="top10.html">top 10 houses</a> this year.</p>

                    </div>
            </div>

            <?php include("footer.php");?>
        <script src="js/general.js" onload="changeColorOfMenu('buy')"></script>

    </body>
</html>

