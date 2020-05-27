<?php
require_once("configDB.php");

$conn=Database::getConnection();

$message = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $sql = "INSERT INTO users (username, name, lname, email, phoneNr, password, adminStatus)
            VALUES ('".$_POST["username"]."', '".$_POST["name"]."', '".$_POST["lname"]."', '".$_POST["email"]."', '".$_POST["phoneNr"]."', '".$_POST["password"]."', 0)";


    if($conn->query($sql))
    {

        $message = "<p>You signed up successfully</p><p><a href='LoginPage.php'>Click here to login</a></p>";
    }
    else
    {
        $message = "This username already exists";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <?php include("header.php");?>

    <link href="css/buyStyle.css" rel="stylesheet">
    <link href="css/entry.css" rel="stylesheet">
    <link href="css/signUpStyle.css" rel="stylesheet">

    <script src="js/buyPage.js"></script>
    <title>Login</title>

</head>
<body>

<div id="body-part">
    <!--Wrapper div used to work with this part as a whole-->
    <div id="wrapper">
        <?php include("menu.php");?>

        <div id="pageName">
            <h1>Sign Up</h1>
        </div>

        <div class="form-wrapper">
            <form id="login-form" method="post" autocomplete="on" action="">
                <div class="container">
                    <label for="name"><b>Name</b></label>
                    <input id="name" type="text" placeholder="Enter Name" name="name" required>

                    <label for="lname"><b>Last Name</b></label>
                    <input id="lname" type="text" placeholder="Enter Last Name" name="lname" required>

                    <label for="email"><b>Email</b></label>
                    <input id="email" type="email" placeholder="Enter Email" name="email" required>

                    <label for="username"><b>Username</b></label>
                    <input id="username" type="text" placeholder="Enter Username" name="username" required>

                    <label for="phoneNr"><b>Phone Number</b></label>
                    <input id="phoneNr" type="text" placeholder="Enter Phone Number" name="phoneNr" required>

                    <label for="password"><b>Password</b></label>
                    <input id="password" type="password" placeholder="Enter Password" name="password" required>

                    <button type="submit">Sign Up</button>

                    <div style = "position: relative; left:20px; margin-top:10px"><?php echo $message; ?></div>
                </div>
            </form>
        </div>

    </div>
</div>

<?php include("footer.php");?>

</body>
</html>