<?php
declare(strict_types=1);
require_once 'bootstrap.php';

use App\Helpers\Exceptions\NoUploadedFileException;
use App\Helpers\Exceptions\UploadedFileException;
use App\FlashMessage;
use App\Helpers\UploadedFileHandler;
use App\Helpers\Validator;
use App\Photo;
use App\Registry;
use App\Services\PhotoRepository;
use App\Services\TweetRepository;
use App\Services\UserRepository;
use App\Tweet;

const UPLOAD_PATH = "uploads";
const MAX_SIZE = 1024 * 1024 * 3;

$errors = [];
$data = [];

$userRepository = Registry::get(UserRepository::class);
$tweetRepository = Registry::get(TweetRepository::class);
$photoRepository = Registry::get(PhotoRepository::class);
$log = Registry::get('logger');

$newFilename = "";

$text = filter_input(INPUT_POST, "text", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

try {
    Validator::lengthBetween($text, 2, 280);
    $data["text"] = $text;
} catch (InvalidArgumentException $e) {
    $errors[] = $e->getMessage();
}
$validTypes = ["image/jpeg", "image/jpg", "image/png"];

if (empty($errors)) {

    try {
        $uploadedFile = new UploadedFileHandler($_FILES["file"], $validTypes, MAX_SIZE);
        $newFilename = $uploadedFile->handle(UPLOAD_PATH);
    } catch (NoUploadedFileException $e) {
    } catch (UploadedFileException $e) {
        $errors[] = $e->getMessage();
    } catch (Exception $exception) {
        $errors[] = "Error general:" . $exception->getMessage();
    }
}

if (!empty($errors)) {
    FlashMessage::set('errors', $errors);
    FlashMessage::set('data', $data);
    header('Location:tweet-new.php');
    exit();
} else {

    try {
        $data = [
            'text' => $text,
            'user_id' => $_SESSION['user']->getId(),
            'created_at' => date("Y-m-d h:i:s"),
            'like_count' => 0
        ];
        $user = $userRepository->find($data['user_id']);
        if (empty($user)) {
            header("Location: login.php");
            exit();
        }
        $tweet = new Tweet($data["text"], $user);
        $tweet->setCreatedAt(new DateTime());
        $tweet->setLikeCount(0);

        $tweetRepository->save($tweet);

        if (!empty($newFilename)) {
            try {
                list($width, $height) = getimagesize(UPLOAD_PATH . "/" . $newFilename);
                $photo = new Photo($newFilename, $width, $height, $newFilename);
                $photo->setUrl($newFilename);
                $photo->setTweet($tweet);
                $tweet->addAttachment($photo);
                $photoRepository->save($photo);
            } catch (Exception $e) {
                $errors[] = $e->getMessage();
            }
        }
    } catch (PDOException $e) {
        die($e->getMessage());
    }

    if (!empty($errors)) {
        FlashMessage::set("errors", $errors);
        header('Location:tweet-new.php');
        exit();
    }

    $_SESSION["data"] = $data;
    $log->warning("L'usuari ".$user->getUsername()." ha creat un tweet");
    header('Location:index.php');
    exit();
}