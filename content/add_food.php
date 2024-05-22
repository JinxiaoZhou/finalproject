<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        add_list();
    } 
}

function add_list() {
    $mysqli = require __DIR__."/db.php";

    $sql = "INSERT INTO food_list (name, fat, carbohydrate, protein, gram, calories)
        VALUE (?,?,?,?,?,?)";

    $stmt = $mysqli->stmt_init();

    if(!$stmt->prepare($sql)){
        die("SQL err".$mysqli->error);
    }

    $stmt->bind_param("sddddd",
        $_POST["name"],
        $_POST["fat"],
        $_POST["carbohydrate"],
        $_POST["protein"],
        $_POST["gram"],
        $_POST["calories"]
    );

    if ($stmt->execute()) {
        echo '<script>
        window.location.href="/finalproject/index.php?page=page1"
        </script>'; 
    } else {
        echo "<script>alert('Submit failed');</script>";
    }
    $stmt->close();
}


?>
