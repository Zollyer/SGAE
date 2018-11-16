<center>
<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if(isset($_POST["mat"])){
				
				//escribir en archivo de texto.
				$file = fopen("mat.txt", "r");
				while(!feof($file)) {
					 if ( fgets($file) == 1){
						 echo 'Se ha registrado: '.test_input($_POST['mat']);
						 echo '<br> <b>Tu Tiket ha Sido enviado</b>';	
						echo '<br><img src="yes.png"; style="height:120px;"></img>';
				        echo '<br> <h2><a href="index.php" >Atras</a></h2>';
						//ejecutar servidor
						$file2 = fopen("mat.txt", "w");
						fwrite($file2, test_input($_POST['mat']) . PHP_EOL);
						fclose($file2);
					 die();
					 }else{
						 echo '<b>Impresora Ocupada reintenta en 5 segundos..</b><br>';
						 echo '<br><img src="ohno.jpg"; style="height:220px;"></img>';
				         echo '<br> <h2><a href="index.php" >Atras</a></h2>';
					 die(); 
					 }
					}
					fclose($file);
			}else{
				echo "erro: No se se recibio ninguna matricula.";
			}
    
?>