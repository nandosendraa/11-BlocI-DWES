<?php
$msg = "";
session_start();
require('bootstrap.php');
use App\FlashMessage;

if (empty($_SESSION['user']))
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
