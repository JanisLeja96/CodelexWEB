<?php

require_once 'User/User.php';
require_once 'User/UserDatabase.php';
require_once 'Message/Message.php';
require_once 'Message/MessageStorage.php';

session_start();

$userDatabase = new UserDatabase();
$messageStorage = new MessageStorage();

if (isset($_POST['pin']) && $userDatabase->logIn($_POST['pin']) != null) {
    $_SESSION['user'] = $userDatabase->logIn($_POST['pin'])->getUsername();
}

if (isset($_POST['message'])) {
    $messageStorage->addMessage(new Message(
        $userDatabase->findByUsername($_SESSION['user'])->getID(),
        $_POST['message']));
}

if (isset($_POST['logout'])) {
    session_unset();
}
?>

<html>
<body>

<?php if (!isset($_SESSION['user'])) : ?>
<form method="post" action="/">
    Enter your PIN: <input name="pin" type="number">
    <input type="submit">
</form>
<?php endif; ?>

<?php if (isset($_SESSION['user'])) : ?>
<?= "<h3>You are currently logged in as {$_SESSION['user']}</h3>"; ?>
<h2>Create new message</h2>
<form method="post" action="/">
    Enter new message: <input name="message">
    <input type="submit">
</form>
<form method="post" action="/">
    <button type="submit" name="logout">Log out</button>
</form>

<?php elseif (isset($_POST['pin']) && $userDatabase->logIn($_POST['pin']) == null) : ?>
<h3>Incorrect PIN</h3>
<?php endif; ?>

</body>

</html>
