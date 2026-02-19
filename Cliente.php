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
    </head>

    <body>
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

            <input type="submit" value="Ingresar">
        </form>

        <a href="Menu.php"> <button>Salir</button> </a>
        <br><br>

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