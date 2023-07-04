<?php 

if(isset($_POST['btnModificar'])){
    if(!empty($_POST['nombrePais'])){

        $id =$_POST['id'];
        $nombrePais =$_POST['nombrePais'];

        $sql = $conexion -> query( "UPDATE paises SET nombrePais = '$nombrePais' WHERE id = $id");

        if($sql == 1 ){
            header('location: pais.php');
        }else
        {
            echo 'La Modifcación no se realizo';
        }
        


    }else{
        echo 'Complete todos los campos';
    }
}
