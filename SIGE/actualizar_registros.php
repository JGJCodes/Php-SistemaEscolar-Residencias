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
if (isset($_POST['Buscar'])) {
	$id_docente = $_POST['id_docente'];
	$grupo = $_POST['Grupo'];
	$asignatura = $_POST['Asignatura'];
}

$alumnos="SELECT * FROM calificaciones INNER JOIN asignaturas ON calificaciones.id_asignatura=asignaturas.id_asignatura WHERE calificaciones.id_grupo='$grupo' AND calificaciones.id_asignatura='$asignatura'";
$resAlumnos=$mysqli->query($alumnos);
?>

<html lang="es">

	<head>
		<title>Actualizar Registros PHP</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
 		<link rel="stylesheet" type="text/css" href="css/Formularioscss.css">
		<!--<link href="css/estilos.css" rel="stylesheet">-->

		
		<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">  -->

	</head>

	<body>
		
<div class="container2">
		<div class="form__top1">
			<form method="post" action="PaginaMaestros.php" class="form__reg">			
			<table class="table">

				<tr>
					<th>Id estudiante</th>										
					<th>Asignatura</th>					
					<th>Primer parcial </th>	
					<th>Segundo parcial </th>	
					<th>Tercer parcial </th>	
					<th>Calificacion final</th>
				</tr>

				<?php

				while ($registroAlumnos = $resAlumnos->fetch_array(MYSQLI_BOTH))

				{

					echo'<tr>	
						<td hidden><input name="idalu[]" value="'.$registroAlumnos['id_calificacion'].'" /></td>				
						 <td><input class="input" name="idalu2['.$registroAlumnos['id_calificacion'].']" value="'.$registroAlumnos['id_estudiante'].'" readonly/></td>
						 <td><input class="input" name="nom['.$registroAlumnos['id_calificacion'].']" value="'.$registroAlumnos['titulo'].'" readonly/></td>						 						 
						 <td><input class="input" name="pa1['.$registroAlumnos['id_calificacion'].']" value="'.$registroAlumnos['primer_parcial'].'"/></td>
						 <td><input class="input" name="pa2['.$registroAlumnos['id_calificacion'].']" value="'.$registroAlumnos['segundo_parcial'].'"/></td>
						 <td><input class="input" name="pa3['.$registroAlumnos['id_calificacion'].']" value="'.$registroAlumnos['tercer_parcial'].'"/></td>
						 <td><input class="input" name="gru['.$registroAlumnos['id_calificacion'].']" value="'.$registroAlumnos['cal_final'].'" readonly/></td>
						 </tr>';
				}


				?>

			</table>
			<input type="submit" name="actualizar" value="Actualizar Registros" class="btn__submit2" />
			
		</form>
		</div>

		</div>

		
	</body>

		<footer>
		</footer>
</html>


