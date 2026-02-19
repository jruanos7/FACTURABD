<?PHP
$conection = mysqli_connect("localhost", "root", "", "ferreteria");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nombre = ($_POST['name']);
    $descripcion = ($_POST['description']);
    $precio = ($_POST['price']);
    $cantidad = ($_POST['quantity']);

    $sql = "INSERT INTO producto (nombre, descripcion, precio, cantidad) VALUES ('$nombre', '$descripcion', '$precio', '$cantidad')";
    mysqli_query($conection, $sql);

    $NewID = mysqli_insert_id($conection);
    $NewTable = "SELECT * FROM producto WHERE idproducto = $NewID";
    $Newdatos = mysqli_query($conection, $NewTable);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto</title>
</head>

<body>
    <form method="post">
        Ingrese nombre
        <input type="text" name="name" required>
        <br><br>
        Ingrese descripcion
        <input type="text" name="description" required>
        <br><br>
        Ingrese precio
        <input type="text" name="price" required>
        <br><br>
        Ingrese cantidad
        <input type="number" name="quantity" required>
        <br><br>

        <input type="submit" value="Ingresar">

    </form>

    <a href="Menu.php"> <button>Salir</button> </a>
    <br><br>

</body>

</html>

<?php
if (isset($Newdatos) && $Newdatos) {

    while ($fila = mysqli_fetch_assoc($Newdatos)) {
        echo $fila['nombre'] . "<br>";
        echo $fila['descripcion'] . "<br>";
        echo $fila['precio'] . "<br>";
        echo $fila['cantidad'] . "<br>";
    }
}
?>