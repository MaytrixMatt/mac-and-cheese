<?php
$cheeseCounter = 0;
$dbh = get_database_connection();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAC - Recipes</title>
</head>
<body>

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

$Rsql = <<<SQL
SELECT *
FROM recipes
SQL;


$result = mysqli_query($dbh, $Rsql);

while ($row = $result->fetch_assoc())
        {
            if($row['rec_id'] % 2 == 0){
                $tabCol = 'even-table-rows';
            }else{
                $tabCol = 'odd-table-rows';
            }

            $usernombre = <<<SQL
            SELECT user_name
            FROM users
            WHERE user_id = $row['rec_user_id']
            SQL;

            $pastanombre = <<<SQL
            SELECT pas_name
            FROM pasta
            WHERE pas_id = $row['rec_pas_id']
            SQL;

            $cheesesInRec = array();

            $RCsql = <<<SQL
            SELECT *
            FROM recipe_cheese_join
            SQL;

            $RCresult = mysqli_query($dbh, $RCsql);

            while ($RCrow = $RCresult->fetch_assoc()){
                if($RCrow['rcj_rec_id'] == $row['rec_id']){
                    $cheesenombre = <<<SQL
                    SELECT che_name
                    FROM cheese
                    WHERE che_id = $RCrow['rcj_che_id']
                    SQL;
                    array_push($cheesesInRec, $cheesenombre);
                }
            }

            echo "<tr class =" . $tabCol .  ">";
            echo "<td>" . $row['rec_id'] . "</td>";
            echo "<td>" . $row['rec_name'] . "</td>";
            echo "<td>" . $usernombre . "</td>";
            echo "<td>" . $pastanombre . "</td>";
            echo "<td>" . $cheesesInRec . "</td>";
            echo "<td>" . $row['rec_desc'] . "</td>";
            echo "</tr>";
        }

?>

</tbody>
</table>  

<br />
<br />
<br />
<br />
<h3>Create Recipe Form</h3>
<form class="form-horizontal" action="javascript:void(0);">
    <div class="col-xs-12" style="height:20px;"></div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="recipeName">Recipe Name:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="recipeName" name="recipeName" placeholder="Recipe Name" />
        </div>
    </div>
    <br />
    <div class="form-group">
        <label class="col-sm-3 control-label" id="cheeses" for="Cheeses">Cheese(s)</label>
        <div class="col-sm-9">
        <?php
            $sql = <<<SQL
            SELECT *
            FROM cheese
            SQL;
            $result = mysqli_query($dbh, $sql);

            while ($row = $result->fetch_assoc())
            {
                $cheeseCounter = $cheeseCounter + 1;
                echo '<input type="checkbox" class="form-control" value=' . $row['che_id'] . ' id="cheese' . $row['che_id'] . '" name="cheese' . $row['che_id'] . '" placeholder="Cheese ' . $row['che_id'] . '" />';
                echo '<label for="cheese' . $row['che_id'] . '">' . $row['che_name'] . '</label><br />';
            }
        ?>
        </div>
    </div>
    <br />
    <div class="form-group">
        <label class="col-sm-3 control-label" for="pasta">Pasta</label>
        <div class="col-sm-9">
            <select id = "pasta" name="pasta">
            <?php
                $sql = <<<SQL
                SELECT *
                FROM pasta
                SQL;
                $result = mysqli_query($dbh, $sql);

                while ($row = $result->fetch_assoc())
                {
                    echo '<option value=' . $row['pas_id'] . '>' . $row['pas_name'] . '</option>';
                }
            ?>
            </select>
        </div>
    </div>
    <br />
    <div class="form-group">
        <label class="col-sm-3 control-label" for="email">Description</label>
        <div class="col-sm-9">
            <input type="text" style="height:80px;" class="form-control" id="description" name="description" placeholder="Description" />
        </div>
    </div>
    <div class="container col-md-6 col-md-offset-3">
        <input type="button" id="recipebutton" class="btn btn-primary btn-block" value="Create Recipe" onclick="recipepost()" />
    </div>
</form>
<script>
    var cheesesUsed = '';

    function checkCheesesChecked(){
        var status = false;
        for(var i = 1; i <= <?php echo $cheeseCounter; ?>; i++){
            if($('#cheese' + i).prop('checked')){
                cheesesUsed = cheesesUsed + (i + ',');
                status = true;
            }

        }
        cheesesUsed = cheesesUsed.substr(0, (cheesesUsed.length -1));
        alert(cheesesUsed);
        return status;
    }



    function recipepost() {
        if ($('#recipeName').val() == '') {
            alert('Recipe Name Required! - Your recipe name can\'t be blank. Enter a value and try again.');
        } else if ($('#description').val() == '') {
            alert('Description Required! - Enter your description and try again!');
        } else if ($('#pasta').val() == '') {
            alert('Pasta Required! - Choose a pasta type and try again!');
        } else if (!checkCheesesChecked()) {
            alert('Cheese Required! - Choose at least one cheese type and try again!');
        } else {
            var settings = {
                'async': true,
                'url': 'recipeSave.php?recipename=' + $('#recipeName').val() + '&description=' + $('#description').val() + '&pasta=' + $('#pasta').val() +'&cheeses=' + cheesesUsed,
                'method': 'POST',
                'headers': {
                    'Cache-Control': 'no-cache'
                }
            };

            $('#recipebutton').prop('disabled', true);
            $.ajax(settings).done(function(response) {
                setTimeout(function() { window.location.replace('index.php?content=home'); }, 5000);
            }).fail(function(jqXHR) {
                    alert('Oops, Error! - Something went wrong, try again later.');
            }).always(function(response) {
                $('#recipebutton').prop('disabled', false);
            });
        }
    }
</script>
</body>
</html>