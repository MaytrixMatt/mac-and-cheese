<?php
include('library.php');
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="macStyles.css">
    <link rel="icon" href="mac_logo.png">
    <title>MAC</title>

</head>
<body>
    <!-- Standard navigation buttons for all pages -->
    <div class = "center">
            <img src="mac_logo.png" alt="MAC EVERYTHING" width="100px" length="100px"></img>
            <h2>M.A.C.<h2>
            <span class = "button"><a id = "link"  href="index.php?content=home">Home</a></span>
            <span class = "button"><a id = "link"  href="index.php?content=recipes">Recipes</a></span>
            <span class = "button"><a id = "link"  href="index.php?content=statistics">Stats</a></span>
            <span><a href="index.php?content=settings"><i class="fa-regular fa-gear"></i></a></span>
            <br />
            <br />

            <?php include(get_content() . '.php'); ?>
    </div>
</body>
</html>