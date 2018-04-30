
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../styles.css">
    <title>SUB-ARRAYS</title>
</head>
<body>
<body>
<nav class="navbar navbar-expand-lg ">
    <a class="navbar-brand" href="/asciiandsum">Home</a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link " href="/asciiandsum/ascii">Ascii table</a>
            </li>
            <li class="nav-item">
                <span class="nav-link active" href="#">Sum of array</span>
            </li>
        </ul>
    </div>
</nav>

<div id="container">
    <h1>Create sub-arrays of similar sums</h1>
    <p>Input numbers (integers) separated by commas ( , ) or spaces in the text area bellow.</p>
    <p>Inputted numbers will be matched to sub-arrays of as similar sums as it can, to learn more about how this algorithm works<strong><a href="about.html"> click here</a></strong></p>
    <br>
    <form  id="form" method="post" action="output.php">
        <div class="form-group">
            <label for="numbers">Numbers to group:</label>
            <textarea class="form-control" name="input" rows="5" id="input"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>