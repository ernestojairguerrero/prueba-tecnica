<?php

include 'model/conexion.php';

$id = $_GET['id'];

$sql = $conexion->query("SELECT * FROM paises WHERE id = $id");

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>

    <form class="col-4 p-3 m-auto" method="POST">
        <h5>Modificar pais</h5>

        <?php
        include "controller/modificar_pais.php";


        while ($datos = $sql->fetch_object()) { ?>

            <input type="text" class="form-control" name="id" id="id" value="<?= $datos->id ?>">

            <div class="input-group input-group-lg mb-3">
                <span class="input-group-text" id="nombrePais">Nombre</span>
                <input type="text" class="form-control" name="nombrePais" id="nombrePais" value="<?= $datos->nombrePais ?>">
            </div>
            

        <?php }



        ?>





        <button type="submit" class="btn btn-primary" name="btnModificar" value="ok">Modificar</button>

    </form>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>