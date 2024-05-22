<?php
$mysqli = require __DIR__."/db.php";
$login_fail =false;
$login_msg="Wrong Username";

if($_SERVER["REQUEST_METHOD"]==="POST"){

    $mysqli = require __DIR__."/db.php";
    $sql = sprintf("SELECT * FROM login_info WHERE username ='%s'",

    $mysqli ->real_escape_string ($_POST["username"]));
    $result =$mysqli->query($sql);
    $user = $result->fetch_assoc();

    if($user){
        if (($_POST["password"]===$user["password"])){
            header("Location: index.php");
        }else{
            $login_msg="Wrong password";
        }
    }

    $login_fail= true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login </title>
    <link rel="stylesheet" href="lisu.css">
    
</head>
<body>
    <div>   
    <h1>Login</h1> 
        <form method="POST">
            <div >
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div >
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <?php if ($login_fail):?>
                <h3 class="wrong_msg">
                    <?php 
                        echo($login_msg);
                    ?> 
                <br>
                Please try again
                </h3>

            <?php endif ?>
            <button>Login</button>
        </form>
		<div >
            <p>Don't have an account? <a href="http://localhost/finalproject/sign_up.php">Sign up here</a></p>
        </div>
    </div>
</body>
</html>