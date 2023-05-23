<?php
include('library.php');
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="js/jquery.js"></script>
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" type="text/css" href="css/customStyles.css">
    <link rel="icon" href="mac_logo.png">

</head>
<body>
    <!-- Standard navigation buttons for all pages -->
    <div class = "center">
            <img src="mac_logo.png" alt="MAC EVERYTHING" width="200px" length="200px"></img>
            <h2>M.A.C.</h2>
            <span class = "button"><a id = "link"  href="index.php?content=home">Home</a></span>
            <span class = "button"><a id = "link"  href="index.php?content=recipes">Recipes</a></span>
            <span class = "button"><a id = "link"  href="index.php?content=statistics">Stats</a></span>
            <span class = "button"><a id = "link"  href="index.php?content=login-signup">Login/Sign-up</a></span>
            <span class = "button"><a id = "link"  href="index.php?content=userSettings"><?php echo $_SESSION['displayName'] ?></a></span>
            <span class = "button"><a id = "link"  href="logout.php">Logout</a></span>
            <i class="fa-regular fa-gear"></i>
            <br />
            <br />

            <?php include(get_content() . '.php'); ?>
    </div>
</body>
</html>