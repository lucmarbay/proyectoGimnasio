<?php
try{
    $base=new PDO('mysql:host=localhost; dbname=entrenamiento','root','');
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $base->exec("SET CHARACTER SET UTF8");
    
} catch (Exception $ex) {
    throw $ex;
}