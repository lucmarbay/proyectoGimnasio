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
                header("Location: index.php");
            }
        } catch (Exception $ex) {
            die('Error' . $ex->getMessage());
            echo '<br>Línea del error: '.$ex->getLine();
        }
        ?>
    </body>
</html>
