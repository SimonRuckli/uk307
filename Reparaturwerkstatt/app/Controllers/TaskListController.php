<?php

$dto = new Task();
$tasks = $dto->getAllEntries();

echo("<pre>");
print_r($tasks);
echo("</pre>");
require 'app/Views/tasklist.view.php';