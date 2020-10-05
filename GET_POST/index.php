<?php

$min = $_POST['Min'];
$max = $_POST['Max'];

?>

<html>
<body>

<form action="index.php" method="post">
    Min: <input type="text" name="Min"><br>
    Max: <input type="text" name="Max"><br>
    <input type="submit">
</form>

    Random number: <?php echo random_int($min, $max);?>

</body>
</html>
