<!DOCTYPE html>
<html>

<head>

    <?php include("header.php");

    require_once("validator/ContactValidator.php");

    if(isset($_POST['submit']))
    {
        $validatorObj = new ContactValidator();

        $errors = $validatorObj -> getErrors();

        if(count($errors) == 0)
        {
            require_once("configDB.php");

            $conn = Database::getConnection();

            $sql = "INSERT INTO newsletter (email, first_name, last_name, phone_number, comments_questions)
            VALUES ('".$_POST["email_address"]."', '".$_POST["first_name"]."', '".$_POST["last_name"]."', '".$_POST["phone_number"]."', '".$_POST["comments_questions"]."')";

            $conn->query($sql);
        }
    }

    function showError($field, $text)
    {
        if(isset($GLOBALS["errors"]) && isset($GLOBALS["errors"][$field]))
        {
            $errors = $GLOBALS["errors"];
            echo $errors[$field] . '" style= "border: 1px solid red; ';
        }
        else
        {
            $temp = "";

            if(isset($_POST[$field]))
            {
                $temp = $_POST[$field];
            }
            echo $text . '" value="'.$temp.'"';
        }
    }?>

    <link href="css/contactStyle.css" rel="stylesheet">
    
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
                <form id="contact-form" method="post" autocomplete="on" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>">
                    <input class="name" type="text" placeholder="<?php showError('first_name', "First Name") ?>" name="first_name" required>
                    <input class="name" type="text" placeholder="<?php showError('last_name', "Last Name") ?>" name="last_name" required><br>
                    <input class="" type="email" placeholder="<?php showError('email_address', "Email") ?>" name="email_address" required><br>
                    <input type="tel" placeholder="<?php showError('phone_number', "Phone Number")?>" name="phone_number" required><br>
                    <input class="name" type="text" readonly name="latitude" id="latitude" value="Latitude: ">
                    <input class="name" type="text" readonly name="longitude" id="longitude" value="Longitude: "><br>
                    <input type="text" id="date" readonly><br>
                    <textarea class="" rows="5" cols="50" required placeholder="<?php showError('comments_questions', "Comments/Questions") ?>" name="comments_questions"></textarea><br>
                    <input type="submit" name="submit" value="SEND">
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