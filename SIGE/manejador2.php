<?php

$idUsuario = $_POST['id_estudiante'];							    
							
if (isset($_POST['Insertar'])) {
include('conn.php');							
if (isset($_POST['id_ficha']) && !empty($_POST['id_ficha'])) {
	if (isset($_POST['peso']) && !empty($_POST['peso']&&        
	isset($_POST['estatura']) && !empty($_POST['estatura'])&&
	isset($_POST['padecimiento_medico']) && !empty($_POST['padecimiento_medico'])&&
 	isset($_POST['alergias']) && !empty($_POST['alergias']) && 							    
	isset($_POST['medicamentos']) && !empty($_POST['medicamentos']) && 
	isset($_POST['grupo_sanguineo']) && !empty($_POST['grupo_sanguineo']) &&  
	isset($_POST['fecha_actualizacion']) && !empty($_POST['fecha_actualizacion']) && 
	isset($_POST['institucion_medica']) && !empty($_POST['institucion_medica']) &&
	isset($_POST['medico_nombre']) && !empty($_POST['medico_nombre']) &&
	isset($_POST['medico_tel']) && !empty($_POST['medico_tel']) &&							        
	isset($_POST['id_estudiante']) && !empty($_POST['id_estudiante']))) {

		$peso = trim($_POST['peso']);
		$estatura = trim($_POST['estatura']);
		$padecimiento_medico = trim($_POST['padecimiento_medico']);
		$alergias = trim($_POST['alergias']);
		$medicamentos = trim($_POST['medicamentos']);
		$grupo_sanguineo = trim($_POST['grupo_sanguineo']);
		$institucion_medica = trim($_POST['institucion_medica']);
		$medico_nombre = trim($_POST['medico_nombre']);
		$medico_tel = trim($_POST['medico_tel']);							    						
		$id_estudiante = trim($_POST['id_estudiante']);	

		$resultado = $mysqli->query("UPDATE ficha_medica SET peso ='$peso', estatura ='$estatura', padecimiento_medico ='$padecimiento_medico', alergias ='$alergias', medicamentos ='$medicamentos', grupo_sanguineo ='$grupo_sanguineo', fecha_actualizacion = NOW(), institucion_medica ='$institucion_medica', medico_nombre ='$medico_nombre', medico_tel ='$medico_tel', id_estudiante ='$id_estudiante' WHERE id_estudiante='$idUsuario'");
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

else{
	if (isset($_POST['peso']) && !empty($_POST['peso']&&        
	isset($_POST['estatura']) && !empty($_POST['estatura'])&&
	isset($_POST['padecimiento_medico']) && !empty($_POST['padecimiento_medico'])&&
 	isset($_POST['alergias']) && !empty($_POST['alergias']) && 							    
	isset($_POST['medicamentos']) && !empty($_POST['medicamentos']) && 
	isset($_POST['grupo_sanguineo']) && !empty($_POST['grupo_sanguineo']) &&  
	isset($_POST['institucion_medica']) && !empty($_POST['institucion_medica']) &&
	isset($_POST['medico_nombre']) && !empty($_POST['medico_nombre']) &&
	isset($_POST['medico_tel']) && !empty($_POST['medico_tel']) &&							        
	isset($_POST['id_estudiante']) && !empty($_POST['id_estudiante']))) {

		$peso = trim($_POST['peso']);
		$estatura = trim($_POST['estatura']);
		$padecimiento_medico = trim($_POST['padecimiento_medico']);
		$alergias = trim($_POST['alergias']);
		$medicamentos = trim($_POST['medicamentos']);
		$grupo_sanguineo = trim($_POST['grupo_sanguineo']);
		$institucion_medica = trim($_POST['institucion_medica']);
		$medico_nombre = trim($_POST['medico_nombre']);
		$medico_tel = trim($_POST['medico_tel']);							    						
		$id_estudiante = trim($_POST['id_estudiante']);	

		$resultado = $mysqli->query("INSERT INTO ficha_medica (peso, estatura, padecimiento_medico, alergias, medicamentos, grupo_sanguineo, fecha_actualizacion, institucion_medica, medico_nombre, medico_tel, id_estudiante) VALUES ('$peso','$estatura','$padecimiento_medico','$alergias','$medicamentos','$grupo_sanguineo', NOW(),'$institucion_medica','$medico_nombre','$medico_tel','$id_estudiante')");
		if ($resultado) {
			echo "<a href='pruebaMenu.php'><h6><span>Datos insertados! CLICK AQUÍ</span></h6></a>";
			require('pruebaMenu.php');
		}
		
}
		else{			
			echo "<a href='pruebaMenu.php'><h6>No se inserto! CLICK AQUÍ</h6></a>";   		
			require('pruebaMenu.php');
		}

		include('cerrarconexion.php');
}

}



							

?>

<!--

-->