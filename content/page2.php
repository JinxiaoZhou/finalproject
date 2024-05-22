<?php

$mysqli = require __DIR__ . "/db.php";
$sql = "SELECT * FROM food_list JOIN today_list on food_list.id=today_list.food_list_id";
$result = $mysqli->query($sql);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    add_list();
}

$sqlsum = "SELECT 
    SUM(fat) AS total_fat, 
    SUM(carbohydrate) AS total_carbohydrate,
    SUM(protein) AS total_protein,
    SUM(gram) AS total_gram,
    SUM(calories) AS total_calories
FROM food_list JOIN today_list ON food_list.id = today_list.food_list_id";


$sumresult = $mysqli->query($sqlsum);

if ($sumresult) {
    $sum_row = $sumresult->fetch_assoc();
    $total_fat = $sum_row['total_fat'];
    $total_carbohydrate = $sum_row['total_carbohydrate'];
    $total_protein = $sum_row['total_protein'];
    $total_gram = $sum_row['total_gram'];
    $total_calories = $sum_row['total_calories'];    
}

?>

<h2>Today's list</h2>
<table class="table">
        <thead>
                <tr>
                    <th>Name</th>
                    <th>Fat</th>
                    <th>Carbohydrate</th>
                    <th>Protein</th>
                    <th>Gram</th>
                    <th>Calories</th>
                    <th>Remove from <br> today's list</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr class="table_body">
                    <td><?php echo ($row['name']); ?></td>
                    <td><?php echo ($row['fat']); ?>g</td>
                    <td><?php echo ($row['carbohydrate']); ?>g</td>
                    <td><?php echo ($row['protein']); ?>g</td>
                    <td><?php echo ($row['gram']); ?>g</td>
                    <td><?php echo ($row['calories']); ?>cal</td>
                    <td>
                    <form action="content/delete_today.php" method="GET" class="delete">
                        <input type="hidden" name="delete" value="<?php echo $row['id']; ?>">
                        <button type="submit" class="delete">Remove</button>
                    </form>
                    </td>
                </tr>
                <?php endwhile; ?>
                <tr>
                </tr>
                <tr class="sum">
                    <td>Total of today</td>
                    <td><?php echo ($total_fat); ?>g</td>
                    <td><?php echo ($total_carbohydrate); ?>g</td>
                    <td><?php echo ($total_protein); ?>g</td>
                    <td><?php echo ($total_gram); ?>g</td>
                    <td><?php echo ($total_calories); ?>g</td>
                </tr>
            </tbody>
        </table>

