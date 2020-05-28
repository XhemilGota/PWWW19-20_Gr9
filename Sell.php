<!DOCTYPE html>
<html>

    <head>

        <?php include("header.php");?>

        <link href="css/sellstyle.css" rel="stylesheet">
        
        <script src="js/sell.js"></script>
        
        <title>Sell</title>

    
<?php 
    require_once("validator/SellValidator.php");

    if(isset($_POST['submit']))
    {
        $validatorObj = new SellValidator;

        $errors = $validatorObj -> getErrors();

        if(count($errors) == 0)
        {
            require_once("configDB.php");

            $conn = Database::getConnection();


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
            echo 'Enter '. $text . '" value="'.$temp.'"';
        }
    }
?>
</head>
    <body>
        <div id="body-part">
            <!--Wrapper div used to work with this part as a whole-->
            <div id="wrapper">
            <?php include("menu.php");
                  if(!isset($_SESSION['admin']))
                  {
                      header("location: LoginPage.php");
                  }
            ?>


             <div id="pageName">
            	<h1>Home Seller Form</h1>
            </div>       
            
            <div class="leftdiv" style="width:50%; float:left;">
                <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" id="sell" autocomplete="on">
                <section>
                    <h2>Contact Information</h2>
                    <table>
                        <tr>
                            <td><abbr class="message" title=""><input type="text" placeholder="<?php showError('FullName', "Full Name") ?>" required name="FullName" ></abbr></td>
                        </tr>
                        <tr>
                            <td><abbr class="message" title=""><input type="tel" placeholder="<?php showError('Phone', "Phone") ?>" required name="Phone" ></abbr></td>
                        </tr>
                        <tr>
                            <td><abbr class="message" title=""><input type="email" placeholder="<?php showError('email', "email") ?>" required name="email" ></abbr></td>
                        </tr>
                    </table>
                </section>
                
                <section>
                    <h2>Property Information</h2>
                    
                    <table>
                        <tr>
                            <td colspan="2"><abbr class="message" title=""><input type="text"  name="address1" placeholder="<?php showError('address1', "address") ?>" required  autocomplete="off"></abbr></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="text"  name="address2" placeholder="<?php showError('address2', "address2") ?>" required autocomplete="off"></td>
                        </tr>
                        <tr>
                            <td>
                               <abbr class="message" title=""> <input type="text"  list="city" name="city" placeholder="<?php showError('city', "city") ?>" required class="halflength required" autocomplete="off"></abbr>
                                <datalist id="city">
                                <option value="New York">
                                <option value="San Francisco">
                                <option value="Houston">
                                <option value="Miami">
                                <option value="Boston">
                                <option value="Chicago">
                             </datalist>
                            </td>
                            <td>
                                <input type="text"  name="state" placeholder="State/Province" class="halflength" autocomplete="off">
                            </td>
                        </tr>
                        <tr>
                                                        
                                <td >Bedrooms:
                                    <p>
                                        <abbr class="message" title=""><select class="halflength required" name="bedrooms" placeholder="<?php showError('bedrooms', "bedrooms") ?>" required>
                                            <option></option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            <option>10+</option>
                                        </select>
                                            </abbr>
                                    </p>
                                </td>
                                <td>Bathrooms:
                                    <p>
                                        <abbr class="message" title=""><select class="halflength required" name="bathrooms" placeholder="<?php showError('bathrooms', "bathrooms") ?>" required> 
                                            <option></option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            <option>10+</option>
                                        </select>
                                        </abbr>
                                    </p>
                                </td>
                        </tr>
                        
                        <tr>
                            <td >Square footage:
                                    <p><abbr class="message" title=""><input class="halflength required" type="number" step="1" min="50" name="squarefootage" ></abbr></p>
                            </td>
                             
                                <td>Garage:
                                <p>
                                    <select class="halflength" name="garage">
                                        <option></option>
                                        <option>None</option>
                                        <option>1 Car Atached</option>
                                        <option>1 Car Deatached</option>
                                        <option>1.5 Car Atached</option>
                                        <option>1.5 Car Deatached</option>
                                        <option>2 Car Atached</option>
                                        <option>2 Car Deatached</option>
                                        <option>2.5 Car Atached</option>
                                        <option>2.5 Car Deatached</option>
                                        <option>3 Car Atached</option>
                                        <option>3 Car Deatached</option>
                                        <option>Other</option>
                                        
                                        
                                    </select>
                                 </p>
                                </td>
                        </tr>
                        <tr>
                               <td > 
                                 Condition of your property?
                                <p>
                                    <select class="halflength" name="condition">
                                        
                                        <option></option>
                                        <option>Excellent</option>
                                        <option>Good</option>
                                        <option>Fair</option>
                                        <option>Poor</option>
                                        <option>Terrible</option>
                                        
                            
                                    </select>
                                </p>
                                </td>
                        </tr>
                        <tr>
                                <td colspan="2">
                                    How many years have you owned this home:
                                    <p><input type="number" name="how many years" autocomplete="off" min="0"></p>
                                </td>
                        </tr>
                        <tr>
                                <td colspan="2">
                                    What kind of repairs and maintance does this house need? 
                                    <p><textarea cols="40" rows="5" name="repairs and maintace"></textarea></p>
                                </td>
                        </tr>
                        <tr>
                                <td colspan="2">
                                    How long has the property been for sale?
                                    <p><input class="halflength" type="number" name="how long" autocomplete="off" min="0"></p>
                                </td>
                        </tr>
                    </table>
                    
                </section>
                
                <section>
                    <h2>Your Situation</h2>
                    <p>What's your situation? Why are you selling?</p>
                    <p> <textarea  rows="7" name="your situtation"></textarea></p>
                    <br>
                    <p>Date of your application:</p>
                    <!--<input type="text" id="date" readonly name="date of application">-->
                    <output id="date"  name="date of application"></output>
                </section>
                
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
                
                <section>
                    <input name="submit" type="submit" id="submit" value="SUBMIT" >
                </section>
                
                </form>
            
                </div>
                
                <div class="rightdiv" style="width:50%; float:right;" align="center; ">
                    <section style="height:245px;">
                        <img src="img/sell/personalInformation.jpg" style="padding-top: 60px;" >
                    </section>
                    <section style="height:760px;">
                        <img src="img/sell/propertyInformation.png" style="padding: 180px 0 0 40px;">
                    </section>
                    <section style="height:192px;">
                        <img src="img/sell/whyAreYouSelling.png" style="padding: 30px 0 0 60px;">
                    </section>
                </div>
                  
                    
                </div>
              </div>
	
        <?php include("footer.php");?>
        <script src="js/general.js" onload="changeColorOfMenu('sell')"></script>
    </body>
</html>