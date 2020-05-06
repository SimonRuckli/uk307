<?php

$dto = new Task();
$tools = $dto->getallTools();
echo("<pre>");
print_r($tools);
echo("</pre>");
