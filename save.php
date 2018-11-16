<?php

include_once 'conexion.php';
function mode_1(){
	
	//Preparar datos
	$hora_entrada = test_input($_GET['t']);
	$fecha = test_input($_GET['f']);
	$matricula = test_input($_GET['m']);
    $costo = test_input($_GET['c']);
	$usuario = " ";
	//usuario
	
	//se comprueba el dato del checkbox
	
	//consulta a MYSQL/
	$sql = "INSERT INTO boletos(hora_entrada,fecha,matricula,usuario,total)
					VALUES ('".$hora_entrada."','".$fecha."','".$matricula."','".$usuario."','".$costo."')"; 	//id-- es el panel al que se quiso acceder , nombre to es el nombre del empleado en la base de datos , userid es el numero de empleado
	mysql_query($sql);	
	return 'Ha salido bien (:';
}	

//sanitizador

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//matricula , hora de entrada , hora de salida

if(isset($_GET["ml"])){
	 	mode_1();		
}
 if(isset($_GET["mll"])){
	 	//mode_2();		
}   
?>