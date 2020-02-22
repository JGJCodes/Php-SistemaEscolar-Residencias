<?php

////////////////// CONEXION A LA BASE DE DATOS ////////////////////////////////////
/*
$host="localhost";
$usuario="root";
$contraseña="";
$base="residencias1";

$conexion= new mysqli($host, $usuario, $contraseña, $base);
if ($conexion -> connect_errno)
{
	die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion-> mysqli_connect_error());
}
*/
require('conn.php');
/////////////////////// CONSULTA A LA BASE DE DATOS ////////////////////////
if (isset($_POST['Buscar2'])) {
	$id_docente = $_POST['id_docente'];
	$grupo = $_POST['Grupo'];
	$id_asignatura = $_POST['Asignatura'];
}

$alumnos="SELECT * FROM estudiantes WHERE id_grupo='$grupo'";
$resAlumnos=$mysqli->query($alumnos);
?>

<html lang="es">

	<head>
		<title>Actualizar Registros PHP</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
 		<link rel="stylesheet" type="text/css" href="css/Formularioscss.css">
		

		
		<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">  -->

	</head>

	<body>
		
<div class="container3">
		<div class="form__top1">
			<form method="post" action="PaginaMaestros.php" class="form__reg">			
			<table class="table">

				<tr>
					<th>Id estudiante</th>	
					<th>Nombres</th>																
					<th>Apellido paterno</th>	
					<th>Apellido materno</th>	
					<th>Id Asignatura</th>		
					<th>Grupo</th>					
					<th>Seleccione</th>					

					

				</tr>

				
<?php

				while ($registroAlumnos = $resAlumnos->fetch_array(MYSQLI_BOTH))

				{

					echo'<tr>	
						<td hidden><input name="idalu1[]" value="'.$registroAlumnos['id_estudiante'].'" /></td>				
						 <td><input class="input" name="idalu2['.$registroAlumnos['id_estudiante'].']" value="'.$registroAlumnos['id_estudiante'].'" readonly/></td>
						 <td><input class="input" name="nom['.$registroAlumnos['id_estudiante'].']" value="'.$registroAlumnos['nombres'].'" readonly/></td>						 					
						 <td><input class="input" name="apeP['.$registroAlumnos['id_estudiante'].']" value="'.$registroAlumnos['apellido_paterno'].'" readonly/></td>
						 <td><input class="input" name="apeM['.$registroAlumnos['id_estudiante'].']" value="'.$registroAlumnos['apellido_materno'].'" readonly/></td>
						
						 <td><input class="input" name="asig['.$registroAlumnos['id_estudiante'].']" value="'.$id_asignatura.'" readonly/></td>

						 <td><input class="input" name="gru['.$registroAlumnos['id_estudiante'].']" value="'.$grupo.'" readonly/></td>
						 
						  <td><select class="input" name="sel['.$registroAlumnos['id_estudiante'].']"
						 		<option></option>
								<option>presente</option>
								<option>falta</option>
								<option>retardo</option>
						 <select/></td>




						 </tr>';
				}

?>

			</table>
			<input type="submit" name="Lista" value="Aceptar" class="btn__submit2" />
		</form>
		</div>

		</div>

		
	</body>

		<footer>
		</footer>
</html>
<!--

-->