<?php

class Task
{
    public $dto;
    public PDO $db;

    public function __construct($dto = null)
    {
        $this->dto = $dto;
        $this->db = connectToDatabase();
    }

    public function addToDatabase()
    {
        $statement = $this->db->prepare("INSERT INTO tasks (name, email, phone, entryDate, urgency, tool) 
        VALUES (:name, :email, :phone, :entryDate, (SELECT id FROM urgency WHERE name LIKE :urgency), (SELECT id FROM tools WHERE name LIKE :tool))");

        $statement->bindParam(":name", $this->dto["name"], PDO::PARAM_STR);
        $statement->bindParam(":email", $this->dto["email"], PDO::PARAM_STR);
        $statement->bindParam(":phone", $this->dto["phone"], PDO::PARAM_STR);
        $statement->bindParam(":entryDate", $this->dto["entryDate"], PDO::PARAM_STR);
        $statement->bindParam(":urgency", $this->dto["urgency"], PDO::PARAM_STR);
        $statement->bindParam(":tool", $this->dto["tool"], PDO::PARAM_STR);

        return $statement->execute();
    }

    public function getAllEntries()
    {
        $statement = $this->db->prepare(@"
        SELECT 
        T0.id as id,
        T0.name as name, 
        T0.email as email, 
        T0.phone as phone, 
        T0.processing as processing,
        T0.entryDate as entryDate,
        T1.name as urgency,         
        T2.name as tool 
        FROM tasks T0 
        INNER JOIN urgency T1 ON T0.urgency = T1.id 
        INNER JOIN tools T2 ON T0.tool = T2.id
        WHERE T0.processing IS TRUE
        ORDER BY T0.urgency DESC, T0.entryDate");

        $statement->execute();
        return $statement->fetchAll();
    }

    public function getEntryById(int $id)
    {
        $statement = $this->db->prepare(@"
        SELECT 
        T0.id as id,
        T0.name as name, 
        T0.email as email, 
        T0.phone as phone, 
        T0.processing as processing,
        T0.entryDate as entryDate,
        T1.name as urgency,
        T2.name as tool 
        FROM tasks T0 
        INNER JOIN urgency T1 ON T0.urgency = T1.id 
        INNER JOIN tools T2 ON T0.tool = T2.id
        WHERE T0.id = :id");

        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllTools()
    {
        $statement = $this->db->prepare("SELECT name as tool FROM tools");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_COLUMN);
    }

    public function updateEntry(int $id)
    {
        $statement = $this->db->prepare(@"
        UPDATE tasks SET 
        name = :name, 
        email = :email, 
        phone = :phone,
        processing = :processing,
        tool = (SELECT id FROM tools WHERE name LIKE :tool)
        WHERE id = :id");

        $statement->bindParam(":name", $this->dto["name"]);
        $statement->bindParam(":email", $this->dto["email"]);
        $statement->bindParam(":phone", $this->dto["phone"]);
        $statement->bindParam(":processing", $this->dto["processing"]);
        $statement->bindParam(":tool", $this->dto["tool"]);
        $statement->bindParam(":id", $id);

        return $statement->execute();
    }

    public function closeEntry(int $id)
    {
        $statement = $this->db->prepare(@"
        UPDATE tasks SET 
        processing = FALSE
        WHERE id = :id");

        $statement->bindParam(":id", $id);

        return $statement->execute();
    }
}
