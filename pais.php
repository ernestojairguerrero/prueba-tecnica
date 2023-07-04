<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>

    <a href="index.php">Ir a Personas</a>

    <div class="container-fluid row">
        <form class="col-4 p-3" method="POST">
            <h5>Registro de pais</h5>

            <?php
            include "model/conexion.php";
            include "controller/registro_pais.php";
            include "controller/eliminar_pais.php";



            ?>



            <div class="input-group input-group-lg mb-3">
                <span class="input-group-text" id="nombrePais">Nombre</span>
                <input type="text" class="form-control" name="nombrePais" id="nombrePais">
            </div>
            



            <button type="submit" class="btn btn-primary" name="btnRegistrar" value="ok">Guardar</button>

        </form>

        <div class="col-8 p-4">
            <h5>Listado de paises</h5>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "model/conexion.php";
                    $sql = $conexion->query("SELECT * FROM paises");
                    while ($pais = $sql->fetch_object()) {
                    ?>
                        <tr>
                            <td><?= $pais->nombrePais ?></td>

                            <td>
                                <a href="modificar_pais.php?id=<?= $pais->id ?>" class="btn btn-small btn-warning">Editar</a>
                                <a onclick="return eliminar()" href="pais.php?id=<?= $pais->id ?>" class="btn btn-small btn-danger">Eliminar</a>
                            </td>
                        </tr>

                    <?php }
                    ?>

                </tbody>
            </table>
        </div>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <script>
        function eliminar() {
            let respuesta = confirm("Estas seguro que quieres eliminar");
            return respuesta;
        }
    </script>
</body>

</html>