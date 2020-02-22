<?php

$idPadre = $_POST['Id'];							    
							
if (isset($_POST['Actualizar'])) {
	include('conn.php');
	if (isset($_POST['nombres']) && !empty($_POST['nombres']&&        
		isset($_POST['paterno']) && !empty($_POST['paterno'])&&
		isset($_POST['materno']) && !empty($_POST['materno'])&&
		isset($_POST['curp']) && !empty($_POST['curp']) && 							    
		isset($_POST['fecha_nacimiento']) && !empty($_POST['fecha_nacimiento']) && 
		isset($_POST['genero']) && !empty($_POST['genero']) &&  
		isset($_POST['direccion']) && !empty($_POST['direccion']) && 
		isset($_POST['telefono']) && !empty($_POST['telefono']) &&
		isset($_POST['email']) && !empty($_POST['email']) &&
		isset($_POST['grado']) && !empty($_POST['grado']) &&
		isset($_POST['rfc']) && !empty($_POST['rfc']) &&
		isset($_POST['ocupacion']) && !empty($_POST['ocupacion']) &&
	isset($_POST['tutor']) && !empty($_POST['tutor']))) {

		$nombres = trim($_POST['nombres']);
		$paterno = trim($_POST['paterno']);
		$materno = trim($_POST['materno']);
		$curp = trim($_POST['curp']);
		$rfc = trim($_POST['rfc']);
		$fecha = trim($_POST['fecha_nacimiento']);
		$genero = trim($_POST['genero']);
		$direccion = trim($_POST['direccion']);
		$telefono = trim($_POST['telefono']);
		$email = trim($_POST['email']);
		$grado = trim($_POST['grado']);
		$ocupacion = trim($_POST['ocupacion']);
		$tutor = trim($_POST['tutor']);
		$curp = strtoupper($curp);

		$q = "UPDATE padres SET nombres='$nombres', apellido_paterno='$paterno', apellido_materno='$materno', ";
	    $q .= "curp='$curp', rfc='$rfc', direccion='$direccion', email='$email', telefono='$telefono', ";
	    $q .= "grado_estudios='$grado', ocupacion='$ocupacion', tutor='$tutor', genero='$genero', fecha_nacimiento='$fecha'";
	    $q .= "WHERE id_padre='$idPadre'";
		
		$resultado = $mysqli->query($q);
		if ($resultado) {		
			echo "<a href='pruebaMenu.php'><h6><span>¡Datos actualizados! CLICK AQUÍ</span></h6></a>";
			require('pruebaMenu.php');
		}
		
		}
		else{			
			echo "<a href='pruebaMenu.php'><h6>No se pudo actualizar! CLICK AQUÍ</h6></a>";   		
			require('pruebaMenu.php');
		}

		include('cerrarconexion.php');
}

?>
