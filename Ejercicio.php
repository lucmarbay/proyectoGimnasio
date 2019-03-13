<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Ejercicio{
    private $id="";
    private $entrenamiento="";
    private $nombre="";
    private $dia="";
    private $series="";
    private $repeticiones="";
    private $imagen="";
    
    public function __construct($entrenamiento, $nombre, $dia, $series, $repeticiones, $imagen) {
        $this->entrenamiento=$entrenamiento;
        $this->nombre=$nombre;
        $this->dia=$dia;
        $this->series=$series;
        $this->repeticiones=$repeticiones;
        $this->imagen=$imagen;
    }
    function getId() {
        return $this->id;
    }

    function getEntrenamiento() {
        return $this->entrenamiento;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDia() {
        return $this->dia;
    }

    function getSeries() {
        return $this->series;
    }

    function getRepeticiones() {
        return $this->repeticiones;
    }

    function getImagen() {
        return $this->imagen;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setEntrenamiento($entrenamiento) {
        $this->entrenamiento = $entrenamiento;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDia($dia) {
        $this->dia = $dia;
    }

    function setSeries($series) {
        $this->series = $series;
    }

    function setRepeticiones($repeticiones) {
        $this->repeticiones = $repeticiones;
    }

    function setImagen($imagen) {
        $this->imagen = $imagen;
    }


}