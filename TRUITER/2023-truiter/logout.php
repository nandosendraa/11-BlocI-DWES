<?php
$msg = "";
session_start();
require('src/App/FlashMessage.php');
use App\FlashMessage;

$pdo = new PDO("mysql:host=localhost; dbname=truiter", "root");
if ($_SERVER['REQUEST_METHOD'] === 'GET'){
        $stmt = $pdo->prepare("DELETE FROM `tweet` WHERE user_id LIKE :id");
            $stmt->bindValue(":id", FlashMessage::get('id',[]));
        $stmt->execute( );

        $stmt = $pdo->prepare("DELETE FROM `user` WHERE username LIKE :username");
            $stmt->bindValue(":username", FlashMessage::get('user'.[]));
        $stmt->execute();
}
if (empty(FlashMessage::get('user',[])))
    $msg='<p>Primer has de <a href="login.php">logar-te</a></p>';
else {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LogOut</title>
</head>
<body>
<?=$msg?>
</body>
</html>
