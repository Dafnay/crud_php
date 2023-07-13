


    <?php
//    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Obtener los datos enviados desde el formulario
//     $title = $_POST['title'] ?? '';
//     $description = $_POST['description'] ?? '';

//     // Realizar las operaciones necesarias con los datos (ejemplo: insertar en la base de datos)
//     $server = '127.0.0.1';
//     $username = 'root';
//     $password = '';
//     $database = 'todo';

//     // Conectar a la base de datos y ejecutar la consulta
//     $db = new PDO('mysql:host=' . $server . ';dbname=' . $database, $username, $password);

//     $query = "INSERT INTO task (title, description) VALUES (?, ?)";

//     $stmt = $db->prepare($query);
//     $stmt->execute([$title, $description]);

//     if ($stmt->rowCount() > 0) {
//         echo "Se realizó exitosamente";
//     } else {
//         echo "Ocurrió un error en el registro";
//     }
// }

use App\Controllers\TaskController;
require __DIR__ . '/../vendor/autoload.php';
// print_r($_POST);
// print_r($_SERVER);
if (isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
  $new_task = new TaskController;
  $new_task-> createTask([
                "title"=>$_POST["title"],
                "description"=>$_POST["description"]
                ]);
}
    ?>
