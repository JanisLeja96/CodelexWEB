<?php

require_once 'Safe.php';
session_start();
$buttons = [1, 2, 3, 4, 5, 6, 7, 8, 9];
$safe = new Safe(1234);

if (isset($_POST['code'])) {
    $_SESSION['code'] .= $_POST['code'];
}

if (strlen($_SESSION['code']) >= 4) {
    $status = $safe->unlock($_SESSION['code']);
    session_destroy();
}


?>

<html>
<head>
    <style>
        .container {
            width: 50%;
            height: 50%;
            margin-left: auto;
            margin-right: auto;
        }

        .buttons {
            width: 450px;
            height: 260px;
            display: flex;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: auto;
            align-content: space-around;
            justify-content: center;
            flex-wrap: wrap;
        }

        .button {

            height: 50px;
            width: 110px;
            margin: 5px;
            font-size: 24px;
        }

        .attempts {
            width: 400px;
            height: 100px;
            margin-top: 30%;
            margin-left: auto;
            margin-right: auto;
            font-size: 48px;
            text-align: center;
        }


    </style>
</head>
<body>
<div class="container">
    <div class="attempts">

        <?php if (isset($_SESSION['code'])) {
            for ($i = 0; $i < strlen($_SESSION['code']); $i++) {
                echo 'X';
            }
        } ?>
        <br>
        <?php if (isset($status)) {
            echo $status;
        }?>

    </div>


    <div class="buttons">
        <?php foreach ($buttons as $button) : ?>
            <?= '<form method="post" action="/" name="code">'; ?>
            <?= "<input type='submit' name='code' value='{$button}' class='button'></form>" ?>
        <?php endforeach; ?>
    </div>
</div>


</body>
</html>
