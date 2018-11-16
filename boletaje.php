  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
  <script src="bootstrap/jquery.min.js"></script>
  <script src="bootstrap/bootstrap.min.js"></script>
  <title>Boletos</title>
  
<script type="text/javascript">
        $(document).ready(function () {

            (function ($) {

                $('#filtrar').keyup(function () {

                    var rex = new RegExp($(this).val(), 'i');
                    $('.buscar tr').hide();
                    $('.buscar tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();

                })

            }(jQuery));

        });
 </script>    
	
	
<div class="container">

<?php

session_start();
if(!isset($_SESSION['userid'])){
	die();
}
$id_user_activo = $_SESSION['userid'];
if($id_user_activo=='0'){
	  echo '<center><br><br>
	  <a href="index.php" type="button" class="btn btn-danger">Atras</a>';
	}else{
		echo '<center><h1>Error 404</h1><b>PAGINA NO ENCONTRADA'; 
		die();
	}

	//saber que boton se ha presionado
	//echo test_input($_POST['boton2']);
if(isset($_POST['boton2'])){
	
	switch (test_input($_POST['boton2'])) {		
			
		case 1://Asignar Capacitacion	
		$data_id = test_input($_POST['id_empleado']);
		include_once $url_module.'bd_capture.php';//importando modulo 
		$value = 'Capacitacion';
		disponibilidad_empleado($data_id,$value);		
		break;
			
	}
	
}

    include_once('conexion.php');
	
	echo '<div class="container">';
	echo '<h3>Boletaje</h3><p>Estos son los boletos del dia.</p>';
	echo '<div class="input-group"> <span class="input-group-addon">Buscar</span>
        <input id="filtrar" type="text" class="form-control" placeholder="Buscar...">
      </div>
	    <table class="table table-striped">
        <thead>
          <tr>
		    <th>Folio</th>
            <th>Usuario</th>
            <th>Matricula</th>
			<th>Fecha</th>
			<th>Hora</th>
			<th>Total</th>
            <th>Opciones</th>
          </tr>
        </thead>
        <tbody class="buscar">';
		//datos de MYSQL
		$res='';
		
		$sql = "SELECT * FROM boletos";  
		$rec = mysql_query($sql);	
			while($row = mysql_fetch_object($rec)){  //regresa la tabla de vacantes
				$result = $row;
				echo '<tr>';
				echo '<td>'.$result->id.'</td>';
				echo '<td>'.$result->usuario.'</td>';
				echo '<td>'.$result->matricula.'</td>';	
				echo '<td>'.$result->fecha.'</td>';	
				echo '<td>'.$result->hora_entrada.' a '.$result->hora_salida.'</td>';
				echo '<td>$'.$result->total.'</td>';				
				//echo '</tr>';
				//Menu de opcciones
				echo '<td>
				<form action="index.php" method="get">';
				
					echo '<button type="submit"  class="btn btn-sm btn-default" name="boton2" value= "2"> Eliminar</button>';
				
				
				echo '				
					
					</form>
				</td>';		

				
			   echo '</tr>';	
			   
			}			
			echo '</tbody></table>';
?>	 
</div>