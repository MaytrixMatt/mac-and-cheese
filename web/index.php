<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" href="mac_logo.png">
    <title>MAC</title>

</head>
<body>
    <!-- Standard navigation buttons for all pages -->
    <div class = "center">
            <img src="mac_logo.png" alt="MAC EVERYTHING" width="60px" length="60px">
            <span class = "button"><a id = "link" <?php print($content == 'home' ? 'active' : ''); ?> href="index.php?content=home">Home</a></span>
            <span class = "button"><a id = "link" <?php print($content == 'recipes' ? 'active' : ''); ?> href="index.php?content=">Recipes</a></span>
            <span class = "button"><a id = "link" <?php print($content == 'statistics' ? 'active' : ''); ?> href="index.php?content=">Stats</a></span>
            <span class = "button"><a id = "link" <?php print($content == 'settings' ? 'active' : ''); ?> href="index.php?content="><i class="fa-regular fa-gear"></i></a></span>
    </div>
</body>
</html>