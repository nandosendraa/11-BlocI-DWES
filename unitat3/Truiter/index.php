<?php
include "src/Tweet.php";
include "src/Media.php";
include "src/Photo.php";
include "src/Twitter.php";
include "src/User.php";
include "src/Video.php";

$twitter = new Twitter();

$user = new User('Bart Simpson', 'bart');
$twitter->addUser($user);

// fem un delay de 4 segons perquè les dates de creació no coincidisquen
sleep(4);
$userH = new User('Homer Simpson', 'homerj');
$twitter->addUser($userH);

$users = $twitter->getUsers();

sleep(4);
$tweet = new Tweet('Hola món!', $user);
$video = new Video('Vídeo 1', 1080, 1024, 25);
$photo = new Photo('Foto 1', 1080, 1024, 'Text alternatiu');

$tweet->addAttachment($video);
$tweet->addAttachment($photo);

$twitter->addTweet($tweet);
$twitter->LikeTweet($user, $tweet);
$twitter->LikeTweet($userH, $tweet);

$tweet = new Tweet("Kids, just because I don’t care doesn’t mean I’m not listening.", $userH);
$twitter->addTweet($tweet);

$tweet = new Tweet("I’ve learned that life is one crushing defeat after another until you just wish Flanders was dead.", $userH);
$twitter->addTweet($tweet);

$tweets = $twitter->getTweets();
?>
    <h1>Welcome to Truiter</h1>

    <p><?= $twitter->getNumberOfUsers() ?> users, <?= $twitter->getNumberOfTweets() ?> tweets.</p>
    <h2>Users</h2>
<?php foreach ($users as $user) : ?>
    <p><?= $user->getName() ?> (@<?= $user->getUsername() ?>) - Creation
        date: <?= $user->getCreatedAt()->format('d-m-Y h:i:s') ?></p>
<?php endforeach; ?>

    <h2>Tweets</h2>

<?php foreach ($tweets as $tweet) : ?>

    <?php $tweetUser = $tweet->getAuthor() ?>
    <p><?= $tweetUser->getName() ?> (@<?= $tweetUser->getUsername() ?>) - Creation
        date: <?= $tweet->getCreatedAt()->format('d-m-Y h:i:s') ?></p>
    <blockquote><?= $tweet->getText() ?></blockquote>
    <p>Like counter: <?= $tweet->getLikeCount(); ?></p>
    <?php if (count($tweet->getAttachments()) > 0) : ?>
        <h3>Attachments</h3>
        <ul>
            <?php foreach ($tweet->getAttachments() as $attachment) : ?>
                <li><?= $attachment->getSummary() ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif ;?>
    <hr/>
<?php endforeach; ?>