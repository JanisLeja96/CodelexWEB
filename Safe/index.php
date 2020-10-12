<?php

require_once 'Safe/Safe.php';
session_start();
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
            position: relative;
            justify-content: center;
            justify-items: center;
            align-content: center;
            align-items: center;
        }

        .buttons {
            width: 450px;
            height: 260px;
            display: inline;
            position: absolute;
            top: 50%;
            left: 50%;
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .button {
            height: 50px;
            width: 110px;
            margin: 5px;
            font-size: 24px;
            display: inline;
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
        <form method="post" action="/">
            <button class="button" type="submit" name="code" value="1">1</button>
            <button class="button" type="submit" name="code" value="2">2</button>
            <button class="button" type="submit" name="code" value="3">3</button>
            <button class="button" type="submit" name="code" value="4">4</button>
            <button class="button" type="submit" name="code" value="5">5</button>
            <button class="button" type="submit" name="code" value="6">6</button>
            <button class="button" type="submit" name="code" value="7">7</button>
            <button class="button" type="submit" name="code" value="8">8</button>
            <button class="button" type="submit" name="code" value="9">9</button>
        </form>
    </div>
</div>


</body>
</html>
