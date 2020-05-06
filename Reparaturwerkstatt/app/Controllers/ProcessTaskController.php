<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if ($_POST["button"] == "add") {

        // Formularfelder auslesen
        $dto = array (
            "name"    => post("name"),
            "email"   => post("email"),
            "phone"   => post("phone"),
            "urgency" => post("urgency"),
            "tool"    => post("tool")
        );
      
        // Datenbank-Objekt erstellen
        $task = new Task($dto);
        $task->addToDatabase();

        header("Location: addtask");
    } elseif ($_POST["button"]  == "tasklist") {
        header("Location: tasklist");
    }
}