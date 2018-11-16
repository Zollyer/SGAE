<?
function data_is(){
	
	//Preparar datos
	$Nombre = test_input($_POST['Nombre']);
	
	//se comprueba el dato del checkbox
	if(!isset($_POST['Producción'])){ $Produccion = 0;	}else{  $Produccion = 1;  }
	if(!isset($_POST['Finanzas'])){ $Finanzas = 0;	}else{  $Finanzas = 1;  }
	if(!isset($_POST['Marketing'])){ $Marketing = 0;	}else{  $Marketing = 1;  }
	if(!isset($_POST['wiki'])){ $wiki = 0;	}else{  $wiki = 1;  }
	if(!isset($_POST['Creativo'])){ $Creativo = 0;	}else{  $Creativo = 1;  }
	if(!isset($_POST['Investigación'])){ $Investigación = 0;	}else{  $Investigación = 1;  }
	if(!isset($_POST['Ventas'])){ $Ventas = 0;	}else{  $Ventas = 1;  }
	if(!isset($_POST['Recursos'])){ $Recursos = 0;	}else{  $Recursos = 1;  }
	if(!isset($_POST['Estadísticas'])){ $Estadísticas = 0;	}else{  $Estadísticas = 1;  }
	if(!isset($_POST['Dirección'])){ $Dirección = 0;	}else{  $Dirección = 1;  }
	
	//consulta a MYSQL/
	$sql = "INSERT INTO interfaz(nombre,produccion,contabilidad,marketing,wiki,creativo,investigacion,ventas,recursos_humanos,estadisticas,direccion_general)
					VALUES ('".$Nombre."','".$Produccion."','".$Finanzas."','".$Marketing."','".$wiki."','".$Creativo."','".$Investigación."','".$Ventas."','".$Recursos."','".$Estadísticas."','".$Dirección."')"; 	//id-- es el panel al que se quiso acceder , nombre to es el nombre del empleado en la base de datos , userid es el numero de empleado
	mysql_query($sql);	
	return 'Ha salido bien (:';
}	

function interfaz_option(){ //Creador de options para formularios Interfaz
	
	//consulta de datos de la interfaz a editar

	$res='';
			$sql = "SELECT * FROM interfaz ORDER BY id ASC";  
			$x=0; //contador
			$rec = mysql_query($sql);	
				while($row = mysql_fetch_object($rec)){  //regresa la tabla de interfaz
					$result = $row;	
				if($x==0){ } //Ocultar interfaz desarrollador
				else{ 
				$nombre = $result->nombre;
				$id = $result->id;
				echo '<option value="'.$id.'">'.$nombre.'</option>';
				}
				$x++; //Saltando a numero 1
				}
	
}

function interfaz_option_select($id_interfaz){ //Creador de options para formularios Interfaz
	
	//consulta de datos de la interfaz a editar

	$res='';
			$sql = "SELECT * FROM interfaz ORDER BY id ASC";  
			$x=0; //contador
			$rec = mysql_query($sql);	
				while($row = mysql_fetch_object($rec)){  //regresa la tabla de interfaz
					$result = $row;	
				if($x==0){ } //Ocultar interfaz desarrollador
				else{ 
					if($id_interfaz == $result->id){
						$nombre = $result->nombre;
						$id = $result->id;
						echo '<option value="'.$id.'" selected>'.$nombre.'</option>';						
					}else{
						$nombre = $result->nombre;
						$id = $result->id;
						echo '<option value="'.$id.'">'.$nombre.'</option>';
					}
					
				}
				$x++; //Saltando a numero 1
				}
	
}

function editar_vacante($nombre,$sueldo,$interfaz,$perfil,$id_vacante){ //metodo para ingresar datos a la base de datos
	
	//consulta a MYSQL/
	$sql = "UPDATE puesto SET nombre = '".$nombre."',sueldo = '".$sueldo."' ,perfil = '".$perfil."',id_interfaz = '".$interfaz."' WHERE id=".$id_vacante; 	//id-- es el panel al que se quiso acceder , nombre to es el nombre del empleado en la base de datos , userid es el numero de empleado
	mysql_query($sql);	
	return 'Datos de vacante';
}	

function vacante_nueva($nombre,$sueldo,$interfaz,$perfil){ //actualizar vacante de la BD
	
	//consulta a MYSQL/
	$sql = "INSERT INTO puesto(nombre,sueldo,perfil,disponible,id_interfaz)
					VALUES ('".$nombre."','".$sueldo."','".$perfil."','1','".$interfaz."')"; 	//id-- es el panel al que se quiso acceder , nombre to es el nombre del empleado en la base de datos , userid es el numero de empleado
	mysql_query($sql);	
	return 'Vacante creada';
}	

function vacante_is($id_vacante){
	
 	
	$res='';
			$sql = "SELECT * FROM puesto WHERE id = ".$id_vacante;  
			$x=0; //contador
			$rec = mysql_query($sql);	
				while($row = mysql_fetch_object($rec)){  //regresa la tabla de interfaz
					$result = $row;		
					$nombre = $result->nombre;
					$sueldo = $result->sueldo;
					$perfil = $result->perfil;
					$id_interfaz = $result->id_interfaz;
				}
		
	echo '<div class="well">
		<legend>Editar Vacante</legend>
					
		<!-- Text input-->

		<div class="form-group">	
			<div class="input-group">
					<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span> Nombre de la Vacante</span>
					<input id="msg" type="text" class="form-control" name="nombre"  value="'.$nombre.'" placeholder="Nombre de la Vacante" value required="">
			
			</div>	
		</div>
			
		<div class="form-group">	
				<div class="input-group">
					<span class="input-group-addon"><span class="glyphicon glyphicon-usd"></span> Sueldo</span>
					<input id="msg" type="number" min="0.00" max="10000.00" step="0.01" value="'.$sueldo.'"  class="form-control" name="sueldo" placeholder="Sueldo" required="">
				 </div>
		</div>	 

		<div class="form-group">	
				<div class="input-group">
					<span class="input-group-addon"><span class="glyphicon glyphicon-cog"></span> Interfaz de acceso</span>
					<select class="form-control" id="sel1" name="interfaz" required="">
					<option> </option>
					';
			//extracion de datos
								
				interfaz_option_select($id_interfaz);//mostrar interfacez de la base de datos
			echo    '
			  </select>
					 </div>
			</div>

			<hr>
			<div class="container">
			  <p><b>  <span class="glyphicon glyphicon-education"></span> Perfil de Vacante:</b></p>
			  <p>Mencionar todas las carreras afines , cualidades e informacion relevante necesaria para la contracion. </p>
			   
			  <textarea class="form-control"  name="perfil" style="width: 95%;" rows="5" id="comment" placeholder="Ingeniero en... ,Licenciado en..." required="">'.$perfil.'</textarea>

			<br>
			<a href="/spap/index.php?id=9&path=Admin" class="btn btn-danger" role="button">Cancelar</a>
			<input type="submit" class="btn btn-success" value="Guardar">


			</div>
			</div>';	
}
function existe_cuenta($email){//comprobar si el usuario existe
	$sql = 'SELECT * FROM usuarios'; 
        $rec = mysql_query($sql); 
        $verificar_usuario = 0;//Creamos la variable $verificar_usuario que empieza con el valor 0 y si la condición que verifica el usuario(abajo), entonces la variable toma el valor de 1 que quiere decir que ya existe ese nombre de usuario por lo tanto no se puede registrar
  
        while($result = mysql_fetch_object($rec)) 
        { 
            if($result->email == $email) //Esta condición verifica si ya existe el usuario 
            { 
                $verificar_usuario = 1; 
            } 
        } 
  
        if($verificar_usuario == 0) 
        { 
			return 0; //No se ha encontrado 
        } 
        else 
        { 
		    return 1;  //Este usuario ya ha sido registrado anteriormente 
        } 
	
}

function existe_vacante($id){//comprobar si el usuario existe
		$sql = 'SELECT * FROM puesto'; 
        $rec = mysql_query($sql); 
        $verificar = 0;//Creamos la variable $verificar_usuario que empieza con el valor 0 y si la condición que verifica el usuario(abajo), entonces la variable toma el valor de 1 que quiere decir que ya existe ese nombre de usuario por lo tanto no se puede registrar
  
        while($result = mysql_fetch_object($rec)) 
        { 
            if($result->id == $id) //Esta condición verifica si ya existe la vacante 
            { 
                if($result->disponible == 1){//comprobar si esta disponible
					return 1;
				}else{
					return 0;
				}
				
            } 
        } 
 }
 
function nuevo_empleado($id_vacante,$nombre,$num_seguro,$direccion,$nivel_academico,$extras,$num_cuenta,$contrato){//almacenar datos del empleado
	
		$sql = "INSERT INTO empleados (nombre,numero_seguro_social,direccion,nivel_academico,extras,estado_laboral,numero_de_cuenta,inicio_de_contrato,id_puesto) 
							 VALUES ('$nombre','$num_seguro','$direccion','$nivel_academico','$extras',' ','$num_cuenta','$contrato','$id_vacante')";//Se insertan los datos a la base de datos
        mysql_query($sql); 
		
}

function ultimo_empleado(){//comprobar si el usuario existe
		$sql = 'SELECT * FROM empleados ORDER by ID DESC LIMIT 1'; 
        $rec = mysql_query($sql); 

        while($result = mysql_fetch_object($rec)) 
        {           
              return $result->id;
			   
        } 
 }


function nuevo_nexo_user($interfaz,$id_empleado,$vacante,$id_vacante,$email,$password){ // Crear Cuenta Nexo
					 
					 echo $interfaz;
					$cpassword = password_hash($password, PASSWORD_DEFAULT);
					 //echo $cpassword;
					//captura en la base de datos
					$sql2 = "INSERT INTO usuarios (id_empleado,name,email,pass,lv_seg) VALUES ('$id_empleado','$vacante','$email','$cpassword','".$interfaz."')";//Se insertan los datos a la base de datos y el usuario ya fue registrado con exito.
					 mysql_query($sql2);
					
					//
			
}	



function cerrar_vacante($id_vacante){ // Actualizar tabla , cerrando vacante
					 
					$sql = "UPDATE puesto SET disponible='0' WHERE id=".$id_vacante;
					 mysql_query($sql);
					
					//
			
}

function abrir_vacante($id_vacante){ // Actualizar tabla , abriendo vacante
					 
					$sql = "UPDATE puesto SET disponible='1' WHERE id=".$id_vacante;
					 mysql_query($sql);
					
					//
			
}	

function cual_es_interfaz($id_vacante){ 
		//consultar que interfaz tendra la cuenta nexo
	
			$sql = "SELECT * FROM puesto WHERE id = ".$id_vacante;  
			$x=0; //contador
			$rec = mysql_query($sql);	
				while($row = mysql_fetch_object($rec)){  //regresa la tabla de interfaz
					$result = $row;		
					return $result->id_interfaz;									
				}
}

function disponibilidad_empleado($id_empleado,$value){ // Actualizar tabla , abriendo vacante
					 
					$sql = "UPDATE empleados SET estado_laboral='".$value."' WHERE id=".$id_empleado;
					 mysql_query($sql);
					
					echo '
					<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
					<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
					<script>
							$(document).ready(function(){
								$(".close").click(function(){
									$("#myAlert").alert("close");
								});
							});
						</script>';
					echo '<div class="alert alert-success alert-dismissible" id="myAlert">
							<a href="#" class="close">&times;</a>
							<strong>Listo!</strong> Se ha actualizado a: '.$value.'.
						  </div>';
					echo '<a href="/spap/index.php?id=9&path=Admin" class="btn btn-danger" role="button">Cancelar</a>';	
}	

function borrar_empleado($data_id){
	
$res='';
		$sql = "DELETE FROM empleados WHERE id = ".$data_id;  
		$rec = mysql_query($sql);
		
//Notificacion Flotante

echo '
					<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
					<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
					<script>
							$(document).ready(function(){
								$(".close").click(function(){
									$("#myAlert").alert("close");
								});
							});
						</script>';
					echo '<div class="alert alert-success alert-dismissible" id="myAlert">
							<a href="#" class="close">&times;</a>
							<strong>Listo!</strong> Se ha eliminado datos con exito.
						  </div>';
					echo '<a href="/spap/index.php?id=9&path=Admin" class="btn btn-danger" role="button">Cancelar</a>';		
	
}

function borrar_nexo_cuenta($data_id){ 
		//consultar que interfaz tendra la cuenta nexo
	
		$res='';
		$sql = "DELETE FROM usuarios WHERE id_empleado = ".$data_id;  
		$rec = mysql_query($sql);
		
//Notificacion Flotante

		echo '
					<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
					<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
					<script>
							$(document).ready(function(){
								$(".close").click(function(){
									$("#myAlert").alert("close");
								});
							});
						</script>';
					echo '<div class="alert alert-success alert-dismissible" id="myAlert">
							<a href="#" class="close">&times;</a>
							<strong>Listo!</strong> Se ha eliminado cuenta nexo con exito.
						  </div>';	
	
}

function borrar_aspirante($data_id){
	
$res='';
		$sql = "DELETE FROM aspirantes WHERE id = ".$data_id;  
		$rec = mysql_query($sql);
		
//Notificacion Flotante

echo '
					<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
					<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
					<script>
							$(document).ready(function(){
								$(".close").click(function(){
									$("#myAlert").alert("close");
								});
							});
						</script>';
					echo '<div class="alert alert-success alert-dismissible" id="myAlert">
							<a href="#" class="close">&times;</a>
							<strong>Listo!</strong> Se ha eliminado datos con exito.
						  </div>';
					echo '<a href="/spap/index.php?id=9&path=Admin" class="btn btn-danger" role="button">Cancelar</a>';		
	
}

function info_aspirante($id_vacante){ 
		//consultar que interfaz tendra la cuenta nexo
	
			$sql = "SELECT * FROM aspirantes WHERE id = ".$id_vacante;  
			$x=0; //contador
			$rec = mysql_query($sql);	
				while($row = mysql_fetch_object($rec)){  //regresa la tabla de interfaz
					$result = $row;
					$nombre = $result->nombre; 
					$email = $result->email;
					$telefono = $result->telefono;
					$fecha = $result->fecha_de_nacimiento;
					$grado = $result->estudios;				
					$info =  $result->perfil;
					
				}
			echo '
					<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
					<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
					<script>
					$(document).ready(function(){
							$("#myModal").modal();
					  });
					</script>';
					
					echo '<a href="/spap/index.php?id=9&path=Admin" class="btn btn-danger" role="button">Cancelar</a>';	
					echo '
					 <!-- Modal -->
					  <div class="modal fade" id="myModal" role="dialog">
						<div class="modal-dialog">
						
						  <!-- Modal content-->
						  <div class="modal-content">
							<div class="modal-header">
							  <button type="button" class="close" data-dismiss="modal">&times;</button>
							  <h4 class="modal-title">Informacion:</h4>
							</div>
							<div class="modal-body">
							  <h4>'.$nombre.'</h4>							  
							  <p><b>Telefono: </b>'.$telefono.'</p>
							  <p><b>Email: </b>'.$email.'</p>
							  <p><b>Grado de estudios: </b>'.$grado.'</p>
							  <p><b>edad: </b>'.$fecha.'</p>
							  <p><b>Sobre Mi: </b>'.$info.'</p>
							</div>
							<div class="modal-footer">
							  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						  </div>
						  
						</div>';
					
}
?>