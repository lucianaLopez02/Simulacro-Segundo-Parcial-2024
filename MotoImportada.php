<?php 

include_once 'Moto.php';
class MotoImportada extends Moto{
    private $paisImportacion;
    private $importeImpuestoImportacion;

    public function __construct($codigoV, $costoV, $anioFabricacionV, $descripcionV, $incrementoAnualV, $activaV,$paisimportacion,$impuestoimportacioningreso){
        parent::__construct($codigoV, $costoV, $anioFabricacionV, $descripcionV, $incrementoAnualV, $activaV);

        $this->paisImportacion = $paisimportacion;
        $this->impuestoImportacionIngreso = $impuestoimportacioningreso;

    }

    public function getPaisImportacion(){
        return $this->paisImportacion;
    }

    public function setPaisImportacion($paisimportacion){
        $this->paisImportacion = $paisimportacion;
    }

    public function getImporteImpuestoImportacion(){
        return $this->importeImpuestoImportacion;    
    }

    public function setImporteImpuestoImportacion($importeimpuestoimportacion){
        $this->importeImpuestoImportacion = $importeimpuestoimportacion;
    }

    public function DarPrecioVenta(){
        $precioVenta = parent::DarPrecioVenta();
        $impuesto = $this->getImporteImpuestoImportacion();
        $precioFinal = $precioVenta + $impuesto;
        return $precioFinal;
    }

    public function __toString(){
        $cad = parent::__toString();
        $cad = $cad . "Pais de importacion: ".$this->getPaisImportacion()."\n".
                "\nImpuesto importacion ingreso: ".$this->getImporteImpuestoImportacion()."\n";
                return $cad;
    }
    

}

?>