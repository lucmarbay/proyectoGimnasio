<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Entrenamiento{
    private $email="";
    private $id="";
    private $nombre="";
    private $listaEjercicios=array();
    
    public function __construct($nombre, $listaEjercicios) {
        $this->nombre=$nombre;
        $this->listaEjercicios=$listaEjercicios;
    }
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getListaEjercicios() {
        return $this->listaEjercicios;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setListaEjercicios($listaEjercicios) {
        $this->listaEjercicios = $listaEjercicios;
    }
    
    function getEmail() {
        return $this->email;
    }

    function setEmail($email) {
        $this->email = $email;
    }
}



