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

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-dark text-dark">
    <div class="vh-100 d-flex align-items-center justify-content-center">
        <div class="bg-white p-4 shadow rounded ms-3">


            <h1>Venta</h1>
            <form method="post">
                Ingrese fecha
                <input type="date" name="fecha" required>
                <br><br>
                Ingrese total
                <input type="text" name="total" required>
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
        echo $fila['fecha'] . "<br>";
        echo $fila['total'] . "<br>";
    }
}
?>