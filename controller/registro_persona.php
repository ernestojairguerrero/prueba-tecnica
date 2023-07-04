<?php 

if(isset($_POST['btnRegistrar'])){
    if(!empty($_POST['nombre']) AND !empty($_POST['email']) AND !empty($_POST['genero']) AND !empty($_POST['idPais'])){

        $nombre =$_POST['nombre'];
        $email =$_POST['email'];
        $genero =$_POST['genero'];
        $idPais =$_POST['idPais'];

        $sql = $conexion -> query( "INSERT INTO personas (nombre, email, genero, idPais) values ( '$nombre', '$email', '$genero', '$idPais')");

        if($sql == 1 ){
            echo 'Registro correctamente';
        }else
        {
            echo 'Registro no creado';
        }
        


    }else{
        echo 'Complete todos los campos';
    }
}
