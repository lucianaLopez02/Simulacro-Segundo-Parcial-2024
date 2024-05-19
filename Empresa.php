<?php 
class Empresa{
    private $denominacion;
    private $direccion;
    private $coleccionClientes;
    private $coleccionMotos;
    private $colVentasRealizadas;

	public function __construct($denominacionV, $direccionV, $colClientesV, $colMotosV, $colVentasV) {

		$this->denominacion = $denominacionV;
		$this->direccion = $direccionV;
		$this->coleccionClientes = $colClientesV;
		$this->coleccionMotos = $colMotosV;
		$this->colVentasRealizadas = $colVentasV;
	}

	public function getDenominacion() {
		return $this->denominacion;
	}

	public function setDenominacion($denominacionV) {
		$this->denominacion = $denominacionV;
	}

	public function getDireccion() {
		return $this->direccion;
	}

	public function setDireccion($direccionV) {
		$this->direccion = $direccionV;
	}

	public function getColeccionClientes() {
		return $this->coleccionClientes;
	}

	public function setColeccionClientes($colClientesV) {
		$this->coleccionClientes = $colClientesV;
	}

	public function getColeccionMotos() {
		return $this->coleccionMotos;
	}

	public function setColeccionMotos($colMotosV) {
		$this->coleccionMotos = $colMotosV;
	}

	public function getColVentasRealizadas() {
		return $this->colVentasRealizadas;
	}

	public function setColVentasRealizadas($colVentasV) {
		$this->colVentasRealizadas = $colVentasV;
	}

	public function retornarMoto($codigoMoto){
		$colMotos = $this->getColeccionMotos();
		$i = 0;
		$encontrado = false;
		$n = count($colMotos);
		$motoCodigo = null;
		while ($i < $n && !$encontrado) {
			$unaMoto = $colMotos[$i];
			if ($codigoMoto == $unaMoto->getCodigo()) {
				$motoCodigo = $colMotos[$i];
				$encontrado = true;
			}
			$i++;
		}
		return $motoCodigo;
	}

	public function registrarVenta($colCodigosMotos,$objCliente){
		$importeFinal = 0;
		 
		if($objCliente->getEstado() == "alta"){
			$motosAVender = [];
			$copiaColVentas = $this->getColVentasRealizadas();
			$idVenta = count($copiaColVentas)+1;
			$nuevaVenta = new Venta($idVenta, date("m/d/y"),$objCliente,$motosAVender,0);
			foreach ($colCodigosMotos as $unCodigoMoto) {
				$unObjMoto = $this->retornarMoto($unCodigoMoto);
				if($unObjMoto!=null){
					$nuevaVenta->incorporarMoto($unObjMoto);
				}
			}
			if(count($nuevaVenta->getColeccionMotos())>0){
				array_push($copiaColVentas,$nuevaVenta);
				$this->setColVentasRealizadas($copiaColVentas);
				$importeFinal = $nuevaVenta->getPrecioFinal();
			}
		}else{
			$importeFinal = -1;
		}
		return $importeFinal;
	}


	public function retornarVentasXCliente($tipo,$numDoc){
		$colVentas= $this->getColVentasRealizadas();
		$colVentasXCliente = [];
		for ($i=0; $i < count($colVentas); $i++) { 
			$venta = $colVentas[$i];
			$cliente = $venta->getCliente();
			if ($cliente->getTipoDocumento() == $tipo && $cliente->getNumeroDocumento() == $numDoc) {
				array_push($colVentasXCliente,$venta);
			}
		}
		return $colVentasXCliente;
	}

	public function recorrerColeccion($coleccion){
		
		$cad = "";
		for ($i=0; $i < count($coleccion); $i++) { 
			$unElemento = $coleccion[$i];
			$cad = $cad . " " . $unElemento . "\n";
			}
		return $cad;
	}
	
	

		/**
		 * recorre la colección de ventas realizadas por la
		 * empresa y retorna el importe total de ventas Nacionales
		 *  realizadas por la empresa
		 */
		public function informarSumaVentasNacionales(){
			$coleccionVentasRealizadas = $this->getColVentasRealizadas();
			$importeTotalVentasNacionales = 0;

			foreach ($coleccionVentasRealizadas as $unaVentaRealizada) {
				$totalVentaNacional = $unaVentaRealizada->retornarTotalVentaNacional();
				$importeTotalVentasNacionales += $totalVentaNacional;
			}

			return $importeTotalVentasNacionales;
		}

		/**
		 *  recorre la colección de ventas realizadas por la empresa y 
		 * retorna una colección de ventas de motos importadas. 
		 * Si en la venta al menos una de las motos es importada la 
		 * venta debe ser informada
		 */
		public function informarVentasImportadas(){
			$coleccionVentasRealizadas = $this->getColVentasRealizadas();
			$coleccionVentasMotosImportadas = [];
			foreach ($coleccionVentasRealizadas as $unaVentaRealizada) {
				$coleccionMotos = $unaVentaRealizada->getColeccionMotos();
				foreach ($coleccionMotos as $unaMoto) {
					if ($unaMoto instanceof MotoImportada) {
						array_push($coleccionVentasMotosImportadas,$unaVentaRealizada);
					}
				}
				
				
			}

			return $coleccionVentasMotosImportadas;
		}

		public function __toString(){
			return "\nDenomicacion: ".$this->getDenominacion()."\n".
				"Direccion:".$this->getDireccion()."\n".
				$this->recorrerColeccion($this->getColeccionClientes())."\n".
				$this->recorrerColeccion($this->getColeccionMotos())."\n".
				$this->recorrerColeccion($this->getColVentasRealizadas())."\n";
		}
}