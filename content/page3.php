<?php

$mysqli = require __DIR__ . "/db.php";
$sqlsum = "SELECT 
SUM(fat) AS total_fat, 
SUM(carbohydrate) AS total_carbohydrate,
SUM(protein) AS total_protein
FROM food_list JOIN today_list ON food_list.id = today_list.food_list_id";

$sumresult = $mysqli->query($sqlsum);

if ($sumresult) {
$sum_row = $sumresult->fetch_assoc();
$total_fat = $sum_row['total_fat'];
$total_carbohydrate = $sum_row['total_carbohydrate'];
$total_protein = $sum_row['total_protein'];
}

$total = $total_fat + $total_carbohydrate + $total_protein;

$fat_angle = ($total_fat / $total) * 360;
$carbohydrate_angle = ($total_carbohydrate / $total) * 360;
$protein_angle = ($total_protein / $total) * 360;

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <style>
            .piechart {
                width: 500px;
                height: 500px;
                border-radius: 50%;
                margin: 10%;
                background-image: conic-gradient(
                    #A2C3DB <?php echo $fat_angle; ?>deg,
                    #8871A0 <?php echo $fat_angle; ?>deg 
                    <?php echo $fat_angle + $carbohydrate_angle; ?>deg,
                    #8AAF22 <?php echo $fat_angle + $carbohydrate_angle; ?>deg 
                    <?php echo $fat_angle + $carbohydrate_angle + $protein_angle; ?>deg
                );
            }

            .charts{
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }

            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
                height: 40px;
                width: 100px;
            }
        </style>
    </head>

    <body>
        <h2>Pie Chart</h2>
        <div class="charts">
        <div class="piechart"></div>

        <table>
            <tr>
                <th>Name</th>
                <th>Number</th>
                <th>Perentage</th>
            </tr>
            <tr>
                <td style="background-color: #A2C3DB;">Fat</td>
                <td><?php echo $total_fat; ?></td>
                <td><?php echo round($total_fat / $total,4)*100; ?>%</td>
            </tr>
            <tr>
                <td style="background-color: #8871A0;">Carbohydrate</td>
                <td><?php echo $total_carbohydrate; ?></td>
                <td><?php echo round($total_carbohydrate / $total,4)*100; ?>%</td>
            </tr>
            <tr>
                <td style="background-color: #8AAF22;">Protein</td>
                <td><?php echo $total_protein; ?></td>
                <td><?php echo round($total_protein / $total,4)*100; ?>%</td>
            </tr>
        </table>
        </div>
        
    </body>