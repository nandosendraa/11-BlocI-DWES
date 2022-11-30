<?php
require_once 'bootstrap.php';

use App\FlashMessage;

// ací va la lògica per crear un nou tweet

$errors = FlashMessage::get('errors', []);
$data = FlashMessage::get('data',[]);
$message = FlashMessage::get('message');


if (empty($_SESSION["user"])) {
    header('Location: login.php');
}

$user = $_SESSION["user"];

require 'views/tweet-new.view.php';