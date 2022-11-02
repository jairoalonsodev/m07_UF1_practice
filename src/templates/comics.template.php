<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comic Viewer</title>
    <link rel="icon" type="image/x-icon" href="/img/onePieceLogo.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="./index.html"><img src="/img/onePieceLogo.ico" width="75px" height="75px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="./index.html">Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="./comics.html">Comics Viewer <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./csvData.html">CSV Data</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./apiCaller.html">API Caller</a>
            </li>
            </ul>
        </div>
    </nav>
    <?php 
        $capNumber = 1059;
        $capitulo = "capitulo ".$capNumber;
        $pattern = "/capitulo*_00.jpg/i";
        foreach($imageArrayWithNewPath as $image) {
            echo 
            "<div class='card' style='width: 18rem;'>
                <img class='card-img-top' src='$image' alt='Card image cap'>
                <div class='card-body'>
                    <h5 class='card-title'>One Piece</h5>
                    <p class='card-text'>$capitulo</p>
                    <a href='#' class='btn btn-primary'>Go somewhere</a>
                </div>
            </div>";
            $capNumber++;
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>