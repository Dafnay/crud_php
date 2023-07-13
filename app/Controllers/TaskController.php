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

        $query = "INSERT INTO task ( title, description)
                VALUES (?,?)";

        $results = $db->execute_query($query, [
            $data['title'],
            $data['description']
        ]);
 

        // if (!empty($results)) {
        //     echo "Se realizó exitosamente";
        // } else {
        //     echo "ocurrio un error en el registro";
        // };
    }
  
    public function indexTask(){
        $server = '127.0.0.1';
        $username = 'root';
        $password = '';
        $database = 'todo';

        $db = new DatabaseConnection($server, $username, $password, $database);
        $db->connect();

        $query = "SELECT * FROM task";
        $results= $db-> execute_query($query)-> fetchAll(\PDO::FETCH_ASSOC);
        if (empty($results)){
            echo "Ooops something went wrong :/";
        };
        return $results;

       
    }

    public function deleteTask(){
        $server = '127.0.0.1';
        $username = 'root';
        $password = '';
        $database = 'todo';

        $db = new DatabaseConnection($server, $username, $password, $database);
        $db->connect();

        $query = "DELETE FROM task WHERE id = ?";
       
    }


}
?>