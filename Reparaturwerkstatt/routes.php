<?php

$router = new Router();

$router->define([
    '' => 'app/Controllers/CreateTaskController.php',
    'edit' => 'app/Controllers/editController.php',
]);