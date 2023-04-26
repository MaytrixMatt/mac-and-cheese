<?php
include('library.php');
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="icon" href="mac_logo.png">
    <title>MAC</title>

</head>
<body>
    <!-- Standard navigation buttons for all pages -->
    <div class = "center">
            <img src="mac_logo.png" alt="MAC EVERYTHING" width="60px" length="60px">
            <span class = "button"><a id = "link"  href="index.php?content=home">Home</a></span>
            <span class = "button"><a id = "link"  href="index.php?content=recipes">Recipes</a></span>
            <span class = "button"><a id = "link"  href="index.php?content=statistics">Stats</a></span>
            <span><a id = "link"  href="index.php?content=settings"><i class="fa-regular fa-gear"></i></a></span>
            <?php include(get_content() . '.php'); ?>
    </div>
</body>
</html>