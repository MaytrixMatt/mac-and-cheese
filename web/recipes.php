<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAC - Recipes</title>
</head>
<body>
<form class="form-horizontal" action="javascript:void(0);">
    <div class="col-xs-12" style="height:20px;"></div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="displayName">Display Name:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="displayName" name="displayName" placeholder="Display Name" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="email">Email:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="email" name="email" placeholder="Email" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="user_password">Password:</label>
        <div class="col-sm-9">
            <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Password" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" from="confirmPassword">Confirm Password:</label>
        <div class="col-sm-9">
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password">
        </div>
    </div>
    <div class="container col-md-6 col-md-offset-3">
        <input type="button" id="registerButton" class="btn btn-primary btn-block" value="Create Account" onclick="register()" />
    </div>
</form>

</body>
</html>