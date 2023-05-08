<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAC - Recipes</title>
</head>
<body>
<h3>hmm</h3>
<form class="form-horizontal" action="javascript:void(0);">
    <div class="col-xs-12" style="height:20px;"></div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="displayName">Recipe Name:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="displayName" name="displayName" placeholder="Display Name" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="email">Description</label>
        <div class="col-sm-9">
            <input type="text" style="height:80px;" class="form-control" id="email" name="email" placeholder="Description" />
        </div>
    </div>
    <div class="container col-md-6 col-md-offset-3">
        <input type="button" id="recipebutton" class="btn btn-primary btn-block" value="Create Recipe" onclick="recipepost()" />
    </div>
</form>
</body>
</html>