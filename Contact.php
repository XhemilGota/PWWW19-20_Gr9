<!DOCTYPE html>
<html>

<head>

    <?php include("header.php");?>

    <link href="css/contactStyle.css" rel="stylesheet">
    
    <script src="js/contactValidation.js"></script>
    
    <title>Contact</title>

</head>
<div id="body-part">
    <!--Wrapper div used to work with this part as a whole-->
    <div id="wrapper">
        <?php include("menu.php");?>

        <div id="pageName">
            <h1>Contact</h1>
        </div>

        <section>
            <div class="form-wrapper"  style="float:left">
                <form id="contact-form" method="post"  autocomplete="on" onsubmit="return checkForErrors()" action="">
                    <input class="name required" type="text" placeholder="First Name" name="first_name">
                    <input class="name required" type="text" placeholder="Last Name" name="last_name"><br>
                    <input class="required" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Email Address" name="email_address"><br>
                    <input type="tel" placeholder="Phone Number" name="phone_number"><br>
                    <input class="name" type="text" readonly name="latitude" id="latitude" value="Latitude: ">
                    <input class="name" type="text" readonly name="longitude" id="longitude" value="Longitude: "><br>
                    <input type="text" id="date" readonly><br>
                    <textarea class="required" rows="5" cols="50" placeholder="Comments/Questions" name="comments_questions"></textarea><br>
                    <input type="submit" value="SEND">
                </form>
            </div>

            <script>
                var d = new Date();
                var month = d.getMonth()+1;
                var day = d.getDate();
                var year = d.getFullYear();
                if(day/10<1)
                {
                    day = "0"+day;
                }
                
                var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                month = months[month];
                document.getElementById("date").value=day + " " + month + " " + year;
            </script>
            
            <div class="mapstyle" id="map" style="width:275px; height:200px; border:3px double #EDEDED">
                
                <script src="js/contact.js"></script>
                <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDBxeeraroriooA1NxYn6QW6NLlYlvQvn4&callback=initMap">
                </script>
            </div>
            
            
            <div id="mapCaption">Your Location</div>
        </section>
    </div>
    <img class="housing-logos" src="img/contact/ehq.png" width="55">
    <img class="housing-logos" src="img/contact/realtor.png" width="55">
</div>

<?php include("footer.php");?>

 <script src="js/general.js" onload="changeColorOfMenu('contact')"></script>

</body>
</html>