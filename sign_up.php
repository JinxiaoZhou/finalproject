<?php
$password_error = false;

if($_SERVER["REQUEST_METHOD"]==="POST"){

    if($_POST["password"]!==$_POST["C_password"]){
        $password_error = true;

    }else{
        $mysqli = require __DIR__."/db.php";

        $sql = "INSERT INTO login_info (username, password)
                VALUES (?,?)";

        $stmt = $mysqli->stmt_init();

        if(!$stmt->prepare($sql)){
            die("SQL err".$mysqli->error);
        }

        $stmt->bind_param("ss",
                        $_POST["username"],
                        $_POST["password"]);

        if($stmt->execute()){
            echo '<script>alert("Signed up sucessfuly!");
            window.location.href="/finalproject/log_in.php"
            </script>'; 
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup </title>
    <link rel="stylesheet" href="lisu.css">
</head>
<body>
    <div>   
    <h1>Signup</h1> 
        <form action="" method="POST">
            <div>
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div>
                <label for="C_password">Confirm Password</label>
                <input type="password" id="C_password" name="C_password" required>
            </div>
            <?php if ($password_error): ?>
                <h3 class="wrong_msg">
                    Different password<br>
                    Please enter the same password
                </h3>
            <?php endif ?>
            <button type="submit">Signup</button>
        </form>
        <div>
            <p>Already have an account? <a href="http://localhost/finalproject/log_in.php">Log in here</a></p>
        </div>
    </div>
</body>
</html>
