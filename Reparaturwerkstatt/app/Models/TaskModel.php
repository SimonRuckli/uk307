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
        $statement = $this->db->prepare('SELECT * FROM tasks');
        $statement->execute();

        return $statement->fetchAll();
    }

    // Element by ID
    public function getById(int $id)
    {
        $statement = $this->db->prepare('SELECT * FROM tasks WHERE id = :id');
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }

    public function addToDatabase()
    {
        $statement = $this->db->prepare("INSERT INTO tasks (name, email, phone, urgency, tool) 
        VALUES (:name, :email, :phone, :urgency, :tool)");

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