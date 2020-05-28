<!DOCTYPE html>
<html lang="en">
<head>
    
    <link href="css/buyStyle.css" rel="stylesheet">
    <link href="css/entry.css" rel="stylesheet">
    <link href="css/signUpStyle.css" rel="stylesheet">

    <script src="js/buyPage.js"></script>
    <title>Login</title>
    <?php include("header.php");

$message = "";

require_once("validator/SignUpValidator.php");

if(isset($_POST['submit']))
{
    $validatorObj = new SignUpValidator;

    $errors = $validatorObj -> getErrors();

    if(count($errors) == 0)
    {
        require_once("configDB.php");

        $conn = Database::getConnection();

        $sql = "INSERT INTO users (username, name, lname, email, phoneNr, password, adminStatus)
            VALUES ('".$_POST["username"]."', '".$_POST["name"]."', '".$_POST["lname"]."', '".$_POST["email"]."', '".$_POST["phoneNr"]."', '".$_POST["password"]."', 0)";


        if($conn->query($sql))
        {
            $message = "<p>You signed up successfully</p><p><a href='LoginPage.php'>Click here to login</a></p>";
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
            <form id="login-form" method="post" autocomplete="on" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                <div class="container">
                    <label for="name"><b>Name</b></label>
                    <input id="name" type="text" name="name" placeholder="<?php showError('name', "name") ?>" required>

                    <label for="lname"><b>Last Name</b></label>
                    <input id="lname" type="text" placeholder="<?php showError('lname', "last name") ?>" name="lname" required>

                    <label for="email"><b>Email</b></label>
                    <input id="email" type="email" placeholder="<?php showError('email', "email") ?>" name="email" required>

                    <label for="username"><b>Username</b></label>
                    <input id="username" type="text" placeholder="<?php showError('username', "username") ?>" name="username" required>

                    <label for="phoneNr"><b>Phone Number</b></label>
                    <input id="phoneNr" type="text" placeholder="<?php showError('phoneNr', "telephone number") ?>" name="phoneNr" required>

                    <label for="password"><b>Password</b></label>
                    <input id="password" type="password" placeholder="<?php showError('password', "password") ?>" name="password" required>

                    <button type="submit" name="submit">Sign Up</button>

                    <div style = "position: relative; left:20px; margin-top:10px"><?php echo $message; ?></div>
                </div>
            </form>
        </div>

    </div>
</div>

<?php include("footer.php");?>

</body>
</html>