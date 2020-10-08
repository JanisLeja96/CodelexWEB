<?php

require_once 'Requester/Requester.php';
require_once 'Person/Person.php';
require_once 'Person/PersonStorage.php';

$req = new Requester();

$stor = new PersonStorage();
var_dump($stor->persons);
?>


<html>
<body>

<form action="/" method="get">
    Enter name: <input type="text" name="name">
    <button type="submit">Submit</button>
</form>




</body>
</html>
