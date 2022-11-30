<?php
use App\FlashMessage;
require 'bootstrap.php';
$err = FlashMessage::get('errors');
require 'views/register.view.php';