<?php

namespace App\Controllers;

use Database\PDO\DatabaseConnection;




class TaskController{

    public function createTask($data){
        $server = '127.0.0.1';
        $username = 'root';
        $password = '';
        $database = 'todo';

        $db = new DatabaseConnection($server, $username, $password, $database);
        $db->connect();

        $query = "INSERT INTO task ( id, title, description)
                VALUES (?,?,?)";

        $results = $db->execute_query($query, [
            $data['id'],
            $data['title'],
            $data['description']
        ]);
        print_r($results);

        if (!empty($results)) {
            echo "Se realizó exitosamente";
        } else {
            echo "ocurrio un error en el registro";
        };
    }
  
}
?>