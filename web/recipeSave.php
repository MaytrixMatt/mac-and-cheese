<?php

require_once 'library.php';
$dbh = get_database_connection();
$recipename = mysqli_real_escape_string($dbh, $recipename);
$description = mysqli_real_escape_string($dbh, $description);
$cheeses = explode(',', $cheeses);

$sql = <<<SQL
INSERT INTO recipes (rec_name, rec_desc, rec_user_id, rec_pas_id)
VALUES ('{$recipename}', '{$description}', {$_SESSION['userId']}, $pasta)
SQL;

mysqli_query($dbh, $sql);
print $sql;


$recId = $dbh->insert_id;




for($i = 0; $i < count($cheeses); $i++){
    $RCJsql = <<<SQL
    INSERT INTO recipe_cheese_join (rcj_rec_id, rcj_che_id)
    VALUES ($recId, {$cheeses[$i]})
    SQL;
    mysqli_query($dbh, $RCJsql);
    print $RCJsql;
}