<!DOCTYPE html>
<html>

    <head>
        <?php include("header.php");?>
 
        <link href='css/homepagestyle.css' rel='stylesheet'>
        <link href='css/entry.css' rel='stylesheet'>
    </head>

    <body>
    <div id="body-part">
        <!--Wrapper div used to work with this part as a whole-->
        <div id="wrapper">
        <?php include("menu.php");?>

        <section id="firstSection">
        <section id="slideSection" style="cursor: pointer;">
            <p id="whichIndex" style="display: none">1</p>
            <img  width="715" height="400" id="slide" onclick="window.location='Buy_Page1.php';">
        </section>

       <div id="sideTitle">
           <h1 id="title">$500,000</h1>
           
           <p id="slideCaption"></p>
           
           
           <input type="button" onclick="window.location='Buy_Page1.php';" value="SEE MORE &raquo;">

           
       </div>
   </section>

   <?php 
   echo ' <script>
       
           var images = ["img/homes/main1.jpg","img/homes/main2.jpg", "img/homes/main3.png", "img/homes/main4.png"];
           var titles = ["CHARMING COTTAGE", "BACKYARD PARADISE", "STUNNING CLASSIC" , "SPARKLING POOL"];
           var quotes = ["&quot;The house you looked at today and wanted to think about until tomorrow may be the same house someone looked at yesterday and will buy today.&quot;", "&quot;Winter is the time for comfort, for good food and warmth, for the touch of a friendly hand and for a talk beside the fire: it is the time for home.&quot;", "&quot;Chase your dreams but always know the road that will lead you home again.&quot;", "&quot;Owning a home is a keystone of wealth&rsquo; both financial affluence and emotional security.&quot;"];
           var step=0;
           var whichAnimation=0;
           var indexOfPhoto =[1,9,10,5];
           function slideit(){
           
             if(whichAnimation>1)
             {
                 whichAnimation=0;
             }
             document.getElementById("slide").src=images[step];
             document.getElementById("slide").style.animation="ani"+whichAnimation+" 5s linear";
             document.getElementById("whichIndex").innerHTML=indexOfPhoto[step];
             document.getElementById("slideCaption").style.animation="textani"+whichAnimation+" 5s linear";
             document.getElementById("slideCaption").innerHTML=quotes[step];
             whichAnimation++;
             
             document.getElementById("title").innerHTML=titles[step];
             
             if (step<images.length-1)
             {
               step++;
             }
             else 
             {
               step=0;
             }
             setTimeout(slideit,5000);
           }
           document.addEventListener("onload", slideit());
       </script>
       ';
       ?>

  <section id="secondSection">
       <div style="margin-top: 50px">
           <h1>EXCLUSIVE PROPERTIES</h1>
           <em>"Finding a new home can be difficult. Here on Truestate, we make it easy by providing<br>the newest listings all in one place so you can keep up to date "
           </em>
       </div>

       <div class="photos" style="margin-top: 50px">
  
           <?php

                $cookies = [];
                if (isset($_COOKIE['listingCookie'])) {
                    foreach ($_COOKIE['listingCookie'] as $name => $value) {
                        if(in_array($value, $cookies))
                        {
                            $cookies[array_search($value, $cookies)] = -1;
                        }
                        $cookies[] = $value;
                    }
                }
                
                include("configDB.php");

                $conn = Database::getConnection();

                $ID = [];

                for($i = 0; $i < count($cookies); $i++)
                {
                    if($cookies[$i] != -1)
                        $ID[] = $cookies[$i];
                }
                
                $ID = array_reverse($ID);

                $idCount = count($ID);

                $query = "SELECT Id, price FROM listings";

                $query_result = mysqli_query($conn, $query);

                $num_of_listings = mysqli_num_rows($query_result);
                
                $rndArray = [];

                while((count($rndArray) + $idCount) < 9)
                {
                    $rnd = rand(1,$num_of_listings - 1);

                    if(!in_array($rnd, $ID) && !in_array($rnd, $rndArray))
                    {
                        $rndArray[] = $rnd;
                    }
                }

                sort($rndArray);

                for($i = $idCount; $i < 9; $i++)
                {
                    $ID[$i] = $rndArray[$i - $idCount];
                }
                
                require_once("printListings.php");

                $printer = new Printer($conn);

                $printer -> printListings($ID);    

            ?>
                   
                        
                        </div>

                        <input onclick="window.location.href = 'Buy_Page1.php';" type="button" value="VIEW THE FULL GALLERY &raquo;" class="viewfullgallery">
                    </section>
        
            </div>
         </div>

           

        <?php include("footer.php");?>
        
        <script src="js/general.js" onload="changeColorOfMenu('homepage')"></script>
    </body>
       
</html>