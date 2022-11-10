<?php
session_start();

$name = $_SESSION["data"]["name"] ?? "";
$email = $_SESSION["data"]["email"] ?? "";
$phone = $_SESSION["data"]["phone"] ?? "";
$url = $_SESSION["data"]["url"] ?? "";
$selectedGenre = $_SESSION["data"]["selectedGenre"] ?? "";
$selectedHobbies = $_SESSION["data"]["selectedHobbies"] ?? [];
$selectedTime = $_SESSION["data"]["selectedTime"] ?? [];

require 'inc/data.php';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulari DB</title>
</head>
<body>
<table border="1">
    <tr>
        <th>Nom i cognoms</th>
        <td><?= $name ?></td>
    </tr>
    <tr>
        <th>Correu electrònic</th>
        <td><?= $email ?></td>
    </tr>
    <tr>
        <th>Telèfon</th>
        <td><?= $phone ?></td>
    </tr>
    <tr>
        <th>URL pàgina personal</th>
        <td><?= $url ?></td>
    </tr>
    <tr>
        <th>Gènere</th>
        <td>
            <?= $genres[$selectedGenre]  ?>
        </td>
    </tr>
    <tr>
        <th>Hobbies</th>
        <td>
            <?php foreach ($selectedHobbies as $key => $hobby): ?>
                <!-- "programming" => "Programació", -->
            <?= $hobbies[$hobby] . ", " ?>
                <?php endforeach; ?>
        </td>
    </tr>
    <tr>
        <th>Contact time</th>
        <td>
            <?php foreach ($selectedTime as $key => $time): ?>
                    <?= $contact_time[$time] . ", " ?>
                <?php endforeach; ?>
        </td>
    </tr>
</table>
</body>
</html>