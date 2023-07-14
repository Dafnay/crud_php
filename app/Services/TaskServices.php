<?php
namespace App\Services;
use App\Controllers\TaskController;

class TaskService {
    private $taskController;
    private $dom;
    public function __construct()
    {
        $this -> taskController = new TaskController;
        $this -> dom = new \DOMDocument('1.0', 'iso-8859-1');
      
    }
    public function saveTask($data){
        $this->taskController->createTask($data);
        $this->loadTasks();

    }
  
    public function loadTasks(){
        $tasks = $this->taskController->indexTask();
        $element = $this->dom->createElement('div', 'prueba de valor');
        $listContainer = $this->dom->getElementById('list-container');
        if ($listContainer) {
            $listContainer->appendChild($element);
        } else {
            echo "El elemento con ID 'list-container' no se encontró en el DOM.";
        }
        // $this->dom->validateOnParse = true;
        // $tasks = $this->taskController->indexTask();
        // $element = $this->dom->appendChild(new \DOMElement('div', 'prueba de valor'));
        // $listContainer = $this->dom->getElementById('list-container');
        // if ($listContainer) {
        //     $listContainer->appendChild($element);
        // } else {
        //     echo "El elemento con ID 'list-container' no se encontró en el DOM.";
        // }
        // var_dump('patata');
    }

    public function editTask(){

    }
    public function deleteTask(){

    }

}
?>