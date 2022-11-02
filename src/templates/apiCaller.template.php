<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Caller</title>
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
                <a class="nav-link" href="./comics.html">Comics Viewer</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./csvData.html">CSV Data</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="./apiCaller.html">API Caller <span class="sr-only">(current)</span></a>
            </li>
            </ul>
        </div>
    </nav>
    <table class="table table-dark table-striped">
        <tr>
            <th colspan="2" style="text-align: center; font-family:Arial; font-size:25px;">Anime Voice Actors</th>
        </tr>
    <?php 
        foreach($response as $name => $url) {
            echo "<tr><td>".$name."</td><td><a href='$url'>".$url."</a></td></tr>";
        }
    ?>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>