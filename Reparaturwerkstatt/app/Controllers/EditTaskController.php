<?php

$dto = new Task();
$tools = $dto->getAllTools();

if ($_SERVER["REQUEST_METHOD"] === "GET") {

    $id = (int) get("id");
    $task = $dto->getEntryById($id);
    require "app/Views/edit.view.php";
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if ($_POST["button"] == "cancel") {
        header("Location: tasklist");
    } else {

        $validation = new Validation();
        $validation->validateName(post("name"));
        $validation->validateEmail(post("email"));
        $validation->validatePhone(post("phone"));
        $validation->validateProcessing(post("processing"));
        $validation->validateTool(post("tool"));

        if ($validation->hasNoErrors()) {

            $dto = array(
                "name"    => post("name"),
                "email"   => post("email"),
                "phone"   => post("phone"),
                "processing" => post("processing") == "Reparaturauftrag pendent" ? 1 : 0,
                "tool"    => post("tool")
            );

            $task = new Task($dto);
            $task->updateEntry((int) post("button"));

            header("Location: tasklist");
        } else {
            require "app/Views/edit.view.php";
        }
    }
}
