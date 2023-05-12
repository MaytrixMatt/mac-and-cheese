<?php

require_once 'library.php';
$recipeName = mysqli_real_escape_string($dbh, $recipeName);
$description = mysqli_real_escape_string($dbh, $description);
$cheeses = explode(',', $cheeses);

$sql = <<<SQL
INSERT INTO recipes (rec_name, rec_desc, rec_user_id, rec_pas_id)
VALUES ('{$recipeName}', '{$description}', {$_SESSION['userId']}, $pasta)
SQL;

mysqli_query($dbh, $sql);
print $sql;

$recId = $conn->insert_id;


for($i = 0; $i < $cheeses.length(); $i++){
    $RCJsql = <<<SQL
    INSERT INTO recipe-cheese-join (rcj_rec_id, rcj_che_id)
    VALUES ($recId, $cheeses[$i])
    SQL;
    mysqli_query($dbh, $RCJsql);
    print $RCJsql;
}