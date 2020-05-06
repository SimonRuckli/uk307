<?php

$router = new Router();

$router->define([
    "" => "app/Controllers/TaskController.php",
    "processtask" => "app/Controllers/ProcessTaskController.php",
    "tasklist" => "app/Controllers/TaskListController.php"
]);