<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
</head>
<body>

    <?php 
        $dbh = get_database_connection();
    ?>

    User Settings Page


    <h3>Enter the information below to update your account.</h3>
<form class="form-horizontal" action="javascript:void(0);">
    <div class="col-xs-12" style="height:20px;"></div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="displayName">Current Name: <?php echo $_SESSION['displayName']; ?></label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="displayName" name="displayName" placeholder="New Display Name" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="user_password">New Password:</label>
        <div class="col-sm-9">
            <input type="password" class="form-control" id="user_password" name="user_password" placeholder="New Password" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" from="confirmPassword">Confirm New Password:</label>
        <div class="col-sm-9">
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="New Password">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="cheese">Favorite Cheese: <?php 
        
        $idDeQueso = $_SESSION['userFavCheId'];
        $csql = <<<SQL
        SELECT che_name
        FROM cheese
        where che_id = $idDeQueso
        SQL;
        echo ((mysqli_query($dbh, $csql))->fetch_assoc())['che_name']; 
        ?> 
        
        </label>
        <div class="col-sm-9">
            <select id = "cheese" name="cheese" value="<?php $_SESSION['userFavCheId'] ?>">
            <?php
                $sql = <<<SQL
                SELECT *
                FROM cheese
                SQL;
                $result = mysqli_query($dbh, $sql);
                while ($row = $result->fetch_assoc())
                {
                    echo '<option value=' . $row['che_id'] . '>' . $row['che_name'] . '</option>';
                }
            ?>
            </select>
        </div>
    </div>
    <div class="container col-md-6 col-md-offset-3">
        <input type="button" id="updateButton" class="btn btn-primary btn-block" value="Update Account" onclick="update()" />
    </div>
</form>
* You may have to log-in again for changes to appear *

<script>

function update() {
    if ($('#user_password').val() != $('#confirmPassword').val()) {
        alert('Password Mismatch! - Your passwords don\'t match, try again.');
    }else if ($('#user_password').val() || $('#displayName').val() || $('#cheese').val()){
        var settings = {
            'async': true,
            'url': 'userRecord.php?user_password=' + $('#user_password').val() + '&name=' + $('#displayName').val() + '&userID=' + <?php echo $_SESSION['userId'] ?> + '&email=null@null.null' + '&favCheId=' + $('#cheese').val() + '&update=true',
            'method': 'POST',
            'headers': {
                'Cache-Control': 'no-cache'
            }
        };

        $('#updateButton').prop('disabled', true);
        $.ajax(settings).done(function(response) {
            setTimeout(function() { window.location.replace('index.php?content=home'); }, 500);
        }).fail(function(jqXHR) {
            alert('Oops, Error! - Something went wrong, try again later.');
        }).always(function() {
            $('#updateButton').prop('disabled', false);
        });
    }
}

</script>    
</body>
</html>