  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
  <script src="bootstrap/jquery.min.js"></script>
  <script src="bootstrap/bootstrap.min.js"></script>
  
<?php

function runall(){
	

if(isset($_GET['precio'])){
	//varibles de carga
	$price = test_input($_GET['precio']);
	$horas = test_input($_GET['horas']);
	$price_frac = test_input($_GET['precio_fraccion']);
	$fraccion = test_input($_GET['minutos']);
	
	$file = fopen("config.txt", "w");
	
	fwrite($file, $price . PHP_EOL);
	fwrite($file, $horas . PHP_EOL);
	fwrite($file, $price_frac . PHP_EOL);
	fwrite($file, $fraccion . PHP_EOL);
	
	fclose($file);
	
	echo '<div class="container">
		  <h2>Configuraciones Editadas</h2><p>La configuracion actual es esta:</p>
		  <label>El costo inicial del boleto es:</label><p>$'.$price.' pesos</p>
		  <label>Despues de :</label><p>'.$horas.' Horas</p>
		  <label>Se realiza un cobro adicional de :</label><p>$'.$price_frac.' Pesos</p>
		  <label>Cada :</label><p>'.$fraccion.' Minutos</p>
		  <a href="index.php?q=3" type="button" class="btn btn-danger">Volver a editar</a>
		  <a href="/querry/" type="button" class="btn btn-success">Listo</a>
		  </div>';
	
	die();
}else{
	
}



			$file = fopen("config.txt", "r");
			$price = fgets($file); //linea 1
			$horas = fgets($file); //linea 3
			$price_frac = fgets($file); //linea 1			
			$fraccion = fgets($file); //linea 1
			//echo 'Clave de Encreptacion: '.$cpassword = password_hash($price, PASSWORD_DEFAULT);
     
			//password_verify();
			
			
			
			
$estado1 = '

  <div class="container">
  <h2>Configuraciones</h2> 

	<form class="form-inline" method="get" action="index.php">
		<p>Estas son las config actuales:</p>
		  <label>El costo inicial del boleto es:</label><p>$'.$price.' pesos</p>
		  <label>Despues de :</label><p>'.$horas.' Horas</p>
		  <label>Se realiza un cobro adicional de :</label><p>$'.$price_frac.' Pesos</p>
		  <label>Cada :</label><p>'.$fraccion.' Minutos</p>
		  
		  <br>
		  <p><b>Informacion adicional:</b> <br> Si usted no utiliza fracciones de Hora coloque "9999" en el campo horas iniciales para desactivar las fracciones, si por el contrario usted cobra por tiempo , coloque 0 , en el campo precio y coloque 60 minutos para cobrar por cada hora, si usted cobra despues de ciertas horas por fraciones configure todos los campos</p>
		  <h2>Configurar:</h2>
		  <input type="number" value="3" name="q" onpaste="return false" required="true" hidden/>
		  <p>Edita los datos correspodientes y da click en guardar para efectuar los cambios</p>
		  <hr>
		  <div class="form-group">		  
			<label for="mat">Precio:</label>
			<input type="number" class="form-control" name="precio" placeholder="'.$price.'" value='.$price.' onpaste="return false" required="true" />
		  </div>
		  <div class="form-group">		  
			<label for="mat">Horas Iniciales:</label>
			<input type="number" class="form-control" name="horas" placeholder="'.$horas.'" value='.$horas.' onpaste="return false" required="true" />
		  </div>
		  
		  <div class="form-group">		  
			<label for="mat">Cobro por Fraccion:</label>
			<input type="number" class="form-control" name="precio_fraccion" placeholder="'.$price_frac.'" value='.$price_frac.' onpaste="return false" required="true" />
		  </div>
		  <div class="form-group">		  
			<label for="mat">Minutos de Fraccion:</label>
			<input type="number" class="form-control" name="minutos" placeholder="'.$fraccion.'" value='.$fraccion.' onpaste="return false" required="true" />
		  </div>
		  <hr>
		  <a href="/querry/" type="button" class="btn btn-danger">Cancelar</a>
		  <button type="submit" class="btn btn-success">Guardar</button>
		</form>
  </div>			
';


echo $estado1;

echo 'dev: 1.0.5';
}

	if(isset($UserDisplay)){
		if($id_user_activo=='0'){
			//codigo y estilos con boostrap
				runall();//launcher de codigo
		}else{
			echo'.-';
		}		
	}else{
		echo ':v';
	}
	




?>