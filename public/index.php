<?php
use App\Controllers\TaskController;
require __DIR__ . '/../vendor/autoload.php';

// Crear una nueva tarea
if (isset($_POST["submit"])) {
    $new_task = new TaskController;
    $new_task->createTask([
        "title" => $_POST["title"],
        "description" => $_POST["description"]
    ]);
    header("Location: index.php");
    exit();
}

// Obtener la lista de tareas
$task_controller = new TaskController;
$task_list = $task_controller->indexTask();

// Eliminar una tarea
if (isset($_GET['id'])) {
    $delete_task = new TaskController;
    $delete_task->deleteTask($_GET['id']);
    header("Location: index.php");
    exit();
}

// Editar una tarea
if (isset($_POST["edit_submit"])) {
    $edit_task = new TaskController;
    $edit_task->editTask($_POST["edit_id"], [
        "title" => $_POST["edit_title"],
        "description" => $_POST["edit_description"]
    ]);
    header("Location: index.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>ToDo Php</title>
</head>
<body>
    <h1>TO DO</h1>
    <form action="./index.php" method="POST">
        <fieldset>
            <legend>Task</legend>
            <label for="title">Title</label>
            <input type="text" name="title" required>
            <label for="description">Description</label>
            <input type="text" name="description" required>
            <input type="submit" name="submit" value="SUBMIT">
        </fieldset>
    </form>
    <h2>TASKS</h2>
    <div id="list-container">
        <table>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php foreach ($task_list as $row): ?>
            <tr>
                <td><?= $row["title"] ?></td>
                <td><?= $row["description"] ?></td>
                <td>
                    <button onclick="handleEditButtonClick(<?= $row["id"] ?>, '<?= $row["title"] ?>', '<?= $row["description"] ?>')">Edit</button>
                </td>
                <td><a href='index.php?id=<?= $row["id"] ?>'><button>Delete</button></a></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <?php if (isset($_POST["edit_id"])): ?>
    <!-- Formulario de edición -->
    <h2>Edit Task</h2>
    <form action="./index.php" method="POST">
        <fieldset>
            <input type="hidden" name="edit_id" value="<?= $_POST["edit_id"] ?>">
            <label for="edit_title">Title</label>
            <input type="text" name="edit_title" value="<?= $_POST["edit_title"] ?>" required>
            <label for="edit_description">Description</label>
            <input type="text" name="edit_description" value="<?= $_POST["edit_description"] ?>" required>
            <input type="submit" name="edit_submit" value="Save">
        </fieldset>
    </form>
    <?php endif; ?>

    <script>
    function handleEditButtonClick(id, title, description) {
        var form = document.createElement("form");
        form.method = "POST";
        form.action = "./index.php";

        var editIdField = document.createElement("input");
        editIdField.type = "hidden";
        editIdField.name = "edit_id";
        editIdField.value = id;
        form.appendChild(editIdField);

        var editTitleLabel = document.createElement("label");
        editTitleLabel.innerHTML = "Title";
        form.appendChild(editTitleLabel);

        var editTitleField = document.createElement("input");
        editTitleField.type = "text";
        editTitleField.name = "edit_title";
        editTitleField.value = title;
        editTitleField.required = true;
        form.appendChild(editTitleField);

        var editDescriptionLabel = document.createElement("label");
        editDescriptionLabel.innerHTML = "Description";
        form.appendChild(editDescriptionLabel);

        var editDescriptionField = document.createElement("input");
        editDescriptionField.type = "text";
        editDescriptionField.name = "edit_description";
        editDescriptionField.value = description;
        editDescriptionField.required = true;
        form.appendChild(editDescriptionField);

        var editSubmitButton = document.createElement("input");
        editSubmitButton.type = "submit";
        editSubmitButton.name = "edit_submit";
        editSubmitButton.value = "Save";
        form.appendChild(editSubmitButton);

        document.body.appendChild(form);
        form.submit();
    }
    </script>
</body>
</html>
