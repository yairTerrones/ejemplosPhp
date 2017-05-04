<?php

    $conexion = new mysqli('localhost','root','','ejemplo1');
    $if($conexion->connect_error)
        die($conexion->connect_error);
    
    $consulta = "SELECT * FROM USUARIOS";

    $resultado = $conexion->query($consulta);
    if(!$resultado)
        die($conexion->error);

    for($i=0;$i<$resultado->num_rows;$i++){
        $resultado->data_seek($i);
        $renglon = $resultado->fetch_array(MYSQLI_ASOC);
        echo 'id='.$renglon['id'].'<br>';
        echo 'nombre='.$renglon['nombre'].'<br>';
        echo 'apellidos='.$renglon['apellido'].'<br>';
    }
$resultado->close();
$conexion->close();

//http://localhost/EjemplosPhp/ejemplosMySql/ejemplo1


?>