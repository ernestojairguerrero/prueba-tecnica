<?php

if( !empty($_GET['id'])){
    $id = $_GET['id'];
    $sql = $conexion ->query('DELETE FROM personas WHERE id = ' . $id);

    if($sql==1){
        echo 'Persona eliminada correctamente';

    }else{
        echo 'Error al eliminar';
    }

}