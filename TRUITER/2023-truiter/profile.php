<?php
use App\FlashMessage;
require 'bootstrap.php';
$err = FlashMessage::get('errors');
require 'views/profile.view.php';