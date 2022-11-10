<?php
//ye
declare(strict_types=1);
session_start();

$isPost = false;
if (empty($_SESSION["errors"]))
    $errors = [];
else {
    $errors = $_SESSION["errors"];
    unset($_SESSION["errors"]);
}

$name = $_SESSION["data"]["name"] ?? "";
$email = $_SESSION["data"]["email"] ?? "";
$phone = $_SESSION["data"]["phone"] ?? "";
$url = $_SESSION["data"]["url"] ?? "";
$selectedGenre = $_SESSION["data"]["selectedGenre"] ?? "";
$selectedHobbies = $_SESSION["data"]["selectedHobbies"] ?? [];
$selectedTime = $_SESSION["data"]["selectedTime"] ?? [];

unset($_SESSION["data"]);

require 'inc/data.php';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulari BD</title>
</head>
<body>

<?php if ($isPost == false || !empty($errors)): ?>
    <?php if (!empty($errors)): ?>
        <h2>Errors</h2>
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>

    <?php endif; ?>
    <form action="form-process.php" method="post">
        <p><label>Nom i cognoms: </label>
            <input type="text" name="name" value="<?= $name ?>"/></p>

        <p><label>Correu electrònic: </label>
            <input type="text" name="email" value="<?= $email ?>"/></p>

        <p><label>Telèfon: </label>
            <input type="text" name="phone" value="<?= $phone ?>"/></p>

        <p><label>URL pàgina personal: </label>
            <input type="text" name="url" value="<?= $url ?>"/></p>

        <p><label>Gènere: </label>
            <?php foreach ($genres as $key => $genere): ?>
                <label for="<?= $key ?>"><?= $genere ?> </label>
                <input <?php echo ($key == $selectedGenre) ? "checked" : ""; ?> id="<?= $key ?>" type="radio"
                                                                               name="genre"
                                                                               value="<?= $key ?>"/>
            <?php endforeach; ?>

        <div><label>Hobbies: </label>
            <?php foreach ($hobbies as $key => $hobby): ?>
                <label>
                <input type="checkbox" name="hobbies[]"
                       value="<?= $key ?>" <?php echo(in_array($key, $selectedHobbies) ? "checked" : ""); ?> />
                </label><?= $hobby ?>
            <?php endforeach; ?>
        </div>

        <p><label for="contact">Contact Time: </label></p>
        <select id="contact" name="contact_time[]" multiple>
            <?php foreach ($contact_time as $key => $time): ?>
                <option <?php echo(in_array($key, $selectedTime) ? "selected" : ""); ?>
                        value="<?= $key ?>"><?= $time ?></option>
            <?php endforeach; ?>
        </select>

        <p><input type="submit" value="Enviar"></p>
    </form>

<?php endif; ?>
</body>
</html>

