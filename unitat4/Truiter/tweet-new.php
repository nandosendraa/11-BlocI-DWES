<?php
$errors = [];
$isPost = false;
$user = "";
$tweetContent = "";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>422</title>
</head>
<body>
<?php if (!count($errors)==0) : ?>
    <?php foreach ($errors as $error)
        echo $error."<br>"
    ?>
<?php endif;?>
<?php if(!$isPost || !empty($errors)) :?>
    <form action="login.php" method="POST">
        <p>
            <label for="user">Usuari :</label>
            <input type="text" id="user" name="user" <?php if ($user != ""):?>value="<?=$user?>"<?php endif; ?>>
        </p>
        <p>
            <label for="password">Contrasenya :</label>
            <input type="text" id="password" name="password" <?php if ($password != ""):?>value="<?=$password?>"<?php endif; ?>>
        </p>
        <input type="submit" name="Enviar">
    </form>
<?php endif;?>
<?php if (count($errors)==0 && $isPost) :?>
    <h2>Benvingut <?=$user?>!!</h2>
    <p>Polse <a href="logout.php">ací</a> per a eixir</p>
<?php endif;?>
</body>
</html>