<?php
use App\Controllers\TaskController;
require __DIR__ . '/../vendor/autoload.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>ToDo Php</title>
</head>
<body>
    <h1>TO DO</h1>
    <form action="./index.php" method="POST">
        <fieldset>
            <legend>Task</legend>
            <label for="title"> Title</label>
            <input type="text" name="title" required>
            <label for="description"> Description</label>
            <input type="text" name="description" required>
            <input type="submit" name="submit" value="SUBMIT">
        </fieldset>

    </form>
    <h2>TASKS</h2>
  <div >
        <?php     
            $task_controller = new TaskController;     
            $task_list = $task_controller-> indexTask();
            echo "<table>";
            echo "<tr><th>Title</th><th>Description</th></tr>";
            foreach ($task_list as $row) {
            echo "<tr>";
            echo "<td>" . $row["title"] . "</td>";
            echo "<td>" . $row["description"] . "</td>";
            echo '<td><button onclick="handleButtonClick(' . $row["id"] . ')">Edit</button></td>';
            echo '<td><button onclick="deteteTask(' . $row["id"] . ')">Delete</button></td>';
            echo "</tr>";
            }
            echo "</table>";
      ?>
        </div>
</body>
</html>
 
 
 
 
 <?php



// print_r($_POST);
// print_r($_SERVER);
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $new_task = new TaskController;
  $new_task-> createTask([
                "title"=>$_POST["title"],
                "description"=>$_POST["description"]
                ]);
}
    ?>
    
        