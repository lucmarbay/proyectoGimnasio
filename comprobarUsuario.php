<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        try{
            session_start();
            /**
             * Creacion de la base de datos si no existe
             */
            $conexion=mysqli_connect("localhost","root","") or die("Problemas con la conexión ");
            $consultaCrear="CREATE DATABASE IF NOT EXISTS entrenamiento";
            mysqli_query($conexion,$consultaCrear) or die("Problemas con la conexión ".mysqli_error($conexion));
            mysqli_close($conexion);
            
            /**
             * Creación de las tablas
             */
            include_once 'conexion.php';
            $sqlUsuarios_pass='CREATE TABLE IF NOT EXISTS usuarios_pass (email VARCHAR(40) PRIMARY KEY NOT NULL, password VARCHAR(254));';
            $sqlEntrenamiento='CREATE TABLE IF NOT EXISTS entrenamiento (id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT, nombre VARCHAR(40) NOT NULL, emailUsuario VARCHAR(40) NOT NULL, dia VARCHAR(40), series VARCHAR(40), repeticiones VARCHAR(40), imagen VARCHAR(40), CONSTRAINT fk_emaildUsuario FOREIGN KEY (emailUsuario) REFERENCES usuarios_pass(email));';
            $resultado=$base->prepare($sqlUsuarios_pass);			
            $resultado->execute();
            $resultado=$base->prepare($sqlEntrenamiento);			
            $resultado->execute();
                    
            /**
             * Verificación de usuario
             */
            include_once 'conexion.php';
            if (isset($_REQUEST['email']) && isset($_REQUEST['password'])) {
                //Comprobamos si existe el usuario
                $email=htmlentities(addslashes($_REQUEST["email"]));
                $password=htmlentities(addslashes($_REQUEST["password"]));
                $sql="SELECT * FROM usuarios_pass WHERE email= :email";
                $resultado=$base->prepare($sql);			
                $resultado->execute(array(":email"=>$email));	
		while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){			
                        if (password_verify($password, $registro['password'])){
                            $_SESSION['usuario']=$email;
                            header('Location: areaPersonal.php');
                        } else {
                            $_SESSION['usuario']=2;
                            header('Location: index.php');
                        }
		}
            } else {
                //Lo mandamos al index si no recibe las credenciales
                $_SESSION['usuario']=2;
                header("Location: index.php");
            }
        } catch (Exception $ex) {
            die('Error' . $ex->getMessage());
            echo '<br>Línea del error: '.$ex->getLine();
        }
        ?>
    </body>
</html>
