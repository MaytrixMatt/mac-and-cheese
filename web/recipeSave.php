<?php

require_once 'library.php';
$recipeName = mysqli_real_escape_string($dbh, $recipeName);
$description = mysqli_real_escape_string($dbh, $description);

$sql = <<<SQL
INSERT INTO recipes (rec_name, rec_desc, rec_user_id, rec_che_id, rec_pas_id)
VALUES ('{$recipeName}', '{$description}', $userid, $cheeses, $pasta)
SQL;

if (mysqli_query($dbh, $sql))
{
    http_response_code(200);
}
else
{
    http_response_code(500);
}