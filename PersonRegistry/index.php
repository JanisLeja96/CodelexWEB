<?php


require_once './Person/Person.php';
require_once './Person/PersonStorage.php';

$storage = new PersonStorage();

if (isset($_POST['name'])) {
    if ($storage->findByCode($_POST['personalCode']) == null) {
        $storage->addPerson(new Person(
            $_POST['name'],
            $_POST['lastName'],
            $_POST['personalCode'],
            $_POST['address']
        ));
        $storage->saveToCSV();
    }
}


?>

<html>
<body>
<h1>Person Registry</h1>

<form method="post" action="/">
    Name: <input name="name" type="text">
    Last Name: <input name="lastName" type="text">
    Personal Code: <input name="personalCode" type="text">
    Address: <input name="address" type="text">
    <button type="submit">Add Person</button>
</form>
<br>
<br>
<h1>Search</h1>
<br>

<form method="post" action="/">
    Personal Code: <input name="personalCodeSearch" type="text">
    <button type="submit">Find</button>
</form>

<?php if (isset($_POST['personalCodeSearch'])) {
    if ($storage->findByCode($_POST['personalCodeSearch']) != null) {
        echo $storage->findByCode($_POST['personalCodeSearch']);
    } else {
        echo 'Not found!';
    }
}
?>



</body>


</html>
