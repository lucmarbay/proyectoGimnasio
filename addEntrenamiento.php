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
            die('Error' . $ex->getMessage());
            echo '<br>Línea del error: '.$ex->getLine();
        }
        // TENGO QUE DIVIDIR ENTRE ENTRENAMIENTO Y EJERCICIOS
        ?>
        <h1>Añadir entrenamiento</h1>
        <form action="addEntrenamiento.php" method="POST">
            <input type="text" name="nombre" required="required" placeholder="Nombre del entrenamiento"><br>
            <input type="email" name="email" required="required" hidden="hidden" value="<?php echo $usuario ?>">
            <input type="text" name="dia" placeholder="Día del entrenamiento"><br>
            <input type="text" name="series" placeholder="Número de series"><br>
            <input type="text" name="repeticiones" placeholder="Número de repeticiones"><br>
            <input type="file" name="imagen"><br>
            <input type="submit">
            
        </form>
    </body>
</html>
