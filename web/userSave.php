<?php

require_once 'library.php';
$user_password = mysqli_real_escape_string($dbh, $user_password);
$name = mysqli_real_escape_string($dbh, $name);
$email = mysqli_real_escape_string($dbh, $email);

$sql = <<<SQL
    SELECT user_id, 
    FROM users
    WHERE user_email = '{$email}'
SQL;

$result = mysqli_query($dbh, $sql);

$count = mysqli_num_rows($result);

if ($count == 0)
{
    $sql = <<<SQL
    INSERT INTO users (user_password, user_name, user_email)
    VALUES ('{$user_password}', '{$name}', '{$email}')
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