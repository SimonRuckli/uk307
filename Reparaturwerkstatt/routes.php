<?php

$router = new Router();

$router->define([
    "" => "app/Controllers/TaskController.php",
    "addtask" => "app/Controllers/TaskController.php",
    "tasklist" => "app/Controllers/TaskListController.php",
    "edit" => "app/Controllers/EditTaskController.php",
]);