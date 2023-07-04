<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>

    <a href="pais.php">Agregar pais</a>

    <div class="container-fluid row">
        <form class="col-4 p-3" method="POST">
            <h5>Registro de personas</h5>

            <?php
            include "model/conexion.php";
            include "controller/registro_persona.php";
            include "controller/eliminar_personas.php";



            ?>



            <div class="input-group input-group-lg mb-3">
                <span class="input-group-text" id="nombre">Nombre</span>
                <input type="text" class="form-control" name="nombre" id="nombre">
            </div>
            <div class="input-group input-group-lg mb-3">
                <span class="input-group-text" id="email">Email</span>
                <input type="email" class="form-control" name="email" id="email">
            </div>
            <div class="input-group input-group-lg mb-3">
                <select class="form-select" name="genero" aria-label="Default select example">
                    <option selected>Selecione el genero</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                </select>
            </div>

            <div class="input-group input-group-lg mb-3">
                <select class="form-select" name="idPais" aria-label="Default select example">
                    <option selected>Selecione el país</option>
                    <?php
                    include "model/conexion.php";
                    $sql = $conexion->query("SELECT * FROM paises");
                    while ($pais = $sql->fetch_object()) {
                    ?>
                        <option value="<?= $pais->id ?>"><?= $pais->nombrePais ?></option>
                    <?php }
                    ?>
                </select>

            </div>




            <button type="submit" class="btn btn-primary" name="btnRegistrar" value="ok">Guardar</button>

        </form>

        <div class="col-8 p-4">
            <h5>Listado de personas</h5>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Genero</th>
                        <th scope="col">Pais</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "model/conexion.php";
                    $sql = $conexion->query("SELECT p.id, p.nombre, p.email, p.genero, pa.nombrePais	 FROM personas p INNER JOIN paises pa ON p.idPais = pa.id");
                    while ($person = $sql->fetch_object()) {
                    ?>
                        <tr>
                            <td><?= $person->nombre ?></td>
                            <td><?= $person->email ?></td>
                            <td><?= $person->genero ?></td>
                            <td><?= $person->nombrePais ?></td>
                            <td>
                                <a href="modificar_persona.php?id=<?= $person->id ?>" class="btn btn-small btn-warning">Editar</a>
                                <a onclick="return eliminar()" href="index.php?id=<?= $person->id ?>" class="btn btn-small btn-danger">Eliminar</a>
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