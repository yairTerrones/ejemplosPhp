<?php
    #un arreglo asociativo contiene pares de elementos llave->valor 

    #la llave es el nombre de la persona.
    $directorio = array(
        'omar' => '1-23-45-67',
        'Irma' => '9-87-65-43',
        'Carlos' => '2-33-44-55'
    );

    //var_dump($directorio);

    $directorio['Irma']='33-12-67';
    #Los arreglos asociativos se indexan por medio de la clave.

    /*foreach($directorio as $llave => $valor){
        echo $valor.'<br>';
    }*/

    
    foreach($directorio as $llave => $valor){
        echo $llave.'='.$valor.'<br>';
    }

    /*
    echo $directorio ['omar'].'<br>';
    echo $directorio ['Irma'].'<br>';
    echo $directorio ['Carlos'].'<br>';
    */
?>