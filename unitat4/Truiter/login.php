<?php
$usuaris = ['user' => 'nando', 'password' => '1234a'];
$errors = [];
$isPost = false;
$user = "";
$password = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $isPost = true;
    $user = $_POST["user"];
    $password = $_POST["password"];

    if (empty($user))
        $errors[] = "Has de introduir l'usuari";

    if (empty($password))
        $errors[] = "Has de introduir la contrasenya";

    if ($user!==$usuaris['user']){
        $errors[] = "L'usuari no es correcte";
    }

    if ($password!==$usuaris['password']){
        $errors[] = "La contrasenya no es correcta";
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>406</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>405</title>
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
            <label for="name">Usuari :</label>
            <input type="text" id="user" name="user" <?php if ($user != ""):?>value="<?=$user?>"<?php endif; ?>>
        </p>
        <p>
            <label for="name">Contrasenya :</label>
            <input type="text" id="password" name="password" <?php if ($password != ""):?>value="<?=$password?>"<?php endif; ?>>
        </p>
        <input type="submit" name="Enviar">
    </form>
<?php endif;?>
<?php if (count($errors)==0 && $isPost) :?>
    <h2>Benvingut <?=$user?>!!</h2>
<?php endif;?>
</body>
</html>