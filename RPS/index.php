<?php


require_once 'Elements/Element.php';
$pickableElements = [];
foreach (glob('Elements/SubElements/*.php') as $subElement) {
    $pickableElements[] = basename($subElement, '.php');
    require_once $subElement;
}


$cpuNumber = random_int(0, count($pickableElements) - 1);

if (isset($_POST['choice'])) {
    $result = (new $_POST['choice'])->beats(new $pickableElements[$cpuNumber]);

    switch ($result) {
        case -1:
            $result = 'You lose';
            break;
        case 0:
            $result = 'Tie';
            break;
        case 1:
            $result = 'You win';
            break;
    }
}
?>

<html>
<head>
    <title>Rock Paper Scissors... and more</title>
    <link href="styles.css" rel="stylesheet">
</head>

<body>
<? if (isset($result)) : ?>
<?= "<h1>$result</h1>";?>
<?endif;?>

<div class="match">
    <div class="player"><?= $_POST['choice'];?></div>
    <div class="vs">VS</div>
    <div class="player"><?php if (isset($_POST['choice'])) :?>
    <?= $pickableElements[$cpuNumber]; endif;?>
    </div>
</div>

<form action="index.php" id="choice" method="post">
<div id="choiceIcons">
    <?php foreach ($pickableElements as $element) {
        echo '<div>';
        echo '<button class="element" type="submit" name="choice" value="'. $element. '">';
        echo $element.'</button></div>';
    }?>
</div>
</form>

</body>




</html>
