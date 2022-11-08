<?php
    $pdo = new PDO("mysql:host=localhost; dbname=2023-movies", "root", "root");

    $statementA = $pdo->query("SELECT id,title FROM movie");
    $statementA->setFetchMode(PDO::FETCH_ASSOC);
    echo 'Consulta A <br>';
    var_dump($statementA->fetchAll());
    echo '<br>';

    $statementB = $pdo->query("SELECT id,title FROM movie ORDER BY title");
    $statementB->setFetchMode(PDO::FETCH_ASSOC);
    echo 'Consulta B <br>';
    var_dump($statementB->fetchAll());
    echo '<br>';

    $statementC = $pdo->query("SELECT movie.id,movie.title,genre.name  FROM movie JOIN genre ON movie.genre_id=genre.id ORDER BY movie.release_date");
    $statementC->setFetchMode(PDO::FETCH_ASSOC);
    echo 'Consulta C <br>';
    var_dump($statementC->fetchAll());
    echo '<br>';

    $statementD = $pdo->prepare("SELECT * FROM movie WHERE id= :id");
    $statementD->setFetchMode(PDO::FETCH_ASSOC);
    $id=459489;
    $statementD->bindValue(':id',$id);
    $statementD->execute();
    echo 'Consulta D <br>';
    var_dump($statementD->fetchAll());
    echo '<br>';

    $statementE = $pdo->prepare("SELECT id,title FROM movie WHERE title LIKE :title");
    $statementE->setFetchMode(PDO::FETCH_ASSOC);
    $statementE->execute(['title' => "%te%"]);
    echo 'Consulta E <br>';
    var_dump($statementE->fetchAll());
    echo '<br>';

    $statementF = $pdo->query("SELECT id,title FROM movie WHERE release_date<'2020-01-01'");
    $statementF->setFetchMode(PDO::FETCH_ASSOC);
    echo 'Consulta F <br>';
    var_dump($statementF->fetchAll());
    echo '<br>';

    $statementG = $pdo->query("SELECT * FROM genre ");
    $statementG->setFetchMode(PDO::FETCH_ASSOC);
    echo 'Consulta G <br>';
    ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>number of movies</th>
        </tr>
        <?php foreach ($statementG->fetchAll() as $genre):?>
        <tr>
            <td><?=$genre['id']?></td>
            <td><?=$genre['name']?></td>
            <td><?=$genre['number_of_movies']?></td>
        </tr>
        <?php endforeach;?>
    </table>
</body>
</html>
