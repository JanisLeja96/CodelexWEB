<?php

require_once 'Person/Person.php';
require_once 'Person/PersonStorage.php';

$database = new PersonStorage();
$personToFind = null;

if (isset($_POST['phone'])) {
    if ($database->findByPhone((int) $_POST['phone']) != null) {
        $personToFind = $database->findByPhone((int) $_POST['phone']);
    }
}


?>

<html>
<body>

<form method="post" action="/">
    Enter phone number:<input name="phone" type="number">
    <input type="submit">
</form>

<?php if ($personToFind != null) :?>
<h2>Person found:</h2><br>
<?= $personToFind->getFirstName();?>
<?= ' ' . $personToFind->getLastName();?>

<?php elseif (isset($_POST['phone']) && $personToFind == null) :?>
<h2>Phone number not found</h2>
<?php endif;?>




</body>
</html>
