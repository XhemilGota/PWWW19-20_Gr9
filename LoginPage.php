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

        require_once("validator/loginValidator.php");
        $error = "";
    if(isset($_POST['submit'])){

    $validatorObj = new LoginValidator;

    $errors = $validatorObj -> getErrors();

        $error = "";
        if(count($errors) == 0) {

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

        <div id="pageName">
            <h1>Login</h1>
        </div>

        <div class="form-wrapper">
                <form id="login-form" method="post" autocomplete="on" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                    <div class="container">
                        <label for="uname"><b>Username</b></label>
                        <input id="username" type="text" placeholder="<?php showError('username', "username") ?>" name="username" required>

                        <label for="psw"><b>Password</b></label>
                        <input id="password" type="password" placeholder="<?php showError('password', "password") ?>" name="password" required>

                        <button type="submit" name="submit">Login</button>
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