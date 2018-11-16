<?php
$mode1 = '
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
  <script src="bootstrap/jquery.min.js"></script>
  <script src="bootstrap/bootstrap.min.js"></script>
  <div class="container">
  <h2>Interfaz Administrativa</h2>
  <a href="/querry/empleados.php" type="button" class="btn btn-default btn-block">Usuarios</a> 
  <a href="/querry/boletaje.php" type="button" class="btn btn-default btn-block">Boletaje</a>  
  <a href="/querry/?q=3" type="button" class="btn btn-default btn-block">Config</a>       
</div>			
			
			
			';

	if(isset($UserDisplay)){
		if($id_user_activo=='0'){
			//codigo y estilos con boostrap
			if(isset($_GET['q'])){
				$menu = test_input($_GET['q']);
				switch($menu){
					case 1:
					
					break;
					case 2:
					
					break;
					case 3:
					include_once('config.php');
					break;
				}
			}else{
				echo $mode1;
			}		
			
		}else{
			echo'.-';
		}		
	}else{
		echo ':v';
	}
	
?>