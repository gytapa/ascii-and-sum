<?php
    include "asciicontroller.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../styles.css">
    <title>ASCII</title>
</head>
<body>
<body>
<nav class="navbar navbar-expand-lg ">
    <a class="navbar-brand" href="/asciiandsum">Home</a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <span class="nav-link active" href="#">Ascii table</span>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/asciiandsum/sum">Sum of array</a>
            </li>
        </ul>
    </div>
</nav>
<div id="container">
    <h2>ASCII table</h2>
    <p>output of your uploaded file, everything in ASCII table</p>
    <strong><a href="index.php">Upload another file</a><strong>
    <div id="table">
    <?php
        echo fileToTable($_FILES['userUpload']);
    ?>
    </div>
</div>
</body>
</html>