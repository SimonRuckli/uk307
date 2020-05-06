<?php

$dto = new Task();
$tools = $dto->getallTools();

require 'app/Views/task.view.php';