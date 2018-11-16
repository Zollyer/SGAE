
 <script>
function muestra_oculta(id){
if (document.getElementById){ //se obtiene el id
var el = document.getElementById(id); //se define la variable "el" igual a nuestro div
el.style.display = (el.style.display == 'none') ? 'block' : 'none'; //damos un atributo display:none que oculta el div
}
}
window.onload = function(){
	setTimeout ("muestra_oculta('contenido');", 7000);
	
}

</script>


<?php
header ('Content-type: text/html; charset=utf-8');

// ----------------- LAUNCHER GENERAL  ----------
//sanitisar entrada
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {	
  $usuario = test_input($_POST["user"]);
  $contraseña = test_input($_POST["password"]);
  $login = test_input($_POST["login"]);
}



$notification = array(' ',' '); //variable para imprimir con style los textos

session_start();
include_once "conexion.php";

function verificar_login($user,$password,&$result) {
	
    $sql = "SELECT * FROM usuarios WHERE usuario = '$user'";
    $rec = mysql_query($sql);
    $count = 0;
	$pase=0;
    while($row = mysql_fetch_object($rec))
    {
        $count++;
        $result = $row;
		$cod = $result->pass;		
		$pase = password_verify($password, $cod);		
		
    }
	
	// REGISTER DEBE LLEVAR EL PASS HASH
	//$iguales = password_verify($original, $codificado);
	//$cpassword = password_hash($password, PASSWORD_DEFAULT);
	//echo $password;
	//echo $cod; 
	//echo $cpassword;
	
	echo '<center><div id="contenido"  style="text-shadow: 0px 4px 9px black; box-shadow: -1px 2px 15px 0px transparent; width: 200px;heigth: 200px border-radius: 50%; rgba(30, 35, 29, 0.71); "><br><br>';
	 if($count == 0)
    {
        echo '<h4>El Usuario no existe</h4>';
    }
    if($pase)
    {
        return 1;
		
    }
    else
    {
        return 0;
		
    }
}

if(!isset($_SESSION['userid']))
{
    if(isset( $login ))
    {
        if(verificar_login($usuario,$contraseña,$result) == 1)
        {
            $_SESSION['userid'] = $result->id;
			$_SESSION['user'] = $result->usuario;
		    header("Location: index.php");
			exit;
        }
        else
        {
			echo '<h4>Su password es incorrecto</h4></div></center>';
            
        }
    }
  //Launcher Login
  
   //echo $cpassword = password_hash("admin", PASSWORD_DEFAULT);
  include_once 'login/index.php';
  
  
} else {
	
  //Generar variables de Uso Usuario
  
    $UserDisplay = $_SESSION['user'];
	$id_user_activo = $_SESSION['userid'] ;
	
    echo '<h4><a href="logout.php">Salir de '. $_SESSION['user'].' </a></h4>';	
	
  //Launcher 
  
	//include_once "ban/isban.php"; //algoritmo de baneo
	
	//include_once 'go/index.php';
	//echo 'Acceso correcto';
	if($id_user_activo=='0'){
		include_once '3sfs.php';
	}else{
		include_once '3s.php';
	}
		
}
?>