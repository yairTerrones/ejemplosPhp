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

/*
<?php
    class Ejemplo1 {
        private $conexion;
        //private $resultado;
        //private $consulta;
        public function __CONSTRUCT($Localhost,$root,$password,$ejemplo1) {
            $this->conexion = new mysqli($Localhost,$root,$password,$ejemplo1);
            if($this->conexion->connect_error)
                die($this->conexion->connect_error);
            else
                echo '<b> Conexion exitosa!!</b> <br>';
        }
        function __DESTRUCT() {
            $this->conexion->close();
        }
        public function consulta($unaConsulta){
            $this->resultado = $this->conexion->query($unaConsulta);
            if(!$this->resultado)
                die($this->conexion->error);
            else
                echo '<b> Consulta exitosa!!</b> <br>';
        }
        public function imprime (){
            for($i = 0; $i < $this->resultado->num_rows; $i++){
                $this->resultado->data_seek($i);
                $renglon = $this->resultado->fetch_array(MYSQLI_ASSOC);
                echo 'id='.$renglon['id'].'<br>';
                echo 'nombre='.$renglon['nombre'].'<br>';
                echo 'apellidos='.$renglon['apellido'].'<br>';
            }
        }
        Escribir un metodo para agregar un usuario nuevo.
        El metodo recibe como parametros el nombre, apellido y edad del usuario.*/
        public function usuarioNuevo($unNombre,$unApellido,$unaEdad){
            $consulta = "INSERT INTO usuarios VALUES(NULL,'$unNombre','$unApellido',$unaEdad)";
            $resultado = $this->conexion->query($consulta);
                if(!$resultado)
                    die($this->conexion->error);
        }
        
        Escribir un metodo para eliminar un usuario de la base de datos.
        public function eliminaUsuario($usuario){
            $this->consulta = "INSERT INTO usuarios VALUES(NULL,$unNombre,$unApellido,$unaEdad)";
            $this->$resultado = $conexion->query($this->consulta);
                if(!$this->resultado)
                    die($this->conexion->error);
        }
        
        
        Escribir un metodo para modificar le nombre de un usuario.
        El metodo recibe como parametros el nombre actual del usuario y el nuevo nombre de
        public function modificaUsuario($nombreActual,$nombreNuevo){
            $this->consulta = "INSERT INTO usuarios VALUES(NULL,$unNombre,$unApellido,$unaEdad)";
            $this->$resultado = $conexion->query($this->consulta);
                if(!$this->resultado)
                    die($this->conexion->error);
        }
    }
    $ejemplo = new Ejemplo1('Localhost','root','','ejemplo1');
    $ejemplo->usuarioNuevo('Rodolfo','Garcia',22);
    $unaConsulta = "SELECT * FROM USUARIOS";
    $ejemplo->consulta($unaConsulta);
    $ejemplo->imprime();
?>
*/

?>