<?php

$dto = new Task();
$tasks = $dto->getAllEntries();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if ($_POST["button"] == "cancel") {
        header("Location: addtask");
    } else if ($_POST["button"] == "close") {
               
        foreach($tasks as $task)
        {            
            $name = "check" . $task["id"];
            if(isset($_POST[$name])) {
               $dto->closeEntry((int)$task["id"]);
            } 
        }
        
        header("Refresh:0");
        
    } else {
        $id = post("button");
        header("Location: edit?id=" . $id);
    }
}

require "app/Views/tasklist.view.php";
