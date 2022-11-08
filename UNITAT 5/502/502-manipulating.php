<?php
    $pdo = new PDO("mysql:host=localhost; dbname=2023-movies", "root", "root");

//Apartat A
    $statementA = $pdo->prepare("INSERT INTO movie (id, title, overview, release_date, poster, genre_id) VALUES (:id, :title, :overview, :release_date, :poster, :genre_id)");
    $statementA->bindValue(':id',null);
    $statementA->bindValue(':title','spiderman');
    $statementA->bindValue(':overview','spiderman');
    $statementA->bindValue(':release_date','2019-10-05');
    $statementA->bindValue(':poster','spiderman');
    $statementA->bindValue(':genre_id','12');
    $statementA->execute();
echo 'Consulta A <br>';
    var_dump($pdo->lastInsertId());
echo '<br>';
    $resultA = $pdo->query("SELECT * FROM movie WHERE title = 'spiderman'");
    var_dump($resultA->fetchAll());
echo '<br>';

//Apartat B
    $statementB = $pdo->prepare("UPDATE movie SET title=:title WHERE title='spiderman'");
    $statementB->execute([':title'=>'spiderman(copia)']);

echo 'Consulta B <br>';
    $resultB = $pdo->query("SELECT * FROM movie WHERE title = 'spiderman(copia)'");
    var_dump($resultB->fetchAll());
echo '<br>';

//Apartat C
    $statementC = $pdo->prepare("INSERT INTO genre (id, name, number_of_movies) VALUES (:id, :name, :number_of_movies)");
    $statementC->bindValue(':id',17);
    $statementC->bindValue(':name','marvel');
    $statementC->bindValue(':number_of_movies',2);
    $statementC->execute();

    $statementGenre = $pdo->prepare("UPDATE movie SET genre_id=17 WHERE title='spiderman(copia)'");
    $statementGenre->execute();
echo 'Consulta C <br>';
$resultB = $pdo->query("SELECT * FROM movie WHERE title = 'spiderman(copia)'");
var_dump($resultB->fetchAll());
echo '<br>';

//Apartat D Donara error perque una pelicula utilitza el ID com a FOREGIN KEY
   // $statementD = $pdo->prepare("DELETE FROM genre WHERE `genre`.`id` = 17");
  //  $statementD->execute();
echo 'Consulta D Donara error perque una pelicula utilitza el ID com a FOREGIN KEY <br>';

//Apartat E
    $statementE1 = $pdo->prepare("DELETE FROM movie WHERE `movie`.`title` = 'spiderman(copia)'");
    $statementE1->execute();
    $statementE2 = $pdo->prepare("DELETE FROM genre WHERE `genre`.`id` = 17");
    $statementE2->execute();
echo "Consulta E s'ha eliminat tot correctament<br>";








