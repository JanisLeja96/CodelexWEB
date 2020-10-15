<?php

use App\Person;

require 'vendor/autoload.php';

$person = new Person('Janis');

echo "Name: {$person->getName()} UUID: {$person->getUUID()}";


