<?php

$dto = new Task();
$tasks = $dto->getAllEntries();

require 'app/Views/tasklist.view.php';