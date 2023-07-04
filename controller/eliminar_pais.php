<?php

if( !empty($_GET['id'])){
    $id = $_GET['id'];
    $sql = $conexion ->query('DELETE FROM paises WHERE id = ' . $id);

    if($sql==1){
        echo 'Pais eliminada correctamente';

    }else{
        echo 'Error al eliminar';
    }

}