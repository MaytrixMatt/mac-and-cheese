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

    $_SESSION['userId'] = $row['id'];
    $_SESSION['displayName'] = $row['display_name'];
    $_SESSION['ssoProvider'] = null;
    $_SESSION['authenticated'] = true;

    load_progress(get_default_challenge_year());

    session_write_close();

    http_response_code(200);
}
else
{
    http_response_code(401);
}