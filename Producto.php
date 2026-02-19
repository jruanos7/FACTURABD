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

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


</head>

<body class="bg-dark text-dark">
    <div class="vh-100 d-flex align-items-center justify-content-center">
        <div class="bg-white p-4 shadow rounded ms-3">

            <h1 class="mb-3">Producto</h1>

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

                <input class="btn btn-info mb-1" type="submit" value="Ingresar">

            </form>

            <a href="Menu.php"> <button class="btn btn-danger">Salir</button> </a>
            <br><br>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

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