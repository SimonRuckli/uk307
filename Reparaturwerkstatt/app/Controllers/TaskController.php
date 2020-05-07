<?php

$dto = new Task();
$tools = $dto->getallTools();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if ($_POST["button"] == "add") {

        $validation = new Validation();
        $validation->validateName(post("name"));
        $validation->validateEmail(post("email"));
        $validation->validatePhone(post("phone"));
        $validation->validateUrgency(post("urgency"));
        $validation->validateTool(post("tool"), $tools);

        if ($validation->hasNoErrors()) {
            $dto = array(
                "name"    => post("name"),
                "email"   => post("email"),
                "phone"   => post("phone"),
                "entryDate" => date("Y-m-d"),
                "urgency" => post("urgency"),
                "tool"    => post("tool")
            );

            $task = new Task($dto);
            $task->addToDatabase();

            header("Location: addtask");
        } else {
            require "app/Views/task.view.php";
        }
    } elseif ($_POST["button"]  == "tasklist") {
        header("Location: tasklist");
    }
} else {
    require "app/Views/task.view.php";
}
