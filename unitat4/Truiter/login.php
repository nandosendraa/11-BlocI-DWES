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
if(!$isPost || !empty($errors)){
    session_start();
    $_SESSION['user'] = $user;
}

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
