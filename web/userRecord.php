<?php
require_once 'library.php';
$dbh = get_database_connection();
$user_password = mysqli_real_escape_string($dbh, $user_password);
$name = mysqli_real_escape_string($dbh, $name);
$email = mysqli_real_escape_string($dbh, $email);
$favCheId = mysqli_real_escape_string($dbh, $favCheId);
$update = mysqli_real_escape_string($dbh, $update);

if($update == 'true'){
    // Re-Direct from userSettings.php
    // Originally userUpdate.php

    if($name != ''){
        $nameChange = <<<SQL
        UPDATE users
           SET user_name = '{$name}'
         WHERE user_id = $userID
        SQL;
        mysqli_query($dbh, $nameChange);
        echo '<br />';
        $_SESSION['displayName'] = $name;
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
        $_SESSION['userFavCheId'] = $favCheId;
        print $cheeseChange;
    }
}else{
    // Re-Direct from login-signup.php
    // Originally userSave.php

    $sql = <<<SQL
    SELECT user_id, 
    FROM users
    WHERE user_email = '{$email}'
    SQL;

    $result = mysqli_query($dbh, $sql);

    $count = mysqli_num_rows($result);

    if ($count == 0){
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
}