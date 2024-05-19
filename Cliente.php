<?php

class Cliente{
    private $nombre;
    private $apellido;
    private $estado;
    private $tipoDocumento;
    private $numeroDocumento;

    public function __construct($nomC,$apeC,$estC,$tipoDoc,$numDoc){
        $this->nombre = $nomC;
        $this->apellido = $apeC;
        $this->estado = $estC;
        $this->tipoDocumento = $tipoDoc;
        $this->numeroDocumento = $numDoc;
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nomC){
        $this->nombre = $nomC;
    }

    public function getApellido(){
        return $this->apellido;
    }
    public function setApellido($apeC){
        $this->apellido = $apeC;
    }

    public function getEstado(){
        return $this->estado;
    }
    public function setEstado($estC){
        $this->estado = $estC;
    }

    public function getTipoDocumento(){
        return $this->tipoDocumento;
    }
    public function setTipoDocumento($tipoDoc){
        $this->tipoDocumento = $tipoDoc;
    }

    public function getNumeroDocumento(){
        return $this->numeroDocumento;
    }
    public function setNumeroDocumento($numDoc){
        $this->numeroDocumento = $numDoc;
    }

    public function __toString(){
        return "\nNombre: ".$this->getNombre()."\n".
                "Apellido: ".$this->getApellido()."\n".
                "Estado: ".$this->getEstado()."\n".
                "tipo documento: ".$this->getTipoDocumento()."\n".
                "numero documento: ".$this->getNumeroDocumento()."\n";
        
    }

}