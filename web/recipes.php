<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAC - Recipes</title>
</head>
<body>
<h3>Create a recipe here >>> <span class = "button"><a id = "link"  href="index.php?content=recipeForm">Form</a></span></h3>

<table class="center-container">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>User</th>
            <th>Pasta</th>
            <th>Cheeses</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>

<?php

$dbh = get_database_connection();

$Rsql = <<<SQL
SELECT *
FROM recipes
JOIN users ON rec_user_id = user_id
JOIN pasta ON rec_pas_id = pas_id
SQL;


$result = mysqli_query($dbh, $Rsql);

while ($row = $result->fetch_assoc())
        {
            $tabCol = 'odd-table-rows';
            if($row['rec_id'] % 2 == 0){
                $tabCol = 'even-table-rows';
            }

            echo "<tr class =" . $tabCol .  ">";
            echo "<td>" . $row['rec_id'] . "</td>";
            echo "<td>" . $row['rec_name'] . "</td>";
            echo "<td>" . $row['user_name'] . "</td>";
            echo "<td>" . $row['pas_name'] . "</td>";

            $rID = $row['rec_id'];

            $RCsql = <<<SQL
            SELECT *
            FROM recipe_cheese_join
            JOIN cheese ON rcj_che_id = che_id
            WHERE rcj_rec_id = $rID
            SQL;

            $cheeseList = '';
            $RCresult = mysqli_query($dbh, $RCsql);
            while ($RCrow = $RCresult->fetch_assoc()){
                $cheeseList = $cheeseList . " " . $RCrow['che_name'];
            }


            echo "<td>" . $cheeseList . "</td>";
            echo "<td>" . $row['rec_desc'] . "</td>";
            echo "</tr>";
        }

?>
</tbody>
</table>


<?php

$result = mysqli_query($dbh, $Rsql);

while ($row = $result->fetch_assoc())
        {

            echo "<div class=center-container style='border:4px outset black;width:500;height:300;text-align:left;font-size:24px;'>";

            echo "<tr class =" . $tabCol .  ">";
            echo "<span style='font-size:12px;'>" . "[" . $row['rec_id'] . "]" . "</span>" . "<br />";
            echo "&nbsp &nbsp" . "Name: " . $row['rec_name'];
            echo "<br />" . "<br />";
            echo "&nbsp &nbsp" . "Created By: " . "<a href='userProfile.php?id=" . $row['user_id'] . "'>" . $row['user_name'] . "</a>";
            echo "<br />" . "<br />";
            echo "&nbsp &nbsp" . "Pasta: " . $row['pas_name'];
            echo "<br />" . "<br />";

            $rID = $row['rec_id'];

            $RCsql = <<<SQL
            SELECT *
            FROM recipe_cheese_join
            JOIN cheese ON rcj_che_id = che_id
            WHERE rcj_rec_id = $rID
            SQL;

            $cheeseList = '';
            $RCresult = mysqli_query($dbh, $RCsql);
            while ($RCrow = $RCresult->fetch_assoc()){
                $cheeseList = $cheeseList . ", " . $RCrow['che_name'];
            }


            echo "&nbsp &nbsp" . "Cheeese(s): " . $cheeseList;
            echo "<br />" . "<br />";
            echo "&nbsp &nbsp" . "Description: " . $row['rec_desc'];

            $userID = $_SESSION['userId'];
            $RUsql = <<<SQL
            SELECT *
            FROM recipe_user_join
            WHERE ruj_rec_id = $rID AND ruj_user_id = $userID
            SQL;

            $RUresult = mysqli_query($dbh, $RUsql);
            $RUcount = mysqli_num_rows($RUresult);


            $Likesql = <<<SQL
            SELECT *
            FROM recipe_user_join
            WHERE ruj_rec_id = $rID
            SQL;

            $Likeresult = mysqli_query($dbh, $Likesql);
            $Likecount = mysqli_num_rows($Likeresult);







            echo"<div class='container col-md-6 col-md-offset-3'>";
            echo "&nbsp &nbsp" . "<input type='submit' id='r" . $row['rec_id'] . "' class='like-btn";
            if($RUcount == 1){
                echo "-selected";
            } 
            echo "' value='Like' onclick='like(" . $row['rec_id'] . ")'' /> " . $Likecount;
            echo "</div>";


            echo "</div>";
            echo "<br />";
            
            

        }
?>
<br />


<script>
    
function like(recID){

    var settings = {
            'async': true,
            'url': 'rec-user.php?recID=' + recID + '&userID=' + <?php echo $_SESSION['userId']; ?> + '&selected=' + <?php 
            
            $userID = $_SESSION['userId'];
            $RUsql = <<<SQL
            SELECT *
            FROM recipe_user_join
            WHERE ruj_rec_id = $rID AND ruj_user_id = $userID
            SQL;
            
            echo mysqli_num_rows(mysqli_query($dbh, $RUsql)); 

            ?>,
            'method': 'POST',
            'headers': {
                'Cache-Control': 'no-cache'
            }
        };

        $('#r'+ recID).prop('disabled', true);
        $.ajax(settings).done(function(response) {
            setTimeout(function() { window.location.replace('index.php?content=recipes'); }, 500);
        }).fail(function(jqXHR) {
            alert('Oops, Error! - Something went wrong, try again later.');
        }).always(function() {
            $('#r'+ recID).prop('disabled', false);
        });

}


</script>



<svg width="500" height="300">

<symbol id ="recipeBox" width="500" height="300">
    <rect x="0" y="0" width="500" height="300" style ="fill:white;stroke-width:3;stroke:black;"  />
    <text x="200" y="20" style="color:red;">*TEMPLATE*</text>
    <text x="30" y="50" style="font-size:30px;">Name: </text>
    <text x="30" y="90" style="font-size:30px;">Created By: </text>
    <text x="30" y="130" style="font-size:30px;">Pasta: </text>
    <text x="30" y="170" style="font-size:30px;">Cheese(s): </text>
    <text x="30" y="210" style="font-size:30px;">Description: </text>
</symbol>

<use id="r1" xlink:href="#recipeBox"  x="0" y="0" />

</svg>
</body>
</html>