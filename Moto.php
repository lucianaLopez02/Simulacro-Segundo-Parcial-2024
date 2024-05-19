<?php
class Moto{
    private $codigo;
    private $costo;
    private $anioFabricacion;
    private $descripcion;
    private $porcentajeIncrementoAnual;
    private $activa; //atributo booleano

	public function __construct($codigoV, $costoV, $anioFabricacionV, $descripcionV, $incrementoAnualV, $activaV) {

		$this->codigo = $codigoV;
		$this->costo = $costoV;
		$this->anioFabricacion = $anioFabricacionV;
		$this->descripcion = $descripcionV;
		$this->porcentajeIncrementoAnual = $incrementoAnualV;
		$this->activa = $activaV;
	}

	public function getCodigo() {
		return $this->codigo;
	}

	public function setCodigo($codigoV) {
		$this->codigo = $codigoV;
	}

	public function getCosto() {
		return $this->costo;
	}

	public function setCosto($costoV) {
		$this->costo = $costoV;
	}

	public function getAnioFabricacion() {
		return $this->anioFabricacion;
	}

	public function setAnioFabricacion($anioFabricacionV) {
		$this->anioFabricacion = $anioFabricacionV;
	}

	public function getDescripcion() {
		return $this->descripcion;
	}

	public function setDescripcion($descripcionV) {
		$this->descripcion = $descripcionV;
	}

	
	public function getPorcentajeIncrementoAnual() {
		return $this->porcentajeIncrementoAnual;
	}

	public function setPorcentajeIncrementoAnual($incrementoAnualV) {
		$this->porcentajeIncrementoAnual = $incrementoAnualV;
	}

	public function getActiva() {
		return $this->activa;
	}

	public function setActiva($activaV) {
		$this->activa = $activaV;
	}

	public function darPrecioVenta(){
		$activa = $this->getActiva();
		if ($activa){
			$anio = 2024;
			$aniosTranscurridos = $anio - $this->getAnioFabricacion();
			$porcAnual = $this->getPorcentajeIncrementoAnual() / 100;
			$disponible = $this->getCosto() +  $this-> getCosto() * ($aniosTranscurridos * $porcAnual);
			
		}else{
			$disponible = -1;
		}
		return $disponible;
	}


	public function __toString(){
		return "\nCodigo: ".$this->getCodigo()."\n".
				"Costo: ".$this->getCosto()."\n".
				"Año de fabricacion: ".$this->getAnioFabricacion()."\n".
				"Descripcion: ".$this->getDescripcion()."\n".
				"Incremento Anual: ".$this->getPorcentajeIncrementoAnual()."\n".
				"Activa: ".$this->getActiva()."\n";
	}
}