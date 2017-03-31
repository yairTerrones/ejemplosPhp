<?php
    #El protocolo HTTP utiliza arreglos asiciativos para trasferir 
    #informacion DESDE el cliente HACIA el servidor.

    #El arreglo asociaativo $_GET contiene los datos que envia el cliente
    #hacia el servidor desde la URL.


    //var_dump($_GET);

    #sumar dos numero sy regresar el resultado de la suma.

    if($_GET){#si recibe algun valor.
        $numero1 = $_GET['num1'];
        $numero2 = $_GET['num2'];
        $suma = $numero1 + $numero2;

        echo '<h1> La suma es: '.$suma.'</h1>'; 
    }
?>

<!--Para no escribir en la url -->
<form>
    Escribe el numero 1
    <input type="text" name="num1">
    <br>
    Escribe el numero 2
    <input type="text" name="num2">
    <br>
    <!-- Para enviar los datos ala url-->
    <input type="submit" value="Enviar...">

</form>