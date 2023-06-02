<?php
require_once 'library.php';
$dbh = get_database_connection();
$id = mysqli_real_escape_string($dbh, $id);
$sql = <<<SQL
SELECT *
FROM users
WHERE user_id = $id
SQL;
$result = mysqli_query($dbh, $sql);
$result = $result->fetch_assoc();
$name = $result['user_name'];
$favCheId = $result['user_fav_che_id'];
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAC User - <?php echo $name ?></title>
    <link rel="stylesheet" type="text/css" href="css/customStyles.css?v=<?php echo rand(); ?>">
</head>
<body>
    <br />
    <div class=center-container style='border:4px outset black;width:100;height:100;text-align:left;font-size:24px;'>
    </div>
    <h1><?php echo $name ?></h1>
    <br />
    <div class=center-container>
    <h3>Favorite Cheese: <?php 
    $idDeQueso = $_SESSION['userFavCheId'];
    $csql = <<<SQL
    SELECT che_name
    FROM cheese
    where che_id = $idDeQueso
    SQL;
    echo ((mysqli_query($dbh, $csql))->fetch_assoc())['che_name'];
    ?>
    </h3>
    </div>

</body>
</html>

