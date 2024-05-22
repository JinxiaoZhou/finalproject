<?php
require __DIR__ . "/add_food.php";

$mysqli = require __DIR__ . "/db.php";
$sql = "SELECT * FROM food_list";
$result = $mysqli->query($sql);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    add_list();
}

$null_ckbox=null;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food List</title>
</head>
<body>
    <div>
        <h2>Food List</h2>
    </div>
    <div class="food_list">
        <form id="food_form" method="POST" action="content/add_today.php">
        <table class="table">
            <thead>
                <tr>
                    <th>Select</th>
                    <th>Name</th>
                    <th>Fat</th>
                    <th>Carbohydrate</th>
                    <th>Protein</th>
                    <th>Gram</th>
                    <th>Calories</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr class="table_body">
                    <td><input type="checkbox"  class="food_ckb" name="checkbox[]" 
                    value="<?php echo $row['id']; ?>" 
                    /> </td>
                    <td><?php echo ($row['name']); ?></td>
                    <td><?php echo ($row['fat']); ?>g</td>
                    <td><?php echo ($row['carbohydrate']); ?>g</td>
                    <td><?php echo ($row['protein']); ?>g</td>
                    <td><?php echo ($row['gram']); ?>g</td>
                    <td><?php echo ($row['calories']); ?>cal</td>
                    <td>
                    <form action="content/delete.php" method="GET" class="delete">
                        <input type="hidden" name="delete" value="<?php echo $row['id']; ?>">
                        <button type="submit" class="delete">Delete</button>
                    </form>
                    </td>

                </tr>
                <?php endwhile; ?>
                <tr>
                    <form id="add" method="POST" action="">
                        <td></td>                        
                        <td><input class="input" type="text" placeholder="Food name" name="name" required></td>
                        <td><input class="input" type="number" placeholder="Fat" name="fat" required></td>
                        <td><input class="input" type="number" placeholder="Carbohydrate" name="carbohydrate" required></td>
                        <td><input class="input" type="number" placeholder="Protein" name="protein" required></td>
                        <td><input class="input" type="number" placeholder="Weight of food" name="gram" required></td>
                        <td><input class="input" type="number" placeholder="Calories" name="calories" required></td>
                        <td><input type="submit" class="add_food" value="Add to food list"></td>
                    </form>
                </tr>
            </tbody>
        </table>
        <br/>
        </form>    
        <button  type="submit" form="food_form" class="add_today" 
        >Add to today's list</button>
        <?php if ($null_ckbox): ?>
            <h3 class="wrong_msg">
                Different password<br>
                Please enter the same password
            </h3>
        <?php endif ?>
    </div>
</body>
</html>
