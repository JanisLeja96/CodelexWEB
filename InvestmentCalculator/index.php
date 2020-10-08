<?php

require_once 'InvestmentCalculator.php';

if (isset($_POST['investment'])) {
    $calc = new InvestmentCalculator(
        $_POST['investment'],
        $_POST['length'],
        $_POST['percentage']
    );
}
?>

<html>
<body>

<form method="post" action="/">
    Initial amount: <input name="investment">
    Length (years): <input name="length">
    Percentage:     <input name="percentage">
    <button type="submit">Submit</button>
</form>
<br>
<br>

<?php if (isset($calc)) :?>
<?= 'Total amount after ' . $calc->getLength() . ' years: ' . $calc->calculate(); endif;?>
</body>
</html>
