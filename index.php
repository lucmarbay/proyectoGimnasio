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
        if(isset($_SESSION['usuario']) && $_SESSION['usuario']==2){
            echo 'Usuario o contraseña erronea';
        }
        ?>
        <form action="comprobarUsuario.php" method="POST">
            <input type="email" name="email" required="required" placeholder="Email">
            <br>
            <input type="text" name="password" required="required" placeholder="Password">
            <br>
            <input type="submit" value="Entrar">
        </form>
        <a href="registrarUsuario.php">Registrarse</a>
    </body>
</html>
