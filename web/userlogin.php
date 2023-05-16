<?php

require_once 'library.php';
$dbh = get_database_connection();
$email = mysqli_real_escape_string($dbh, $email);
$password = mysqli_real_escape_string($dbh, $password);

$sql = <<<SQL
    SELECT user_id, user_name
    FROM users
    WHERE user_email = '{$email}' AND user_password = '{$password}'
SQL;

$result = mysqli_query($dbh, $sql);

$count = mysqli_num_rows($result);

// figure out this if statement
if ($count == 1)
{
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    session_start();

    $_SESSION['userId'] = $row['user_id'];
    $_SESSION['displayName'] = $row['user_name'];
    $_SESSION['authenticated'] = true;

    //echo 'This should work - userlogin.php';

    session_write_close();

    http_response_code(200);
}
else
{
    http_response_code(401);
    //echo 'Fail in userlogin.php';
}