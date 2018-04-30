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
    <h2>Print associative array in an ASCII table</h2>
    <p>Select a file from your computer that contains 4 fields about each specimen (Name, Color, Element, Likes)</p>
    <p>Each line of text represents one specimen (one row of the table). </p>
    <p>If a row doesn't contain all 4 elements It will leave empty cells for each missing element (from right)</p>
    <p>Extra elements for a row will be ignored</p>
    <p><strong>Note:</strong> Please upload a .csv file (rows seperated by '\n' and columns seperated by ','</p>
    <form action="/asciiandsum/ascii/output.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="userfile">Upload a file to print in table</label>
            <input type="file" name="userUpload" id="userfile" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>