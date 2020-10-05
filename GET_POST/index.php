<?php

$colors = ['red', 'blue', 'green', 'yellow'];
$number = 1;
$currentColor = $colors[$_POST['color']] ?? $colors[$number];
$size = $_GET['size'] ? $_GET['size'] + $_GET['size'] / 4 : 50;



?>

<html>
<body>

<div style="width: <?php echo $size;?>px;height: <?php echo $size;?>px; background-color: <?php echo $currentColor;?>;"></div>
<form action="index.php" id="form1" method="post">
    <button type="submit" name="color" value="<?php echo $number?>">Change color</button>
</form>
<form action="index.php" id="form2" method="get">
    <button type="submit" name="size" value="<?php echo $size;?>">Change size</button>
</form>


</body>
</html>
