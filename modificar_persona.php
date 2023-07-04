<?php

include 'model/conexion.php';

$id = $_GET['id'];

$sql = $conexion->query("SELECT p.id, p.nombre, p.email, p.genero, pa.nombrePais FROM personas p INNER JOIN paises pa ON p.idPais = pa.id WHERE p.id = $id");

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
        <h5>Modificar personas</h5>

        <?php
        include "controller/modificar_persona.php";


        while ($datos = $sql->fetch_object()) { ?>

            <input type="hidden" class="form-control" name="id" id="nombre" value="<?= $datos->id ?>">

            <div class="input-group input-group-lg mb-3">
                <span class="input-group-text" id="nombre">Nombre</span>
                <input type="text" class="form-control" name="nombre" id="nombre" value="<?= $datos->nombre ?>">
            </div>
            <div class="input-group input-group-lg mb-3">
                <span class="input-group-text" id="email">Email</span>
                <input type="email" class="form-control" name="email" id="email" value="<?= $datos->email ?>">
            </div>


            <div class="input-group input-group-lg mb-3">
                <select class="form-select" name="genero" aria-label="Default select example">
                    <option <?= $datos->genero === 'Masculino' ? "selected = 'selected'" : "" ?> value="Masculino">Masculino</option>
                    <option <?= $datos->genero === 'Femenino' ? "selected = 'selected'" : "" ?> value="Femenino">Femenino</option>
                </select>
            </div>

            <div class="input-group input-group-lg mb-3">
                <select class="form-select" name="idPais" aria-label="Default select example">
                    <?php
                    include "model/conexion.php";
                    $sql = $conexion->query("SELECT * FROM paises");
                    while ($pais = $sql->fetch_object()) {
                    ?>
                        <option <?= $datos->nombrePais === $pais->nombrePais ? "selected = 'selected'" : "" ?> value="<?= $pais->id ?>"><?= $pais->nombrePais ?></option>
                    <?php }
                    ?>
                </select>

            </div>



        <?php }



        ?>





        <button type="submit" class="btn btn-primary" name="btnModificar" value="ok">Modificar</button>

    </form>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>