<?php 

if(isset($_POST['btnRegistrar'])){
    if(!empty($_POST['nombrePais'])){

        $nombrePais =$_POST['nombrePais'];

        $sql = $conexion -> query( "INSERT INTO paises (nombrePais) values ( '$nombrePais')");

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
