<?php

require_once 'Person/Person.php';
require_once 'Person/PersonStorage.php';

$personStorage = new PersonStorage();
?>

<html>
<body>

<form action="/" method="get">
    Enter name: <input type="text" name="name">
    <button type="submit">Submit</button>
</form>


<?php if (isset($_GET['name'])) :?>
<h1>Requested person:</h1>
<?php $person = $personStorage->getPerson($_GET['name']);?>
Name: <?= $person->getName();?><br>
Age: <?= $person->getAge();?><br>
Count: <?= $person->getCount();?>
<?php endif;?>

</body>
</html>
