<?php

require_once 'library.php';
$dbh = get_database_connection();
$user_password = mysqli_real_escape_string($dbh, $user_password);
$name = mysqli_real_escape_string($dbh, $name);

$sql = <<<SQL
    SELECT user_id, 
    FROM users
    WHERE user_name = '{$name}'
SQL;

$result = mysqli_query($dbh, $sql);

$count = mysqli_num_rows($result);

if ($count == 0)
{
    $sql = <<<SQL
    INSERT INTO users (user_password, user_name)
    VALUES ('{$user_password}', '{$name}')
SQL;

    if (mysqli_query($dbh, $sql))
    {
        http_response_code(200);
    }
    else
    {
        http_response_code(500);
    }
}