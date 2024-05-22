<?php 

require __DIR__ . "/db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['checkbox'])) {

        $sql = "INSERT INTO today_list (food_list_id) VALUES (?)";
        $stmt = $mysqli->prepare($sql);

        if ($stmt) {
            foreach($_POST['checkbox'] as $food_id){
                $stmt->bind_param("i", $food_id);
                if (!$stmt->execute()) {
                    echo '<script>alert("Add to today list failed!");
                    window.location.href="/finalproject/index.php?page=page2"
                    </script>'; 
                }
                $stmt->free_result();
            }

            echo '<script>alert("Add to today list sucessfuly!");
            window.location.href="/finalproject/index.php?page=page2"
            </script>'; 
            $stmt->close();

        }
    }
    echo '<script>alert("please use check box to select");
    window.location.href="/finalproject/index.php?page=page1"
    </script>'; 




}

?>
