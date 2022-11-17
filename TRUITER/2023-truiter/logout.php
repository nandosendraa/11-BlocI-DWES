<?php
$msg = "";
session_start();
$pdo = new PDO("mysql:host=localhost; dbname=truiter", "root", "root");
if ($_SERVER['REQUEST_METHOD'] === 'GET'){
        $stmt = $pdo->prepare("DELETE FROM `tweet` WHERE user_id LIKE :id");
            $stmt->bindParam(":id", $_SESSION['id']);
        $stmt->execute( );

        $stmt = $pdo->prepare("DELETE FROM `user` WHERE username LIKE :username");
            $stmt->bindParam(":username", $_SESSION['user']);
        $stmt->execute();
}
if (empty($_SESSION['user']))
    $msg='<p>Primer has de <a href="login.php">logar-te</a></p>';
else {
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
