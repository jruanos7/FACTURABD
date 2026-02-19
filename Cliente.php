    <?PHP
    $conection = mysqli_connect("localhost", "root", "", "ferreteria");
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $nombre = ($_POST['name']);
        $direccion = ($_POST['adress']);
        $nit = ($_POST['id']);

        $sql = "INSERT INTO cliente (Nombre, Dirrecion, NIT) VALUES ('$nombre', '$direccion', '$nit')";
        mysqli_query($conection, $sql);

        $NewID = mysqli_insert_id($conection);
        $NewTable = "SELECT * FROM cliente WHERE IdCliente = $NewID";
        $Newdatos = mysqli_query($conection, $NewTable);
    }

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cliente</title>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    </head>

    <body class="bg-dark text-dark">
        <div class="d-flex vh-100 justify-content-center align-items-center">
            <div class="bg-white p-4 shadow rounded ms-3">

                <h1 class="mb-3">Cliente</h1>

                <form method="POST">
                    Ingrese nombre
                    <input type="text" name="name" required>
                    <br><br>
                    Ingrese direccion
                    <input type="text" name="adress" required>
                    <br><br>
                    Ingrese Nit
                    <input type="text" name="id" required>
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
            echo $fila['Nombre'] . "<br>";
            echo $fila['Dirrecion'] . "<br>";
            echo $fila['NIT'] . "<br>";
        }
    }
    ?>