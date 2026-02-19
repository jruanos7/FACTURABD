<?PHP
$conection = mysqli_connect("localhost", "root", "", "ferreteria");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $fecha = ($_POST['fecha']);
    $total = ($_POST['total']);

    $sql = "INSERT INTO venta (fecha, total) VALUES ('$fecha', '$total')";
    mysqli_query($conection, $sql);

    $NewID = mysqli_insert_id($conection);
    $NewTable = "SELECT * FROM venta WHERE idventa = $NewID";
    $Newdatos = mysqli_query($conection, $NewTable);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venta</title>
</head>

<body>
    <form method="post">
        Ingrese fecha
        <input type="date" name="fecha" required>
        <br><br>
        Ingrese total
        <input type="text" name="total" required>
        <br><br>

        <input type="submit" value="Ingresar">

    </form>
    <a href="Principal.php">
        <button>Salir</button>
        <br><br>
</body>

</html>

<?php
if (isset($Newdatos) && $Newdatos) {

    while ($fila = mysqli_fetch_assoc($Newdatos)) {
        echo $fila['fecha'] . "<br>";
        echo $fila['total'] . "<br>";
    }
}
?>