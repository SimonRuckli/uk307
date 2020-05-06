<?php

class Task
{
    public $dto;
    public PDO $db;

    public function __construct($dto = null) {
        $this->dto = $dto;
        $this->db = connectToDatabase();
    }

    public function getAllEntries()
    {
        $statement = $this->db->prepare(@"
        SELECT 
        T0.name as name, 
        T0.email as email, 
        T0.phone as phone, 
        T1.name as urgency, 
        T2.name as tool 
        FROM tasks T0 
        INNER JOIN urgency T1 ON T0.urgency = T1.id 
        INNER JOIN tools T2 ON T0.tool = T2.id");

        $statement->execute();
        return $statement->fetchAll();
    }

    // Element by ID
    public function getEntryById(int $id)
    {
        $statement = $this->db->prepare(@"
        SELECT 
        T0.name as name, 
        T0.email as email, 
        T0.phone as phone, 
        T1.name as urgency, 
        T2.name as tool 
        FROM tasks T0 
        INNER JOIN urgency T1 ON T0.urgency = T1.id 
        INNER JOIN tools T2 ON T0.tool = T2.id
        WHERE T0.id = :id");
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }

    public function addToDatabase()
    {
        $statement = $this->db->prepare("INSERT INTO tasks (name, email, phone, urgency, tool) 
        VALUES (:name, :email, :phone, (SELECT id FROM urgency WHERE name LIKE :urgency), (SELECT id FROM tools WHERE name LIKE :tool))");

        $statement->bindParam(':name', $this->dto["name"]);
        $statement->bindParam(':email', $this->dto["email"]);
        $statement->bindParam(':phone', $this->dto["phone"]);
        $statement->bindParam(':urgency', $this->dto["urgency"]);
        $statement->bindParam(':tool', $this->dto["tool"]);

        return $statement->execute();
    }

    public function update(int $id)
    {
        $statement = $this->db->prepare('UPDATE tasks SET title = :title, completed = :completed WHERE id = :id');
        $statement->bindParam(':title', $this->title, PDO::PARAM_STR);
        $statement->bindParam(':completed', $this->completed, PDO::PARAM_BOOL);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);

        return $statement->execute();
    }

    // Lösche Task
    public function delete(int $id)
    {
        $statement = $this->db->prepare('DELETE FROM tasks WHERE id = :id');
        $statement->bindParam(':id', $id, PDO::PARAM_INT);

        return $statement->execute();
    }
}