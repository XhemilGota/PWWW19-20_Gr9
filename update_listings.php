<!DOCTYPE html>
<html>

    <head>

        <?php include("header.php");?>

        <link href="css/sellstyle.css" rel="stylesheet">
        
        <script src="js/sell.js"></script>
        
        <title>Update listings</title>
        <style>
          #label, #filterById
          {
            position: relative;
            left: 200px;
            top: 100px;
          }
          td
          {
            width: 200px;
          }
          .btn 
          {
            background-color: green;
            border: none; 
            color: white; 
            padding: 12px 16px; 
            font-size: 16px; 
            cursor: pointer; 
            margin: 40px auto;
            display: flex; 
          }

          .btn:hover
          {
            background-color: #18400D;
          }          
         .searchID
         {
            position: relative;
            top: 180px;
            left: 50px;
            width: 100px;
            height: 40px;
            border: 1px solid #A9A9A9;
            border-radius: 7px;
            outline: none;
            background-color: #40ADD6;
            color: white;
            font-size: 15px;
         }

        </style>
     </head>

    <body>
        <div id="body-part">
            <div id="wrapper" style="height: 800px;">
            <?php include("menu.php");?>
            <?php include("adminPrivileges.php");?>

             <div id="pageName">
              <h1>UPDATE LISTINGS</h1>
            </div> 
            <form id="form1" name="form1" method="post" action="">
            <label for="filterById" id="label">Select an ID: </label>
            <select style="width:100px"id="filterById" name="filterById"">
            <?php 
            require_once("configDB.php");
            $conn=Database::getConnection();
                $sql = "SELECT Id
                        FROM listings";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) 
                { echo mysqli_num_rows($result);
                  while($row = mysqli_fetch_assoc($result)) 
                  {
                    echo "<option>".$row['Id']."</option>"; 
                  }
                }
            ?> 
            </select> 

            <button class="searchID" onclick="submitSearch()">Search</button>

            <section id="sell" style="position: relative; left: 50%;  height: 750px display:none; ">
                    
                    <?php 
                    if(isset($_POST['filterById']))
                    {   
                        echo"<script>document.getElementById('sell').style.display='block' ;
                        document.getElementById('wrapper').style='height:auto';</script>";
                        echo"<h2>Change data</h2>";
                        $tempID = $_POST['filterById'];
                        $sql = "SELECT * FROM listings WHERE Id =" . "'" . $tempID . "'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result); 
              
                    
                    ?>
                    <table style="margin-top: 10px">
                        <tr>
                            <td>Id: <input readonly type="text" placeholder="Street" name="id" value=<?php echo "'".$row['Id']."'"?>></td>
                        </tr>
                        <tr>
                            <td>Street: <input type="text" placeholder="Street" name="street" value=<?php echo "'".$row['street']."'"?>></td>
                        </tr>
                        <tr>
                        <td>City: <abbr class="message"><input type="text" placeholder="City" name="city" value=<?php echo "'".$row['city']."'"?>></td>
                        </tr>
                        <tr>
                        <td>Bedroom: <input type="number" placeholder="Bedroom" name="bedroom" value=<?php echo "'".$row['bedroom']."'"?>></td>
                        </tr>
                        <tr>
                        <td>Bathroom: <input type="number" placeholder="Bathroom" name="bathroom" value=<?php echo "'".$row['bathroom']."'"?>></td>
                        </tr>
                        <tr>
                        <td>Square Feet: <input type="number" placeholder="Square feet" name="sqrfe" value=<?php echo "'".$row['sqrfe']."'"?>></td>
                        </tr> 
                        <tr>
                        <td>Price: <input type="number" placeholder="Price" name="price" value=<?php echo "'".$row['price']."'"?>></td>
                        </tr>  
                         <tr>
                        <td>Latitude: <input type="number" placeholder="Latitude" name="lat" value=<?php echo "'".$row['lat']."'"?>></td>
                        </tr>
                         <tr>
                        <td>Longitude: <input type="number" placeholder="Longitude" name="lng" value=<?php echo "'".$row['lng']."'"?>></td>
                        </tr>
                        <tr>
                        <td>Description:
                         <textarea style="padding-top:5px"id="description" placeholder="Description" name="description" rows="4" cols="50">
                          <?php echo "'".$row['description']."'"?>
                         </textarea>
                        </td>
                        </tr>
                    </table>
              
            
                </section>
                <div>
                <input type="submit" name="update" class="btn" value="UPDATE">
                </div>

            <?php 
            } 
            ?>
            <?php 
            if(isset($_POST['update']))
            {
                $temp = $_POST['description'];
                $temp = str_replace("'", "\'", $temp);
                $sql = "UPDATE listings SET street =" ."'".$_POST['street']."'".",
                                    city =" ."'".  $_POST['city'] ."'".",
                                    bedroom =" ."'".$_POST['bedroom']."'".",
                                    bathroom =" ."'".$_POST['bathroom']."'".",
                                    sqrfe =" ."'".$_POST['sqrfe']."'".",
                                    lat ="."'". $_POST['lat']."'".",
                                    lng =" ."'".$_POST['lng']."'".",
                                    price ="."'".$_POST['price']."'".",
                                    description ="."'".$temp."'"."
                WHERE listings.Id = " . "'". $_POST['id']. "'";
                $result = mysqli_query($conn, $sql);
                if($result)
                {
                     echo "<script>
                            alert('You updated succesfully listings');
                            window.location.href='update_listings.php';
                            </script>";
                }
                 
            }
            ?>
    
            </form>
            <script>
              function submitSearch()
              {
                document.getElementById("form1").submit(); 
              }
            </script>
            </div>
          </div>
 
        <?php include("footer.php");?>
        <script src="js/general.js" onload="changeColorOfMenu('manageListings')"></script>
    </body>
</html>