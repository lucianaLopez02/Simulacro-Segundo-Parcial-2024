<?php 

include_once "Cliente.php";
include_once "Moto.php";
include_once "Venta.php";
include_once "Empresa.php";
include_once "MotoNacional.php";
include_once "MotoImportada.php";

// Cree 2 instancias de la clase Cliente: $objCliente1, $objCliente2
$objCliente = new Cliente("Yael","Machaique","baja","DNI",44481078);
$objCliente2 = new Cliente("Luciana","Lopez","alta","DNI",36784269);

//Cree 4 objetos Motos con la información visualizada en las siguientes tablas: código, costo, año fabricación,
//descripción, porcentaje incremento anual, activo entre otros.

$objMoto11 = new MotoNacional(11,2230000,2022,"Benelli Imperiale 400",85,true,10);
$objMoto12 = new MotoNacional(12,584000,2021,"Zanella Zr 150 Ohc",70,true,10);
$objMoto13 = new MotoNacional(13,999900,2023,"Zanella Patagonian Eagle 250",55,false);

$objMoto14 = new MotoImportada(14,124499900,2020,"Pitbike Enduro Motocross Apollo Aiii 190cc PLr",100,true,"Francia",6244400);

//Se crea un objeto Empresa con la siguiente información: denominación =” Alta Gama”, dirección= “Av
//Argenetina 123”, colección de motos= [$obMoto11, $obMoto12, $obMoto13, $obMoto14] , colección de clientes
//= [$objCliente1, $objCliente2 ], la colección de ventas realizadas=[].


$colClientes = [$objCliente,$objCliente2];
$colMotos = [$objMoto11,$objMoto12,$objMoto13,$objMoto14];
$objEmpresa = new Empresa("Alta Gama","Av Argentina 123",$colClientes,$colMotos,[]);

// Invocar al método registrarVenta($colCodigosMoto, $objCliente) de la Clase Empresa donde el
// $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
// punto 1) y la colección de códigos de motos es la siguiente [11,12,13]. Visualizar el resultado obtenido
$colCodigos = [11,12,13,14];
// Realizar un echo de la variable Empresa creada en 2
echo $objEmpresa->registrarVenta($colCodigos,$objCliente2);

// Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el
// $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
// punto 1) y la colección de códigos de motos es la siguiente [0]. Visualizar el resultado obtenido
$colCodigos2 = [13,14];
$objEmpresa->registrarVenta($colCodigos2,$objCliente2);

// Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el
// $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
// punto 1) y la colección de códigos de motos es la siguiente [2]. Visualizar el resultado obtenido

$colCodigos3 = [14,2];
$objEmpresa->registrarVenta($colCodigos3,$objCliente2);



//Invocar al método informarVentasImportadas(). Visualizar el resultado obtenido
$coleccionVentasImportadas = $objEmpresa->informarVentasImportadas();

for ($i=0; $i < count($coleccionVentasImportadas); $i++) { 
    echo $coleccionVentasImportadas[$i]."\n";
}


//Invocar al método informarSumaVentasNacionales(). Visualizar el resultado obtenido.

$totalSumaVentasNacionales = $objEmpresa->informarSumaVentasNacionales();
echo "La suma total de ventas es :".$totalSumaVentasNacionales;

//  $arreglo = $objEmpresa->retornarVentasXCliente("DNI",44481078);
// // print_r($arreglo);
// for ($i=0; $i < count($arreglo); $i++) { 
//     echo $arreglo[$i]."\n";
// }

// $arreglo2 = $objEmpresa->retornarVentasXCliente("DNI",36784269);
// for ($i=0; $i < count($arreglo2); $i++) { 
//     echo $arreglo2[$i]."\n";
// }

