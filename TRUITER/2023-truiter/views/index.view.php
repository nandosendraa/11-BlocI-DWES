<!DOCTYPE html>
<html lang="ca">
<head>
    <title>Truiter: una grollera còpia de Twitter</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"></head>
<body>


<main class="mt-4 container">
    <div class="row">
        <div class="position-fixed col-2 d-flex flex-column justify-content-between h-75">
            <?php require "partials/sidebar.php" ?>
        </div>
        <div class="offset-2 col-6 border-start border-end border-1 p-4">
            <h1>Welcome to Truiter</h1>
            <?php if (!empty($_SESSION['user'])):?>
                <form action="tweet-new.php" method="get">
                    <button class="btn btn-primary">Nou Truit</button>
                </form>
            <?php endif;?>

            <p><?= $twitter->getNumberOfUsers() ?> users, <?= $twitter->getNumberOfTweets() ?> tweets.</p>
            <h2>Users</h2>
            <?php foreach ($users as $user) : ?>
                <p><?= $user['name'] ?> (@<?= $user['username'] ?>) - Creation
                    date: <?= $user['created_at'] ?></p>
            <?php endforeach; ?>

            <h2>Tweets</h2>

            <?php foreach ($tweets as $tweet) : ?>
                <?php
                $stmt = $pdo->prepare("SELECT * FROM user WHERE id LIKE :id");
                $stmt->bindValue(':id',$tweet['user_id']);
                $stmt->execute();
                $tweetUser = $stmt->fetch();
                ?>
                <p><?= $tweetUser['name'] ?> (@<?= $tweetUser['username'] ?>) - Creation
                    date: <?= $tweet['created_at']?></p>
                <blockquote><?= $tweet['text'] ?></blockquote>
                <p>Like counter: <?= $tweet['like_count']; ?></p>
                <hr/>
            <?php endforeach; ?>
        </div>
        <div class="col-4"></div>
    </div>
</main>
</body>
</html>