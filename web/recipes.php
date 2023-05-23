<?php
$cheeseCounter = 0;
$dbh = get_database_connection();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAC - Recipes</title>
</head>
<body>
<h3>Create a recipe here >>> <span class = "button"><a id = "link"  href="index.php?content=recipeForm">Form</a></span></h3>

<table class="center-container">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>User</th>
            <th>Pasta</th>
            <th>Cheeses</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>

<?php

$Rsql = <<<SQL
SELECT *
FROM recipes
SQL;


$result = mysqli_query($dbh, $Rsql);

while ($row = $result->fetch_assoc())
        {
            if($row['rec_id'] % 2 == 0){
                $tabCol = 'even-table-rows';
            }else{
                $tabCol = 'odd-table-rows';
            }
            
            $check = $row['rec_user_id'];
            $usernombre = <<<SQL
            SELECT user_name
            FROM users
            WHERE user_id = $check
            SQL;
            $usernombre = (mysqli_query($dbh, $usernombre))->fetch_assoc();
            $usernombre = $usernombre['user_name'];

            $check = $row['rec_pas_id'];
            $pastanombre = <<<SQL
            SELECT pas_name
            FROM pasta
            WHERE pas_id = $check
            SQL;
            $pastanombre = (mysqli_query($dbh, $pastanombre))->fetch_assoc();
            $pastanombre = $pastanombre['pas_name'];



            echo "<tr class =" . $tabCol .  ">";
            echo "<td>" . $row['rec_id'] . "</td>";
            echo "<td>" . $row['rec_name'] . "</td>";
            echo "<td>" . $usernombre . "</td>";
            echo "<td>" . $pastanombre . "</td>";

            
            $RCsql = <<<SQL
            SELECT *
            FROM recipe_cheese_join
            SQL;

            $cheeseList = '';
            $RCresult = mysqli_query($dbh, $RCsql);
            while ($RCrow = $RCresult->fetch_assoc()){
                if(($RCrow['rcj_rec_id'] + 1) == $row['rec_id']){
                    $check = $RCrow['rcj_che_id'];
                    $cheesenombre = <<<SQL
                    SELECT che_name
                    FROM cheese
                    WHERE che_id = $check
                    SQL;
                    $cheesenombre = (mysqli_query($dbh, $cheesenombre))->fetch_assoc();
                    $cheeseList = $cheeseList . " " . $cheesenombre['che_name'];
                    
                }
            }
            echo "<td>" . $cheeseList . "</td>";
            echo "<td>" . $row['rec_desc'] . "</td>";
            echo "</tr>";
        }

?>

</tbody>
</table>  
</body>
</html>