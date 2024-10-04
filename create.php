<?php
include 'config.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $autor = $_POST['autor'];
    $ISBN = $_POST['ISBN'];

    try {
        $sql = "INSERT INTO libros (nombre, descripcion, precio, stock, autor, ISBN) VALUES (:nombre, :descripcion, :precio, :stock, :autor, :ISBN)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['nombre' => $nombre, 'descripcion' => $descripcion, 'precio' => $precio, 'stock' => $stock, 'autor' => $autor, 'ISBN' => $ISBN]);

        $message = 'Libro añadido con éxito!';
    } catch (PDOException $e) {
        $message = 'Error al añadir el libro: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir libro</title>
</head>
<body>
<h2>Añadir nuevo libro</h2>

<?php if (!empty($message)): ?>
    <p><?= $message ?></p>
<?php endif; ?>

<form action="create.php" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" required>
    <br>
    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" id="descripcion"></textarea>
    <br>
    <label for="precio">Precio:</label>
    <input type="text" name="precio" id="precio" required>
    <br>
    <label for="stock">Stock:</label>
    <input type="number" name="stock" id="stock" required>
    <br>
    <label for="autor">Autor:</label>
    <input type="text" name="autor" id="autor" required>
    <br>
    <label for="ISBN">ISBN:</label>
    <input type="text" name="ISBN" id="ISBN" required>
    <input type="submit" value="Añadir Libro">
</form>

</body>
</html>
