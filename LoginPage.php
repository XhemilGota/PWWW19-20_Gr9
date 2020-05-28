<!DOCTYPE html>
<html lang="en">
<head>

    <?php include("header.php");?>

    <link href="css/buyStyle.css" rel="stylesheet">
    <link href="css/entry.css" rel="stylesheet">
    <link href="css/loginStyle.css" rel="stylesheet">

    <script src="js/buyPage.js"></script>
    <title>Login</title>

</head>
<body>

<div id="body-part">
    <!--Wrapper div used to work with this part as a whole-->
    <div id="wrapper">
        <?php include("menu.php");?>

        <?php
        require_once("configDB.php");

        $_SESSION['log-out'] = 1;
        $conn=Database::getConnection();

        $error = "";
        if($_SERVER["REQUEST_METHOD"] == "POST") {

            $myusername = mysqli_real_escape_string($conn,$_POST['username']);
            $mypassword = mysqli_real_escape_string($conn,$_POST['password']);

            $sql = "SELECT adminStatus
            FROM users
            WHERE username = '$myusername' and password = '$mypassword'";

            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

            $adminStatus = $row['adminStatus'];

            $count = mysqli_num_rows($result);

            if($count == 1)
            {
                $_SESSION['login_user'] = $myusername;
                $_SESSION['admin'] = $adminStatus;

                header("location: index.php");
            }
            else
            {
                $error = "Username and Password don't match!";
            }
        }

        ?>

        <div id="pageName">
            <h1>Login</h1>
        </div>

        <div class="form-wrapper">
                <form id="login-form" method="post" autocomplete="on" action="">
                    <div class="container">
                        <label for="uname"><b>Username</b></label>
                        <input id="username" type="text" placeholder="Enter Username" name="username" required>

                        <label for="psw"><b>Password</b></label>
                        <input id="password" type="password" placeholder="Enter Password" name="password" required>

                        <button type="submit">Login</button>
                    </div>
                </form>
                <p style="position: relative; left:20px">Don't have an account? <a href="SignUp.php">Click here to sign up</a></p>

                <div style = "font-size:11px; color:#cc0000; align-text:center; margin-top:10px; position: relative; left:20px"><?php echo $error; ?></div>
        </div>

    </div>
</div>

<?php include("footer.php");?>

</body>
</html>