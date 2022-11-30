<?php
    require 'bootstrap.php';
    use App\FlashMessage;
    $err = FlashMessage::get('errors');
    require 'views/login.view.php';

