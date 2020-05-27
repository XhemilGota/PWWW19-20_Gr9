<!DOCTYPE html>
<html>

    <head>

        <?php include("header.php");?>

        <link href="css/sellstyle.css" rel="stylesheet">
        
        <script src="js/sell.js"></script>
        <style>
            #sell #file 
            {
                background-color: transparent;
                border: none;
                margin-top: 20px;
            }
        </style>
        <title>Add listings</title>
    </head>
    <body>
        <div id="body-part">
            <div id="wrapper">
            <?php include("menu.php");?>
            <?php include("adminPrivileges.php");?>
                <div id="pageName">
                	<h1>ADD LISTINGS</h1>
                </div>                   
                <div style="width:50%; margin: 0 auto;">
                    <form action="add_listings.php" method="post" id="sell" enctype="multipart/form-data">
                        <section>
                            <h2>Fill with data</h2>
                            <table>
                                <tr>
                                    <td><input type="text" placeholder="Street" name="street" required></td>
                                </tr>
                                <tr>
                                    <td><abbr class="message"><input type="text" placeholder="City" name="city" required></td>
                                </tr>
                                <tr>
                                    <td><input type="number" placeholder="Bedroom" name="bedroom" required></td>
                                </tr>
                                <tr>
                                    <td><input type="number" placeholder="Bathroom" name="bathroom" required></td>
                                </tr>
                                <tr>
                                    <td><input type="number" placeholder="Square feet" name="sqrfe" required></td>
                                </tr> 
                                <tr>
                                    <td><input type="number" placeholder="Price" name="price" required></td>
                                </tr>  
                                 <tr>
                                    <td><input type="number" placeholder="Latitude" name="lat" required></td>
                                </tr>
                                 <tr>
                                    <td><input type="number" placeholder="Longitude" name="lng" required></td>
                                </tr>
                                <tr>
                                    <td>
                                        <textarea style="padding-top:5px"id="description" placeholder="Description" name="description" rows="4" cols="50"></textarea>
                                    </td>
                                </tr>
                                </table>
                                <div>
                                    <p style="margin:20px 0 0 10px">Upload photos</p>
                                    <input id="file" type="file" name="my_file[]" multiple required/>
                                </div>                                                                    
                        </section>               
                        <section>
                            <input type="submit" id="submit" value="SUBMIT"  name="submit">
                        </section>
                    </form>

                    <?php
                        require_once("configDB.php");
                        $conn=Database::getConnection();
                        $sql="SELECT MAX(Id) as Id FROM listings";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        $id = $row["Id"] + 1;                
                        if(isset($_POST['submit']))
                        {
                            $street = $_POST['street'];
                            $city = $_POST['city'];
                            $bedroom = $_POST['bedroom'];
                            $bathroom = $_POST['bathroom'];
                            $sqrfe = $_POST['sqrfe'];
                            $price = $_POST['price'];
                            $lat = $_POST['lat'];
                            $lng = $_POST['lng'];
                            $description = $_POST['description'];
                            $sql = 
                            "INSERT INTO `listings` (`id`, `street`, `city`, `bedroom`, `bathroom`, `sqrfe`, `price`, `lat`, `lng`, `description`)VALUES('$id','$street','$city', '$bedroom', '$bathroom', '$sqrfe', '$price', '$lat', '$lng', '$description')";
                            if (!mysqli_query($conn, $sql)) 
                            {
                               die("Error: " . $sql . "<br>" . mysqli_error($conn));
                            }                   
                            $x = $id + 1;
                            $structure = "img/buy/". $x;  
                            if (!mkdir($structure, 0777, true)) 
                            {
                                echo('Failed to create folders...');
                            }
                            $total = count($_FILES['my_file']['name']);
                            $sql = "INSERT INTO `house_photos` (`Id`, `imagePath`) VALUES";
                            for($i=0; $i<$total; $i++)
                            {
                                if (($_FILES['my_file']['name'][$i]!=""))
                                {
                                    //Ku ka me u rujt file
                                    $target_dir = $structure ."/";
                                    $file = $_FILES['my_file']['name'][$i];
                                    echo $file;
                                    $path = pathinfo($file);
                                    //emri i fotos
                                    $filename = $path['filename'];
                                     //formati i fotos, psh .jpg
                                    $ext = $path['extension'];
                                     //gjeneron nje temp_name random psh C:\xampp\tmp\phpEA43.tmp
                                    $temp_name = $_FILES['my_file']['tmp_name'][$i];
                                     //komplet pathin, fotoja edhe extensioni
                                    $path_filename_ext = $target_dir.$filename.".".$ext;
                                    //i run filet me emrin $path_filename_ext
                                    move_uploaded_file($temp_name,$path_filename_ext);
                                    $sql.="(". "'" . $id . "'," . "'" . $path_filename_ext . "')";
                                    if($i!=$total-1)$sql.=",";       
                                }
                            }
                            if (mysqli_query($conn, $sql)) 
                            {
                                echo "<script>
                                alert('You added succesfully');
                                window.location.href='add_listings.php';
                                </script>";
                            }
                            else 
                            {
                                die("Error: " . $sql . "<br>" . mysqli_error($conn));
                            }
                        }
                    ?>
                </div> 
            </div>
        </div>
	
        <?php include("footer.php");?>
        <script src="js/general.js" onload="changeColorOfMenu('manageListings')"></script>
    </body>
</html>