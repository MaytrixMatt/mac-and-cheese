<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAC - Stats</title>
</head>
<body>
    statistics in progress

<br />
<table class="center-container">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Country</th>
        </tr>
    </thead>
    <tbody>
    <?php

        $sql = <<<SQL
        SELECT *
        FROM cheese
        SQL;
        $result = mysqli_query($dbh, $sql);

        while ($row = $result->fetch_assoc())
        {
            if($row['che_id'] % 2 == 0){
                $tabCol = 'even-table-rows';
            }else{
                $tabCol = 'odd-table-rows';
            }
            echo "<tr class =" . $tabCol .  ">";
            echo "<td>" . $row['che_id'] . "</td>";
            echo "<td>" . $row['che_name'] . "</td>";
            echo "<td>" . $row['che_country'] . "</td>";
            echo "</tr>";
        }
    ?>
    </tbody>
</table>    

<br />
<table class="center-container">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Country</th>
        </tr>
    </thead>
    <tbody>
    <?php

        $sql = <<<SQL
        SELECT *
        FROM pasta
        SQL;
        $result = mysqli_query($dbh, $sql);

        while ($row = $result->fetch_assoc())
        {
            if($row['pas_id'] % 2 == 0){
                $tabCol = 'even-table-rows';
            }else{
                $tabCol = 'odd-table-rows';
            }
            echo "<tr class =" . $tabCol .  ">";
            echo "<td>" . $row['pas_id'] . "</td>";
            echo "<td>" . $row['pas_name'] . "</td>";
            echo "<td>" . $row['pas_country'] . "</td>";
            echo "</tr>";
        }
    ?>
    </tbody>
</table>  

<?php
$Usql = <<<SQL
    SELECT user_id
    FROM users
SQL;

$Csql = <<<SQL
    SELECT che_id
    FROM cheese
SQL;

$Psql = <<<SQL
    SELECT pas_id
    FROM pasta
SQL;


$Ucount = mysqli_num_rows(mysqli_query($dbh, $Usql));
$Ccount = mysqli_num_rows(mysqli_query($dbh, $Csql));
$Pcount = mysqli_num_rows(mysqli_query($dbh, $Csql));

echo "<h3>Number of Users: " . $Ucount . "</h3>";
echo "<h3>Number of Cheeses: " . $Ccount . "</h3>";
echo "<h3>Number of Pastas: " . $Pcount . "</h3>";
?>

</body>
</html>