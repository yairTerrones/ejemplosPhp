<?php
    class Ejemplo1 {

        private $conexion;
        /*constructor que reciba como parámetro la ubicación del servidor, 
        el nombre del usuario, la contraseña y el nombre de la base de datos. 
        El constructor abrirá la conexión e informará de los posibles errores.*/
        public function __CONSTRUCT($Localhost,$root,$password,$ejemplo1) {
            $this->conexion = new mysqli($Localhost,$root,$password,$ejemplo1);
            if($this->conexion->connect_error)
                die($this->conexion->connect_error);
            else
                echo '<b> Conexion exitosa!!</b> <br>';
        }
        /*Destructor que cierra la conexión.*/
        function __DESTRUCT() {
            $this->conexion->close();
        }

        /*método para ejecutar una consulta. Este método recibe como parámetro una 
        cadena con una consulta escrita en SQL. El método ejecutará la consulta e 
        informará sobre los posibles errores. El método deberá crear una tabla como 
        un arreglo de arreglos con la información resultado de la consulta.
        Finalmente se deberá cerrar el objeto resultado de la consulta y regresar 
        la tabla con los datos*/
        public function consulta($unaConsulta){
            $this->resultado = $this->conexion->query($unaConsulta);
            if(!$this->resultado)
                die($this->conexion->error);
            else
                echo '<b> Consulta exitosa!!</b> <br>';
        }
        /*Escribir un método para imprimir la tabla en HTML utilizando la etiqueta 
        <table> y los ciclos foreach de PHP*/
        public function imprime (){
            echo '<table>';

            echo '<tr>';
                echo '<td><strong> Id  </strong></td>';
                echo '<td><strong> Nombre  </strong></td>';
                echo '<td><strong> Apellido  </strong></td>';
                echo '<td><strong> Edad  </strong></td>';
            echo '</tr>';

            for($i = 0; $i < $this->resultado->num_rows; $i++){
                $this->resultado->data_seek($i);
                $renglon = $this->resultado->fetch_array(MYSQLI_ASSOC);

                echo '<tr>';
                echo '<td>'.$renglon['id'].'</td>';
                echo '<td>'.$renglon['nombre'].'</td>';
                echo '<td>'.$renglon['apellido'].'</td>';
                echo '<td>'.$renglon['edad'].'</td>';
                echo '</tr>';
            }
            echo '</table>';
        }

        /*Escribir un metodo para agregar un usuario nuevo.
        El metodo recibe como parametros el nombre, apellido y edad del usuario.*/
        public function usuarioNuevo($unNombre,$unApellido,$unaEdad){
            $consulta = "INSERT INTO usuarios VALUES(NULL,'$unNombre','$unApellido',$unaEdad)";
            $resultado = $this->conexion->query($consulta);
                if(!$resultado)
                    die($this->conexion->error);
        }
        /*Escribir un metodo para eliminar un usuario de la base de datos.*/
        public function remueveUsuario($unNombre){
            $consulta = "DELETE FROM usuarios WHERE nombre='$unNombre'";
            $resultado = $this->conexion->query($consulta);
                if(!$resultado)
                    die($this->conexion->error);
        }
        /*Escribir un metodo para modificar el nombre de un usuario*/
        public function modificaNombreUsuario($unNombre,$unNuevoNombre){
            $consulta = "UPDATE usuarios SET nombre='$unNuevoNombre' WHERE nombre='$unNombre'";
             $this->conexion->query($consulta);
             /*$resultado =
                /*if(!$resultado)
                    die($this->conexion->error);*/
        }
    }

        #si recibe algun valor.
        if( isset($_POST['altas']) )  {
            $dato1 = $_POST['dato1'];
            $dato2 = $_POST['dato2'];
            $dato3 = $_POST['dato3'];
            $ejemplo = new Ejemplo1('Localhost','root','','ejemplo1');
            $ejemplo->usuarioNuevo($dato1,$dato2,$dato3);
            //$consulta2 = "SELECT * FROM USUARIOS";
            //$ejemplo->consulta($consulta2);
            //$ejemplo->imprime();
        }else{
            if(isset($_POST['bajas'])){
                $nombreBaja = $_POST['nombreBaja'];
                $ejemplo = new Ejemplo1('Localhost','root','','ejemplo1');
                $ejemplo->remueveUsuario($nombreBaja);
            }else{
                if(isset($_POST['Modificaciones'])){
                    $nombreActual = $_POST['nombreActual'];
                    $nombreNuevo = $_POST['nombreNuevo'];
                    $ejemplo = new Ejemplo1('Localhost','root','','ejemplo1');
                    $ejemplo->modificaNombreUsuario($nombreActual,$nombreNuevo);
                }else{
                    
                    if(isset($_POST['consultas'])){
                        $consultaNnueva = $_POST['consulta'];
                        $ejemplo = new Ejemplo1('Localhost','root','','ejemplo1');
                        $ejemplo->consulta($consultaNnueva);
                        $ejemplo->imprime();
                    }
                }
            }
        }

    //$ejemplo = new Ejemplo1('Localhost','root','','ejemplo1');
    //$ejemplo->usuarioNuevo('Claudio','Espinosa',23);
    //$ejemplo->remueveUsuario('Claudio');
    //$ejemplo->modificaNombreUsuario('Rodolfo','rudolf');
    //$consulta2 = "SELECT * FROM USUARIOS";
    //$ejemplo->consulta($consulta2);
    //$ejemplo->imprime();
?>

<!--Para no escribir en la url ALTAS-->
<form method="POST">

    <h2><strong>ALTAS:</strong></h2>
    Nombre: 
    <input type="text" name="dato1">
    <br><br>
    Apellido:
    <input type="text" name="dato2">
    <br><br>
    Edad:
    <input type="text" name="dato3">
    <br><br>
    <!-- Para enviar los datos ala url-->
    <input type="submit" value="Agregar" name='altas'>
</form>

<!--Para no escribir en la url BAJAS-->
<form method="POST">
    <h2><strong>BAJAS:</strong></h2>
    Nombre: 
    <input type="text" name="nombreBaja">
    <br><br>
    <!-- Para enviar los datos ala url-->
    <input type="submit" value="Eliminar" name='bajas'>
</form>

<!--Para no escribir en la url BAJAS-->
<form method="POST">
    <h2><strong>MODIFICACIONES:</strong></h2>
    Nombre Actual: 
    <input type="text" name="nombreActual">
    <br><br>
    Nombre Nuevo: 
    <input type="text" name="nombreNuevo">
    <br><br>
    <!-- Para enviar los datos ala url-->
    <input type="submit" value="Modificar" name='Modificaciones'>
</form>

<!--Para no escribir en la url BAJAS-->
<form method="POST">
    <h2><strong>Consultas:</strong></h2>
    CONSULTA: 
    <input type="text" name="consulta">
    <br><br>
    <!-- Para enviar los datos ala url-->
    <input type="submit" value="Consulta" name='consultas'>
</form>