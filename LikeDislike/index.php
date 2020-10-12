<?php

require_once 'Picture/Picture.php';
require_once 'Picture/PictureStorage.php';

$storage = new PictureStorage();

if (isset($_POST['like'])) {
    $storage->like($_POST['like']);
} else if (isset($_POST['dislike'])) {
    $storage->dislike($_POST['dislike']);
}
?>

<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>

        .container {
            width: 100%;
        }

        .picture {
            width: 400px;
            margin-right: auto;
            margin-left: auto;
        }

        img {
            width: 400px;
        }

        button {
            width: 50px;
            height: 50px;
            position: relative;
            left: 58%;
            margin-left: 5px;
            margin-right: 5px;
        }

        .details {
            width: 100%;
            height: 50px;
            justify-self: center;
        }

        .detail {
            float: left;
            display: inline-block;
        }

    </style>
</head>

<body>
<div class="container">
    <?php foreach ($storage->getPictures() as $number => $picture) : ?>
    <?= "<div class='picture'><img src='{$picture->getURL()}'>"; ?>
    <div class="details">
        <?= "<div class='detail'>Score: {$picture->getScore()}</div>"; ?>

        <?= '<form method="post" action="/">'; ?>
        <?= '<button type="submit" class="detail" name="like" value="' . $number . '"><i class="fa fa-thumbs-o-up"></i></button></form>' ?>

        <?= '<form method="post" action="/">'; ?>
        <?= '<button type="submit" class="detail" name="dislike" value="' . $number . '"><i class="fa fa-thumbs-o-down"></i></button></form></div>' ?>
        <?php endforeach; ?>
    </div>


</body>
</html>
