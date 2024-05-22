<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All U can eat</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>

    <div class="header">
		<img src="logo.png" id= "logo" style="width:140px;height:140px" ; > 
        <div class="time">
            <?php
                date_default_timezone_set("US/Eastern");
                echo date('l, F j, Y')."<br>";
                echo date('g:i A');
            ?>
        </div>
    </div>

    <div class="container">
        <div class="sidebar">
            <ul>
                <li><a href="?page=page1">Food List</a></li>
                <li><a href="?page=page2">Today</a></li>
                <li><a href="?page=page3">Chart</a></li>
            </ul>
            <ul>
                <li><a href="log_in.php" class="back-link">Log out</a></li>
            </ul>
        </div>

        <div class="main-content">
            <?php
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                    $allowed_pages = ['page1', 'page2', 'page3','edit_page'];
                    if (in_array($page, $allowed_pages)) {
                        include("content/$page.php");
                    } else {
                        echo "<p>Page not found.</p>";
                    }
                }
            ?>
        </div>

    </div>

    <div class="footer">
        © All rights reserved, 2023-<?php echo date("Y");?>
    </div>

</body>
</html>
