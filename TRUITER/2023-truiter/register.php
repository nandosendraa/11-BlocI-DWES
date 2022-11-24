<?php
session_start();
use App\FlashMessage;
require 'autoload.php';
$err = FlashMessage::get('errors');
require 'views/register.view.php';