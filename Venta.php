<?php
class Venta{
    private $numero;
    private $fecha;
    private $cliente;//referencia al cliente
    private $coleccionMotos; //con objetos motos
    private $precioFinal;

	public function __construct($numeroV, $fechaV, $clienteV, $colMotosV, $precioFinalV) {

		$this->numero = $numeroV;
		$this->fecha = $fechaV;
		$this->cliente = $clienteV;
		$this->coleccionMotos = $colMotosV;
		$this->precioFinal  = $precioFinalV;
	}

	public function getNumero() {
		return $this->numero;
	}

	public function setNumero($numeroV) {
		$this->numero = $numeroV;
	}

	public function getFecha() {
		return $this->fecha;
	}

	public function setFecha($fechaV) {
		$this->fecha = $fechaV;
	}

	public function getCliente() {
		return $this->cliente;
	}

	public function setCliente($clienteV) {
		$this->cliente = $clienteV;
	}

	public function getColeccionMotos() {
		return $this->coleccionMotos;
	}

	public function setColeccionMotos($colMotosV) {
		$this->coleccionMotos = $colMotosV;
	}

	public function getPrecioFinal() {
		return $this->precioFinal;
	}

	public function setPrecioFinal($precioFinalV) {
		$this->precioFinal = $precioFinalV;
	}

    public function incorporarMoto($objMoto){
		$colMotos = $this->getColeccionMotos();
        

         if ($objMoto->getActiva()) {
            array_push($colMotos,$objMoto); 
			$this->setColeccionMotos($colMotos);
			$precioVenta = $objMoto->darPrecioVenta();
			$precioFinal = $this->getPrecioFinal() + $precioVenta;
            
            $this->setPrecioFinal($precioFinal);
        }
        
    }


    public function recorrerMotos(){
        
        $cad = "";
        for ($i=0; $i < count($this->getColeccionMotos()); $i++) { 
			$unaMoto = $this->getColeccionMotos()[$i];

			$cad .= "Moto ".($i+1).":".$unaMoto."\n";
		}
        return $cad;
    }

	/**
	 * retorna la sumatoria del precio venta de cada una de las motos Nacionales vinculadas a la venta
	 */
	public function retornarTotalVentaNacional(){
		$totalVentaNacional = 0;
		$coleccionMotos = $this->getColeccionMotos();

		foreach ($coleccionMotos as $unaMoto) {
			if ($unaMoto instanceof MotoNacional) {
				$totalVentaNacional += $unaMoto->darPrecioVenta(); 
			}
		}
		return $totalVentaNacional;
	}

	/**
	 *  retorna una colección de motos importadas vinculadas a la venta. Si la venta solo se corresponde con motos Nacionales la colección retornada debe ser vacía
	 */
	public function retornarMotosImportadas(){
		$coleccionMotosImportadasVenta = [];

		$coleccionMotos = $this->getColeccionMotos();

		foreach ($coleccionMotos as $unaMoto) {
			if ($unaMoto instanceof MotoImportada) {
				array_push($coleccionMotosImportadasVenta,$unaMoto);
			}
		}
		return $coleccionMotosImportadasVenta;
	}

    public function __toString(){
        return "Numero: ".$this->getNumero()."\n".
            "fecha: ".$this->getFecha()."\n".
            "cliente".$this->getCliente()."\n".
            $this->recorrerMotos()."\n".
            "Precio Final: ".$this->getPrecioFinal()."\n";
            
    }
}