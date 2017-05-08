<?php

    class Ejemplo1 {

        private $conexion;
        private $resultado;
        private $consulta;

        public function __CONSTRUCT($Localhost,$root,$password,$ejemplo1) {
            $this->conexion = new mysqli($Localhost,$root,$password,$ejemplo1);
            if($this->conexion->connect_error){
                die($this->conexion->connect_error);
            }  
        }

        function __DESTRUCT() {
            $this->conexion->close();
        }

        public function ejecuta(Foo $link){
            $this->resultado = $this->conexion->query($this->consulta);
            if(!$this->resultado)
                die($this->conexion->error);
        }

        public function imprime (){
            for($i=0;$i<$this->$resultado->num_rows;$i++){
                $this->$resultado->data_seek($i);
                $renglon = $this->$resultado->fetch_array(MYSQLI_ASOC);
                echo 'id='.$renglon['id'].'<br>';
                echo 'nombre='.$renglon['nombre'].'<br>';
                echo 'apellidos='.$renglon['apellido'].'<br>';
            }
        }

        /*
        Escribir un metodo para agregar un usuario nuevo.
        El metodo recibe como parametros el nombre, apellido y edad del usuario.
        */
        public function usuarioNuevo($unNombre,$unApellido,$unaEdad){
            $this->consulta = "INSERT INTO usuarios VALUES(NULL,$unNombre,$unApellido,$unaEdad)";
            $this->$resultado = $conexion->query($this->consulta);
                if(!$this->resultado)
                    die($this->conexion->error);
        }



        /*
        Escribier un metodo para eliminar un usuario de la base de datos.
        */

        /*
        Escribir un metodo para modificar le nombre de un usuario.
        El metodo recibe como parametros el nombre actual del usuario y el nuevo nombre de
        */
    }

    $ejemplo = new Ejemplo1('Localhost','root','','ejemplo1');
    $this->ejemplo->usuarioNuevo('Rodolfo','Garcia',22);
    $this->imprime();
?>