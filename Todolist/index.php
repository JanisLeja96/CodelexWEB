<?php

require_once 'Items/Task.php';
require_once 'Items/TaskList.php';

$list = new TaskList();

if (isset($_POST['name'])) {
    $list->addTask(new Task($_POST['name'], $_POST['description']));
}

if (isset($_POST['id'])) {
    $list->removeByID($_POST['id']);
}
?>


<html>
<body>
<h1>ToDo List</h1>

<ul>
    <?php foreach ($list->getTasks() as $task) : ?>
    <?= "<li><form method='post'>ID: {$task->getID()}, Name: {$task->getName()}, Description: {$task->getDescription()}";?>
    <?= "<input type='hidden' name='id' value='{$task->getID()}'>";?>
    <?= '<button type="submit" name="delete">X</button></form></li>';?>
    <?php endforeach;?>
</ul>

<h1>Add task</h1>

<form method="post">
    Task name: <input name="name">
    Task description: <input name="description">
    <button type="submit">Add task</button>
</form>
</body>

</html>
