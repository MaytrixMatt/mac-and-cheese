<?php
require_once 'library.php';
$dbh = get_database_connection();

$user_password = mysqli_real_escape_string($dbh, $user_password);
$name = mysqli_real_escape_string($dbh, $name);
$favCheId = mysqli_real_escape_string($dbh, $favCheId);
print 'hello';

if($name != ''){
    $nameChange = <<<SQL
    UPDATE users
       SET user_name = '{$name}'
     WHERE user_id = $userID
    SQL;
    mysqli_query($dbh, $nameChange);
    echo '<br />';
    print $nameChange;
}
if($user_password != ''){
    $passwordChange = <<<SQL
    UPDATE users
       SET user_password = '{$user_password}'
     WHERE user_id = $userID
    SQL;
    mysqli_query($dbh, $passwordChange);
    echo '<br />';
    print $passwordChange;
}
if($favCheId != ''){
    $cheeseChange = <<<SQL
    UPDATE users
       SET user_fav_che_id = '{$favCheId}'
     WHERE user_id = $userID
    SQL;
    mysqli_query($dbh, $cheeseChange);
    echo '<br />';
    print $cheeseChange;
}