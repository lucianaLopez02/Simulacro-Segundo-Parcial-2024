<?php 

include_once 'Moto.php';
class MotoNacional extends Moto{
    private $porcentajeDescuento;

    public function __construct($codigoV, $costoV, $anioFabricacionV, $descripcionV, $incrementoAnualV, $activaV){
        parent::__construct($codigoV, $costoV, $anioFabricacionV, $descripcionV, $incrementoAnualV, $activaV);

        $this->porcentajeDescuento = 15;

    }

    public function getPorcentajeDescuento(){
        return $this->porcentajeDescuento;
    }

    public function setPorcentajeDescuento($porcentajedescuento){
        $this->porcentajeDescuento = $porcentajedescuento;
    }

    public function DarPrecioVenta(){
        $precioVenta = parent::DarPrecioVenta();
        $porcentajeDescuento = $this->getPorcentajeDescuento() / 100;
        $precioFinal = $precioVenta - ($precioVenta * $porcentajeDescuento);
        return $precioFinal;
    }


    public function __toString(){
        $cad = parent::__toString();
        $cad = $cad . "Porcentaje de descuento es ".$this->getPorcentajeDescuento()."\n";
                return $cad;
    }
    

}

?>