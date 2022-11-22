<?php?>
<!DOCTYPE html>
<html lang="ca">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"></head>
</head>
<body>

<main class="border-top mt-4 border-4 border-primary container">
    <div class="row">
        <div class="col-2 border d-flex flex-column justify-content-between">
            <?php require "partials/sidebar.php" ?>
        </div>
        <div class="col-7 border p-4">
            <h2>Segur que vols eliminar la cuenta?</h2>
            <p>Tens <?=$numberOfTweets?> tweets en aquesta cuenta</p>
            <hr>
                <form class="mb-4" method="get" action="logout.php">
                    <button class="btn btn-danger">Si</button>
                    <a class="btn btn-primary" href="index.php">No</a>
                </form>
        </div>
        <div class="col-3 border"></div>
    </div>
</main>
</body>
</html>