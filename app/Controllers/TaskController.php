<?php

namespace App\Controllers;
use Database\PDO\DatabaseConnection;

class TaskController {

    private $db;

    public function __construct() {
        $server = '127.0.0.1';
        $username = 'root';
        $password = '';
        $database = 'todo';

        $this->db = new DatabaseConnection($server, $username, $password, $database);
        $this->db->connect();
    }

    // CREATE

    public function createTask($data) {
        $query = "INSERT INTO task (title, description) VALUES (?, ?)";

        $results = $this->db->execute_query($query, [
            $data['title'],
            $data['description']
        ]);
    }

    //READ

    public function indexTask() {
        $query = "SELECT * FROM task";
        $results = $this->db->execute_query($query)->fetchAll(\PDO::FETCH_ASSOC);

        return $results;
    }

    //UPDATE

    public function editTask($id, $data) {
        $query = "UPDATE task SET title = ?, description = ? WHERE id = ?";
        $this->db->execute_query($query, [
            $data['title'],
            $data['description'],
            $id
           
        ]);   
    }


    //DELETE

    public function deleteTask($id) {
        $query = "DELETE FROM task WHERE id = ?";
        $this->db->execute_query($query, [$id]);
    }   
    
}
?>
