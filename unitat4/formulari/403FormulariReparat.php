<?php

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $url = $_POST["url"];
}
 else {
     $errors[] = "No s'ha enviat el formulari";
 }
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>403</title>
</head>
<body>

    <?php if (count($errors)==0) :?>
     <table>
        <tr>
            <th>Nom</th>
            <td><?=$nom?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?=$email ?></td>
        </tr>
        <tr>
            <th>Telèfon</th>
            <td><?=$phone?></td>
        </tr>
        <tr>
            <th>Url</th>
            <td><?=$url?></td>
        </tr>
    </table>
    <?php else : ?>
    <?php foreach ($errors as $error)
            echo $error
        ?>
    <?php endif; ?>

</body>
</html>
