<!DOCTYPE html>
<html>

    <head>

        <?php include("header.php");?>

        <link href="css/sellstyle.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <script src="js/sell.js"></script>
        <style>
            #customers {
              font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
              border-collapse: collapse;
              width: 100%;
            }

            #customers td, #customers th {
              border: 1px solid #ddd;
              padding: 8px;
            }

            #customers tr:nth-child(even){background-color: #f2f2f2;}

            #customers tr:hover {background-color: #ddd;}

            #customers th {
              padding-top: 12px;
              padding-bottom: 12px;
              text-align: left;
              background-color: #40ADD6;
              color: white;
            }

            .btn {
              background-color: red; /* Blue background */
              border: none; /* Remove borders */
              color: white; /* White text */
              padding: 12px 16px; /* Some padding */
              font-size: 16px; /* Set a font size */
              cursor: pointer; /* Mouse pointer on hover */
              margin: 40px auto;
              display: flex; 
              }

            .btn:hover
             {
              background-color: #AA0000;
             }
        </style>
        <title>Delete listings</title>
     </head>

    <body>
        <div id="body-part">
            <div id="wrapper">
            <?php include("menu.php");?>
            <?php include("adminPrivileges.php");?>

             <div id="pageName">
              <h1>DELETE LISTINGS</h1>
            </div> 
            <form name="form1" method="POST" action="">      
            <table id="customers">
              <tr>
                <th></th>
                <th>Id</th>
                <th>Street</th>
                <th>City</th>
                <th>Bathroom</th>
                <th>Bedroom</th>
                <th>Square Feet</th>
                <th>Price</th>
              </tr>
              <?php
              require_once("configDB.php");

                $conn=Database::getConnection();
                $sql = "SELECT *
                        FROM listings";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) 
                { 
                  while($row = mysqli_fetch_assoc($result)) 
                  {
                    $tempId=$row['Id']; 
                    $tempStreet = $row['street'];
                    $tempCity=$row['city'];
                    $tempBedroom=$row['bedroom'];
                    $tempBathroom=$row['bathroom'];
                    $tempSqrfe=$row['sqrfe'];
                    $tempPrice=$row['price'];
                    $tempPrice = "$". number_format($tempPrice); 
                    
                    echo 
                    "<tr>\n".
                    "<td><input name='checkbox[]'' type='checkbox' id='checkbox[]'' value=". $tempId ."></td>\n".
                    "<td>" . $tempId . "</td>\n". 
                    "<td>" . $tempStreet . "</td>\n". 
                    "<td>" . $tempCity . "</td>\n". 
                    "<td>" . $tempBedroom . "</td>\n". 
                    "<td>" . $tempBathroom . "</td>\n". 
                    "<td>" . $tempSqrfe . "</td>\n".
                    "<td>" . $tempPrice . "</td>\n".
                    "</tr>\n";
                  }
                }
              ?>
            </table>
            <input type="submit" name="delete" class="btn" value="DELETE">
        </form>
      </div>
    </div>
    <?php
      if(isset($_POST['delete']))
      {
        $delete_id = $_POST['checkbox'];
        if(count($delete_id)>0)
        {
          foreach ($delete_id as $id_d) 
          {
            $sql = "DELETE FROM house_photos WHERE Id = '$id_d'";
            $result = mysqli_query($conn, $sql);
            $sql = "DELETE FROM listings WHERE Id = '$id_d'";
            $result = mysqli_query($conn, $sql);
            if($result)
            {
              $dirname = "img/buy/" . ($id_d + 1);
              array_map('unlink', glob("$dirname/*.*"));
              rmdir($dirname);
              echo "<script>
              alert('You deleted succesfully');
              window.location.href='delete_listings.php';
              </script>";
            }
          }
        }
      } 
    ?>
    <?php include("footer.php");?>
    <script src="js/general.js" onload="changeColorOfMenu('manageListings')"></script>
    </body>
</html>