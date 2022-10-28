<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $isPost = true;
    $user = $_POST["user"];
    $tweetContent = $_POST["tweetContent"];

    if (empty($user))
        $errors[] = "Has de introduir l'usuari";

    if (empty($password))
        $errors[] = "Has de introduir la contrasenya";

}
if(!empty($errors)){
    $_SESSION['user'] = $user;
}
?>