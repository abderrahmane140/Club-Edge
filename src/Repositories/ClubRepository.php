<?php

class ClubRepository {
    private $db;

    public function __construct(Database $database) {
        $this->db = $database;
    }

    public function getAll() {
        $query = "SELECT * FROM clubs ORDER BY created_at DESC";
        return $this->db->query($query)->fetchAll();
    }

    public function getById($id) {
        $query = "SELECT * FROM clubs WHERE id = :id";
        return $this->db->query($query, ['id' => $id])->fetch();
    }



    public function create($name, $description, $president_id = null) {
        $query = "INSERT INTO clubs (name, description, president_id) VALUES (:name, :description, :president_id)";
        return $this->db->query($query, [
            'name' => $name,
            'description' => $description,
            'president_id' => $president_id
        ]);
    }


    
    public function update($id, $name, $description, $president_id = null) {
        $query = "UPDATE clubs SET name = :name, description = :description, president_id = :president_id WHERE id = :id";
        return $this->db->query($query, [
            'id' => $id,
            'name' => $name,
            'description' => $description,
            'president_id' => $president_id
        ]);
    }

    public function delete($id) {
        $query = "DELETE FROM clubs WHERE id = :id";
        return $this->db->query($query, ['id' => $id]);
    }
}
