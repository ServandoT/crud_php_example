<?php
include 'config.php';

// Comprobando si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $id = $_POST['id'];

    // TODO no funciona el cambio de descripcion
    $stmt = $pdo->prepare("UPDATE libros SET nombre = ?, precio = ?, descripcion = ? WHERE id = ?");
    $stmt->execute([$nombre, $precio, $id, $descripcion]);

    header('Location: index.php');
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->query("SELECT * FROM libros WHERE id = $id");
$libro = $stmt->fetch();

?>

<h2>Editar Libro</h2>

<form action="edit.php" method="post">
    <input type="hidden" name="id" value="<?php echo $libro['id']; ?>">
    Nombre: <input type="text" name="nombre" value="<?php echo $libro['nombre']; ?>"><br>
    Precio: $<input type="text" name="precio" value="<?php echo $libro['precio']; ?>"><br>
    Descripción: $<input type="text" name="descripcion" value="<?php echo $libro['descripcion']; ?>" ><br>
    <input type="submit" value="Guardar Cambios">
</form>
