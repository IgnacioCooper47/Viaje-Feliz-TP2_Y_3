<?php


class Persona{

    private $nombre;

    private $apellido;

    private $telefono;

    private $numDocuento;

    public function __construct($nombre, $apellido, $telefono, $numDocuento){
        //Metodo constructor de la clase Persona
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->telefono = $telefono;
        $this->numDocuento = $numDocuento;
    }

    public function getNombre(){
        return $this->nombre;
    }
    
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }
    
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    public function getTelefono(){
        return $this->telefono;
    }
    
    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }

    public function getNumDocumento(){
        return $this->numDocuento;
    }
    
    public function setNumDocumento($numDocuento){
        $this->numDocuento = $numDocuento;
    }

    public function __toString(){
        return "Nombre: " . $this->getNombre() . "\n Apellido: " . $this->getApellido() . "\n Telefono: " . $this->getTelefono() . "\n Numero de documento: " . $this->getNumDocumento();
    }





}