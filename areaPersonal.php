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
            if(isset($_SESSION['usuario'])){
                $usuario=$_SESSION['usuario'];
                echo'Hola '.$usuario;
            }else{
                header('Location: index.php');
            }  
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        ?>
        <h1>Mis entrenamientos</h1>
        <?php
        try {
            include_once 'conexion.php';
            $sql="SELECT * entrenamiento WHERE email= :email";
            $resultado=$base->prepare($sql);			
            $resultado->execute(array(":email"=>$usuario));	
            while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){	
                $entrenamientoNombre=$registro['nombre'];
                echo '<a href="entrenamiento.php?entrenamiento='.$entrenamientoNombre.'">'.$entrenamientoNombre.'</a>';
            }
        } catch (Exception $ex) {
            die('Error' . $ex->getMessage());
            echo '<br>Línea del error: '.$ex->getLine();
        }
        ?>
    </body>
</html>
