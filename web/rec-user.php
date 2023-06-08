<?php
require_once 'library.php';
$dbh = get_database_connection();

$RUsql = <<<SQL
SELECT *
FROM recipe_user_join
WHERE ruj_rec_id = $recID AND ruj_user_id = $userID
SQL;

$selected = mysqli_num_rows(mysqli_query($dbh, $RUsql)); 



if($selected == 0){
    $sql = <<<SQL
        INSERT INTO recipe_user_join (ruj_rec_id, ruj_user_id)
        VALUES ($recID, $userID)
        SQL;
}else{
    $sql = <<<SQL
        DELETE FROM recipe_user_join
        WHERE ruj_rec_id = $recID AND ruj_user_id = $userID
        SQL;
}

mysqli_query($dbh, $sql);
print $sql;