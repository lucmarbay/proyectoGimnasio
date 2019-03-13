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
        session_start();
        try{
            require_once 'conexion.php';
            if(isset($_REQUEST['emailRegistro']) && isset($_REQUEST['passwordRegistro'])){
                $usuario= $_REQUEST['emailRegistro'];
                $contrasenia= $_REQUEST['passwordRegistro'];
                $pass_cifrado= password_hash($contrasenia, PASSWORD_DEFAULT);
                $sql="INSERT INTO usuarios_pass (email, password) VALUES (:usu, :contra)";
                $resultado=$base->prepare($sql);		
                $resultado->execute(array(":usu"=>$usuario, ":contra"=>$pass_cifrado));		
                echo "Registro insertado";
            }
        } catch (Exception $ex) {
            if($ex->getCode()==23000){
                echo 'Ese email ya existe en nuestra base de datos, por favor prueba con otro diferente';
            } else {
                die('Error: ' . $ex->getMessage());
            }          
        }
        
        ?>
        <form action="registrarUsuario.php" method="POST">
            <input type="email" name="emailRegistro" required="required" placeholder="Email">
            <br>
            <input type="password" name="passwordRegistro" required="required" placeholder="Password">
            <br>
            <input type="submit" value="Registrar">
        </form>
        <a href="index.php">Volver al login</a>
    </body>
</html>
