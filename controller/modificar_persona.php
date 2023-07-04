<?php 

if(isset($_POST['btnModificar'])){
    if(!empty($_POST['nombre']) AND !empty($_POST['email']) AND !empty($_POST['genero']) AND !empty($_POST['idPais'])){

        $id =$_POST['id'];
        $nombre =$_POST['nombre'];
        $email =$_POST['email'];
        $genero =$_POST['genero'];
        $idPais =$_POST['idPais'];

        $sql = $conexion -> query( "UPDATE personas SET nombre = '$nombre', email = '$email', genero = '$genero', idPais ='$idPais' WHERE id = $id");

        if($sql == 1 ){
            header('location: index.php');
        }else
        {
            echo 'La Modifcación no se realizo';
        }
        


    }else{
        echo 'Complete todos los campos';
    }
}
