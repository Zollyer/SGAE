<?php
$estado1 = '
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
  <script src="bootstrap/jquery.min.js"></script>
  <script src="bootstrap/bootstrap.min.js"></script>
  <div class="container">
  <h2>Nuevo Boleto</h2> 

	<form class="form-inline" method="post" action="send.php">
		<p>Porfavor llene los siguientes datos:</p>
		  <div class="form-group">
		  
			<label for="mat">Matricula:</label>
			<input type="text" class="form-control" name="mat" placeholder="ABC-123" onpaste="return false" required="true" />
		  </div>
		  <button type="submit" class="btn btn-default">Imprimir</button>
		</form>
  </div>			
';


if(isset($UserDisplay)){
			//codigo y estilos con boostrap
			$file = fopen("mat.txt", "r");
				while(!feof($file)) {
					 if ( fgets($file) == 1){
						 echo $estado1;
						 die();
					 }else{
						 echo '<h1>impresora ocupada</h1>';
						 die();
					 }
					}
		     fclose($file);
				
					
				
	}else{
		echo ':v';
	}
	
?>