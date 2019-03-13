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
                echo'Hola '.$_SESSION['usuario'];
            }else{
                header('Location: index.php');
            }  
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        ?>
        <h1>Mis entrenamientos</h1>
        
    </body>
</html>
