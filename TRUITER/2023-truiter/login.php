<?php
    session_start();
    require 'autoload.php';
    use App\FlashMessage;
    $err = FlashMessage::get('errors');
    require 'views/login.view.php';

