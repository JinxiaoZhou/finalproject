<?php

require __DIR__ . "/db.php";


if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["delete"];


    $sql = "DELETE FROM today_list WHERE id = ?";
    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            $stmt->close();
            header("Location: ../index.php?page=page2");

        } else {
            echo "<script>alert('Delete failed');</script>";
        }
        $stmt->close();
    }


}


