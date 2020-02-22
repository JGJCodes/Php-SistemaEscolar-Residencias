<?php
session_start();
require('conn.php');

if (!isset($_SESSION['matricula'])) {
	hearder("Location: index.php");

	$idUsuario = $_SESSION['matricula'];
	
}

?>

<script type="text/javascript">	
		function inicio(){		
			document.getElementById("inicio").style.display ="block";	
			document.getElementById("Calif").style.display ="none"
			document.getElementById("fichamedica").style.display ="none";
			document.getElementById("informacionPersonal").style.display ="none";
			document.getElementById("Inscripcion").style.display ="none";
			document.getElementById("Horario").style.display ="none";
			document.getElementById("Calendario").style.display ="none";
			document.getElementById("Padre").style.display ="none";
			document.getElementById("Madre").style.display ="none";	
		}		
		function Calificaciones(){
			document.getElementById("Calif").style.display ="block"
			document.getElementById("inicio").style.display ="none";				
			document.getElementById("fichamedica").style.display ="none";
			document.getElementById("informacionPersonal").style.display ="none";
			document.getElementById("Inscripcion").style.display ="none";
			document.getElementById("Horario").style.display ="none";
			document.getElementById("Calendario").style.display ="none";
			document.getElementById("Padre").style.display ="none";
			document.getElementById("Madre").style.display ="none";	
		}
		function fichaMedica(){
			document.getElementById("fichamedica").style.display ="block";
			document.getElementById("Calif").style.display ="none"
			document.getElementById("inicio").style.display ="none";				
			document.getElementById("informacionPersonal").style.display ="none";
			document.getElementById("Inscripcion").style.display ="none";
			document.getElementById("Horario").style.display ="none";
			document.getElementById("Calendario").style.display ="none";
			document.getElementById("Padre").style.display ="none";
			document.getElementById("Madre").style.display ="none";	
		}
		function InfoPersonal(){
			document.getElementById("informacionPersonal").style.display ="block";
			document.getElementById("fichamedica").style.display ="none";			
			document.getElementById("Calif").style.display ="none"
			document.getElementById("inicio").style.display ="none";		
			document.getElementById("Inscripcion").style.display ="none";		
			document.getElementById("Horario").style.display ="none";
			document.getElementById("Calendario").style.display ="none";
			document.getElementById("Padre").style.display ="none";
			document.getElementById("Madre").style.display ="none";	
		}
		function Inscripcion(){
			document.getElementById("Inscripcion").style.display ="block";
			document.getElementById("informacionPersonal").style.display ="none";
			document.getElementById("fichamedica").style.display ="none";			
			document.getElementById("Calif").style.display ="none"
			document.getElementById("inicio").style.display ="none";				
			document.getElementById("Horario").style.display ="none";
			document.getElementById("Calendario").style.display ="none";
			document.getElementById("Padre").style.display ="none";
			document.getElementById("Madre").style.display ="none";	
		}
		
		function Horario(){
			document.getElementById("Horario").style.display ="block";
			document.getElementById("Inscripcion").style.display ="none";
			document.getElementById("informacionPersonal").style.display ="none";
			document.getElementById("fichamedica").style.display ="none";			
			document.getElementById("Calif").style.display ="none"
			document.getElementById("inicio").style.display ="none";				
			document.getElementById("Calendario").style.display ="none";
			document.getElementById("Padre").style.display ="none";
			document.getElementById("Madre").style.display ="none";	
		}
		
		function Calendario(){
			document.getElementById("Calendario").style.display ="block";
			document.getElementById("Horario").style.display ="none";
			document.getElementById("Inscripcion").style.display ="none";
			document.getElementById("informacionPersonal").style.display ="none";
			document.getElementById("fichamedica").style.display ="none";			
			document.getElementById("Calif").style.display ="none"
			document.getElementById("inicio").style.display ="none";
			document.getElementById("Padre").style.display ="none";
			document.getElementById("Madre").style.display ="none";			
		}
		
		function Padre(){
			document.getElementById("Padre").style.display ="block";
			document.getElementById("Horario").style.display ="none";
			document.getElementById("Inscripcion").style.display ="none";
			document.getElementById("informacionPersonal").style.display ="none";
			document.getElementById("fichamedica").style.display ="none";			
			document.getElementById("Calif").style.display ="none"
			document.getElementById("inicio").style.display ="none";				
			document.getElementById("Calendario").style.display ="none";
			document.getElementById("Madre").style.display ="none";
		}
		
		function Madre(){
			document.getElementById("Madre").style.display ="block";
			document.getElementById("Horario").style.display ="none";
			document.getElementById("Inscripcion").style.display ="none";
			document.getElementById("informacionPersonal").style.display ="none";
			document.getElementById("fichamedica").style.display ="none";			
			document.getElementById("Calif").style.display ="none"
			document.getElementById("inicio").style.display ="none";				
			document.getElementById("Calendario").style.display ="none";
			document.getElementById("Padre").style.display ="none";
		}

</script>

<!DOCTYPE html>
	<html lang="es-mx">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="content-Type" content="text/html" >
		<title>Pagina Alumnos</title>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

		<link rel="stylesheet" type="text/css" href="css/estilosA.css">	
		<link rel="stylesheet" type="text/css" href="css/pruebacss.css">
		<link rel="stylesheet" type="text/css" href="css/Formularioscss.css">
		<link href="https://file.myfontastic.com/wjwtMNXFpRMkFCC5NmJP9K/icons.css" rel="stylesheet">
		 <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>﻿
	</head>
	<body>	
		<div class="imglogo" >				
					<center>
						<?php
							include('conn.php');
							$query = "SELECT * FROM sistema where nombre='logo'";
							$resultado = $mysqli->query($query);
							while($row = $resultado->fetch_assoc()){
						?>

							<img  src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?>" >
						<?php
							}
						?>
					</center>		
			</div>
		<header>
		<input type="checkbox" id="btn-menu">
		<label for="btn-menu" class="icon-icon-menu"></label>
			<nav class="menu">
				<ul>
					<li><a href="#" onclick="inicio()">Inicio</a></li>
					<li class="submenu"><a href="#">Información personal<span class="icon-angle-down"></span> </a>
						<ul>
							<li><a href="#" onclick="InfoPersonal()">Datos personales</a></li>
							<li><a href="#" onclick="Padre()">Datos del padre</a></li>
							<li><a href="#" onclick="Madre()">Datos de la madre</a></li>
							<li><a href="#" onclick="fichaMedica()">Ficha medica</a></li>
						</ul>
					</li>
					<li class="submenu"><a href="#">Informacion escolar<span class="icon-angle-down"></span> </a>
						<ul>
							<li><a href="#" onclick="Calificaciones()">Calificaciones</a></li>
							<li><a href="#" onclick="Horario()" >Asignaturas</a></li>
						</ul>
					</li>
					<li class="submenu"><a href="#">Institución<span class="icon-angle-down"></span></a>
						<ul>
							<li><a href="#" onclick="Inscripcion()">Proceso de reinscripción</a></li>
							<li><a href="#" onclick="Calendario()">Calendario escolar</a></li>							
						</ul>
					</li>
					<li><a href="log_out.php">Cerrar sesion</a></li>
				</ul>
			</nav>
		</header>
		<main class="main">

			<div class="inicio" id="inicio">				
					<h5>Bienvenido Alumno</h5>
					<?php
						$idUsuario = $_SESSION['matricula'];
						echo "<h5>$idUsuario</h5>"
					?>
			</div>



			<div class="Calif" id="Calif">				
					<table id="table">	
						<tr>
							<th class="encabezado">Matricula del alumno</th>
							<th class="encabezado">Asignatura</th>
							<th class="encabezado">Primer parcial</th>
							<th class="encabezado">Segundo parcial</th>
							<th class="encabezado">Tercer parcial</th>
							<th class="encabezado">Calificacion final</th>							
						</tr>
						<?php						
							$idUsuario = $_SESSION['matricula'];
							$sql = "SELECT * FROM calificaciones ";
							$sql .= "inner join asignaturas on calificaciones.id_asignatura=asignaturas.id_asignatura ";
							$sql .= "WHERE id_estudiante = '$idUsuario'";
							$resultado = $mysqli->query($sql);
							while ($calificaciones = $resultado-> fetch_array(MYSQLI_BOTH)) {
								echo '<tr>
										<td>'.$calificaciones['id_estudiante'].'</td>											
										<td>'.$calificaciones['titulo'].'</td>										
										<td>'.$calificaciones['primer_parcial'].'</td>
										<td>'.$calificaciones['segundo_parcial'].'</td>
										<td>'.$calificaciones['tercer_parcial'].'</td>
										<td>'.$calificaciones['cal_final'].'</td>
									 <tr>';
							}							
						?>
					</table>							
			</div>
			<div class="Calif" id="Horario">				
					<table id="table">	
						<tr>
							<th class="encabezado">Matricula del alumno</th>
							<th class="encabezado">Grupo</th>
							<th class="encabezado">Asignatura</th>
							<th class="encabezado">Maestro</th>						
						</tr>
						<?php						
							$idUsuario = $_SESSION['matricula'];
							$slq1 = "SELECT id_grupo FROM estudiantes WHERE id_estudiante='$idUsuario'";
							$res = $mysqli->query($slq1);
							while($reg = $res-> fetch_array(MYSQLI_BOTH)){
								$grupo = $reg['id_grupo'];
							}
							$sql = "SELECT grupos.etiqueta,asignaturas.titulo,maestros.nombres,maestros.apellido_materno,maestros.apellido_paterno FROM asignatura_maestro ";
							$sql .= "inner join asignaturas on asignatura_maestro.id_asignatura=asignaturas.id_asignatura ";
							$sql .= "inner join maestros on asignatura_maestro.id_maestro=maestros.id_maestro ";
							$sql .= "inner join grupos on asignatura_maestro.id_grupo=grupos.id_grupo ";
							$sql .= "WHERE asignatura_maestro.id_grupo = '$grupo'";
							$resultado = $mysqli->query($sql);
							while ($calificaciones = $resultado-> fetch_array(MYSQLI_BOTH)) {
								echo '<tr>
										<td>'.$idUsuario.'</td>	
										<td>'.$calificaciones['etiqueta'].'</td>
										<td>'.$calificaciones['titulo'].'</td>										
										<td>'.$calificaciones['nombres'].' '.$calificaciones['apellido_paterno'].' '.$calificaciones['apellido_materno'].'</td>
									 <tr>';
							}							
						?>
					</table>							
			</div>
			
			
			

			<div class="Calif" id="Inscripcion">				
					<center>
						<?php
							include('conn.php');
							$query = "SELECT * FROM sistema where nombre='reinscripcion'";
							$resultado = $mysqli->query($query);
							while($row = $resultado->fetch_assoc()){
						?>

							<h2><?php echo $row['descripcion'] ?></h2>
							<img  src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?>" width="800px" height="1000px">
						<?php
							}
						?>
					</center>		
			</div>

			<div class="Calif" id="Calendario">				
					<center>
						<?php
							include('conn.php');
							$query = "SELECT * FROM sistema where nombre='calendario'";
							$resultado = $mysqli->query($query);
							while($row = $resultado->fetch_assoc()){
						?>

							<h2><?php echo $row['descripcion'] ?></h2>
							<img  src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?>" width="800px" height="1000px">
						<?php
							}
						?>
					</center>		
			</div>


			<div class="Calif" id="informacionPersonal">
				<div class="">
		            <h2>Informacion <span>Personal</span></h2>
		        </div>


		        <?php
							
							$idUsuario = $_SESSION['matricula'];	
							$query = $mysqli->query("SELECT * FROM estudiantes WHERE id_estudiante='$idUsuario'");
							$row = $query-> fetch_assoc();
												
						?>
			        <form action="manejador.php" class="form__reg" method="post" id="t">   
						<label><span>&nbsp Matricula:</span></label>
						<input type='text' class='input' name='id_estudiante' placeholder='Matricula' value="<?php echo $row['id_estudiante'] ?>" readonly>
						<label><span>&nbsp Nombre(s):</span></label>
						<input type='text' class='input' name='nombres' placeholder='Nombres' value="<?php echo $row['nombres'] ?>" maxlength='40'>
						<label><span>&nbsp Apellido paterno:</span></label>
						<input type='text' class='input' name='apellido_paterno' placeholder='Apellido paterno' value="<?php echo $row['apellido_paterno'] ?>">
						<label><span>&nbsp Apellido materno:</span></label>
						<input type='text' class='input' name='apellido_materno' placeholder='Apellido materno' value="<?php echo $row['apellido_materno'] ?>">
						<label><span>&nbsp CURP:</span></label>
						<input type='text' class='input' name='curp' placeholder='Curp' value="<?php echo $row['curp'] ?>" maxlength='18'>
						<label><span>&nbsp Dirección:</span></label>
						<input type='text' class='input' name='direccion' placeholder='Direccion' value="<?php echo $row['direccion'] ?>" maxlength='100'>
						<label><span>&nbsp Teléfono:</span></label>
						<input type='int' class='input' name='telefono' placeholder='Telefono' value="<?php echo $row['telefono'] ?>" maxlength='10'>
						<label><span>&nbsp Escuela de procedencia:</span></label>
						<input type='text' class='input' name='escuela_procedencia' placeholder='Escuela de procedencia' value="<?php echo $row['escuela_procedencia'] ?>">
						<label><span>&nbsp Fecha de nacimiento</span></label>
						<input type='date' class='input' name='fecha_nacimiento' placeholder='Fecha de nacimiento' value="<?php echo $row['fecha_nacimiento'] ?>">
						<label><span>&nbsp Promedio escolar</span></label>
						<input type='int' class='input' name='promedio_escolar' placeholder='Promedio escolar' value="<?php echo $row['promedio_escolar'] ?>" disabled>
						<label><span>&nbsp Genero</span></label>
						<select name="genero" class='input'>
							<option value="F" <?php if($row['genero'] == "F"){ echo "selected";}?> >Femenino</option>
							<option value="M" <?php if($row['genero'] == "M"){ echo "selected";}?> >Masculino</option>
							<option value="O" <?php if($row['genero'] == "O"){ echo "selected";}?> >Otro</option>
						</select>
						
			            <div class="btn__form">
			                <input type="submit" name="Actualizar" class="btn__submit" value="Actualizar" id="s">			                
			            </div>			            
			        </form>
			</div>


			<div class="Calif" id="Padre">
				<div class="">
		            <h2>Informacion Personal del <span>Padre</span></h2>
		        </div>


		        <?php
							
							$idUsuario = $_SESSION['matricula'];	
							$query = $mysqli->query("SELECT id_padre FROM estudiantes WHERE id_estudiante='$idUsuario'");
							$row = $query-> fetch_assoc(); $padre = $row['id_padre'];
							$q = $mysqli->query("SELECT * FROM padres WHERE id_padre='$padre'"); $row = $q-> fetch_assoc();
						?>
			        <form action="padres.php" class="form__reg" method="post" id="t">   
						<input type="hidden" name="Id" value="<?php echo $row['id_padre'];?>"/>
						<label><span>&nbsp Nombre(s):</span></label>
						<input type='text' class='input' name='nombres' placeholder='Nombres' value="<?php echo $row['nombres'] ?>" maxlength='40'>
						<label><span>&nbsp Apellido paterno:</span></label>
						<input type='text' class='input' name='paterno' placeholder='Apellido paterno' value="<?php echo $row['apellido_paterno'] ?>">
						<label><span>&nbsp Apellido materno:</span></label>
						<input type='text' class='input' name='materno' placeholder='Apellido materno' value="<?php echo $row['apellido_materno'] ?>">
						<label><span>&nbsp CURP:</span></label>
						<input type='text' class='input' name='curp' placeholder='Curp' value="<?php echo $row['curp'] ?>" maxlength='18'>
						<label><span>&nbsp RFC:</span></label>
						<input type='text' class='input' name='rfc' placeholder='RFC' value="<?php echo $row['rfc'] ?>" maxlength='18'>
						<label><span>&nbsp Dirección:</span></label>
						<input type='text' class='input' name='direccion' placeholder='Direccion' value="<?php echo $row['direccion'] ?>" maxlength='100'>
						<label><span>&nbsp Email:</span></label>
						<input type='email' class='input' name='email' placeholder='Email' value="<?php echo $row['email'] ?>" maxlength='50'>
						<label><span>&nbsp Teléfono:</span></label>
						<input type='int' class='input' name='telefono' placeholder='Telefono' value="<?php echo $row['telefono'] ?>" maxlength='10'>
						<label><span>&nbsp Grado de estudios:</span></label>
						<select name="grado" class='input'>
							<option value="primaria" <?php if($row['grado_estudios'] == "primaria"){ echo "selected";}?> >Primaria</option>
							<option value="secundaria" <?php if($row['grado_estudios'] == "secundaria"){ echo "selected";}?> >Secundaria</option>
							<option value="bachillerato" <?php if($row['grado_estudios'] == "bachillerato"){ echo "selected";}?> >Bachillerato</option>
							<option value="licenciatura" <?php if($row['grado_estudios'] == "licenciatura"){ echo "selected";}?> >Licenciatura</option>
						</select>
						<label><span>&nbsp Fecha de nacimiento</span></label>
						<input type='date' class='input' name='fecha_nacimiento' placeholder='Fecha de nacimiento' value="<?php echo $row['fecha_nacimiento'] ?>">
						<label><span>&nbsp Genero</span></label>
						<select name="genero" class='input'>
							<option value="F" <?php if($row['genero'] == "F"){ echo "selected";}?> >Femenino</option>
							<option value="M" <?php if($row['genero'] == "M"){ echo "selected";}?> >Masculino</option>
							<option value="O" <?php if($row['genero'] == "O"){ echo "selected";}?> >Otro</option>
						</select>
						<label><span>&nbsp Ocupación</span></label>
						<input type='int' class='input' name='ocupacion' placeholder='Ocupacion o trabajo' value="<?php echo $row['ocupacion'] ?>" >
						
						<label><span>&nbsp Tutor:</span></label>
						<select name="tutor" class='input'>
							<option value="0" <?php if($row['tutor'] == 0){ echo "selected";}?> >No</option>
							<option value="1" <?php if($row['tutor'] == 1){ echo "selected";}?> >Si</option>
						</select>
						
			            <div class="btn__form">
			                <input type="submit" name="Actualizar" class="btn__submit" value="Actualizar" id="s">			                
			            </div>			            
			        </form>
			</div>
			
			<div class="Calif" id="Madre">
				<div class="">
		            <h2>Información Personal de la <span>Madre</span></h2>
		        </div>


		        <?php
							
							$idUsuario = $_SESSION['matricula'];	
							$query = $mysqli->query("SELECT id_madre FROM estudiantes WHERE id_estudiante='$idUsuario'");
							$row = $query-> fetch_assoc(); $madre = $row['id_madre'];
							$q = $mysqli->query("SELECT * FROM padres WHERE id_padre='$madre'"); $row = $q-> fetch_assoc();
						?>
			        <form action="padres.php" class="form__reg" method="post" id="t">  
						<input type="hidden" name="Id" value="<?php echo $row['id_padre'];?>"/>
						<label><span>&nbsp Nombre(s):</span></label>
						<input type='text' class='input' name='nombres' placeholder='Nombres' value="<?php echo $row['nombres'] ?>" maxlength='40'>
						<label><span>&nbsp Apellido paterno:</span></label>
						<input type='text' class='input' name='paterno' placeholder='Apellido paterno' value="<?php echo $row['apellido_paterno'] ?>">
						<label><span>&nbsp Apellido materno:</span></label>
						<input type='text' class='input' name='materno' placeholder='Apellido materno' value="<?php echo $row['apellido_materno'] ?>">
						<label><span>&nbsp CURP:</span></label>
						<input type='text' class='input' name='curp' placeholder='Curp' value="<?php echo $row['curp'] ?>" maxlength='18'>
						<label><span>&nbsp RFC:</span></label>
						<input type='text' class='input' name='rfc' placeholder='RFC' value="<?php echo $row['rfc'] ?>" maxlength='18'>
						<label><span>&nbsp Dirección:</span></label>
						<input type='text' class='input' name='direccion' placeholder='Direccion' value="<?php echo $row['direccion'] ?>" maxlength='100'>
						<label><span>&nbsp Email:</span></label>
						<input type='email' class='input' name='email' placeholder='Email' value="<?php echo $row['email'] ?>" maxlength='50'>
						<label><span>&nbsp Teléfono:</span></label>
						<input type='int' class='input' name='telefono' placeholder='Telefono' value="<?php echo $row['telefono'] ?>" maxlength='10'>
						<label><span>&nbsp Grado de estudios:</span></label>
						<select name="grado" class='input'>
							<option value="primaria" <?php if($row['grado_estudios'] == "primaria"){ echo "selected";}?> >Primaria</option>
							<option value="secundaria" <?php if($row['grado_estudios'] == "secundaria"){ echo "selected";}?> >Secundaria</option>
							<option value="bachillerato" <?php if($row['grado_estudios'] == "bachillerato"){ echo "selected";}?> >Bachillerato</option>
							<option value="licenciatura" <?php if($row['grado_estudios'] == "licenciatura"){ echo "selected";}?> >Licenciatura</option>
						</select>
						<label><span>&nbsp Fecha de nacimiento</span></label>
						<input type='date' class='input' name='fecha_nacimiento' placeholder='Fecha de nacimiento' value="<?php echo $row['fecha_nacimiento'] ?>">
						<label><span>&nbsp Genero</span></label>
						<select name="genero" class='input'>
							<option value="F" <?php if($row['genero'] == "F"){ echo "selected";}?> >Femenino</option>
							<option value="M" <?php if($row['genero'] == "M"){ echo "selected";}?> >Masculino</option>
							<option value="O" <?php if($row['genero'] == "O"){ echo "selected";}?> >Otro</option>
						</select>
						<label><span>&nbsp Ocupación</span></label>
						<input type='int' class='input' name='ocupacion' placeholder='Ocupacion o trabajo' value="<?php echo $row['ocupacion'] ?>" >
						
						<label><span>&nbsp Tutor:</span></label>
						<select name="tutor" class='input'>
							<option value="0" <?php if($row['tutor'] == 0){ echo "selected";}?> >No</option>
							<option value="1" <?php if($row['tutor'] == 1){ echo "selected";}?> >Si</option>
						</select>
						
			            <div class="btn__form">
			                <input type="submit" name="Actualizar" class="btn__submit" value="Actualizar" id="s">			                
			            </div>			            
			        </form>
			</div>
			

<div class="Calif" id="fichamedica">
				<div class="">
		            <h2>Ficha <span>Medica</span></h2>
		        </div>

		        <?php							
							$idUsuario = $_SESSION['matricula'];	
							$query = $mysqli->query("SELECT id_ficha, peso, estatura, padecimiento_medico, alergias, medicamentos, grupo_sanguineo, fecha_actualizacion, institucion_medica, medico_nombre, medico_tel, id_estudiante FROM ficha_medica WHERE id_estudiante='$idUsuario'");
							$row = $query-> fetch_assoc();
												
						?>
			        <form action="manejador2.php" class="form__reg" method="post" id="t">   
						<label><span>&nbsp Matricula: </span></label>
						<input type='text' class='input' name='id_estudiante' placeholder='Id estudiante' value="<?php echo $idUsuario ?>" readonly maxlength='11'>										
						<label><span>&nbsp Numero de ficha medica:</span></label>
						<input type='text' class='input' name='id_ficha' placeholder='Id ficha' value="<?php echo $row['id_ficha'] ?>" readonly>
						<label><span>&nbsp Fecha de actualizacion:</span></label>
						<input type='datetime' class='input' name='fecha_actualizacion' placeholder='Fecha actualizacion' value="<?php echo $row['fecha_actualizacion'] ?>" readonly>
						<label><span>&nbsp Peso:</span></label>
						<input type='int' class='input' name='peso' placeholder='Peso' value="<?php echo $row['peso'] ?>" maxlength='40'>
						<label><span>&nbsp Estatura:</span></label>
						<input type='int' class='input' name='estatura' placeholder='Estatura' value="<?php echo $row['estatura'] ?>">
						<label><span>&nbsp Padecimientos medicos:</span></label>
						<input type='text' class='input' name='padecimiento_medico' placeholder='Padecimiento medico' value="<?php echo $row['padecimiento_medico'] ?>">
						<label><span>&nbsp Alergias:</span></label>
						<input type='text' class='input' name='alergias' placeholder='Alergias' value="<?php echo $row['alergias'] ?>" maxlength='18'>
						<label><span>&nbsp Medicamentos:</span></label>
						<input type='text' class='input' name='medicamentos' placeholder='Medicamentos' value="<?php echo $row['medicamentos'] ?>" maxlength='100'>
						<label>Grupo sanguineo:</label>
						<select class="input" name="grupo_sanguineo" >
							<option value="O-" <?php if($row['grupo_sanguineo'] == "O-"){ echo "selected";}?> >O-</option>
							<option value="O+" <?php if($row['grupo_sanguineo'] == "O+"){ echo "selected";}?> >O+</option>
							<option value="A-" <?php if($row['grupo_sanguineo'] == "A-"){ echo "selected";}?> >A-</option>
							<option value="A+" <?php if($row['grupo_sanguineo'] == "A+"){ echo "selected";}?> >A+</option>
							<option value="B-" <?php if($row['grupo_sanguineo'] == "B-"){ echo "selected";}?> >B-</option>
							<option value="B+" <?php if($row['grupo_sanguineo'] == "B+"){ echo "selected";}?> >B+</option>
							<option value="AB-" <?php if($row['grupo_sanguineo'] == "AB-"){ echo "selected";}?> >AB-</option>
							<option value="AB+" <?php if($row['grupo_sanguineo'] == "AB+"){ echo "selected";}?> >AB+</option>
						</select>
						<label>Institución medica:</label>
						<select class="input" name="institucion_medica" >
							<option value="IMSS" <?php if($row['institucion_medica'] == "IMSS"){ echo "selected";}?> >IMSS</option>
							<option value="ISSSTE" <?php if($row['institucion_medica'] == "ISSSTE"){ echo "selected";}?> >ISSSTE</option>
							<option value="POPULAR" <?php if($row['institucion_medica'] == "POPULAR"){ echo "selected";}?> >Popular</option>
							<option value="PEMEX" <?php if($row['institucion_medica'] == "PEMEX"){ echo "selected";}?> >PEMEX</option>
							<option value="SEDENA" <?php if($row['institucion_medica'] == "SEDENA"){ echo "selected";}?> >SEDENA</option>
							<option value="OTRO" <?php if($row['institucion_medica'] == "OTRO"){ echo "selected";}?> >Otro</option>
						</select>
						<label><span>&nbsp Nombre del medico de cabecera:</span></label>
						<input type='text' class='input' name='medico_nombre' placeholder='Medico nombre' value="<?php echo $row['medico_nombre'] ?>" >										
						<label><span>&nbsp Teléfono del medico:</span></label>
						<input type='int' class='input' name='medico_tel' placeholder='Medico tel' value="<?php echo $row['medico_tel'] ?>" >
						
							                              			           			              	           			               			                       			              
			            <div class="btn__form">
			                <input type="submit" name="Insertar" class="btn__submit" value="Actualizar" id="s">			                
			            </div>			            
			        </form>
			</div>

		</main>
		<script type="text/javascript" src="js/menu.js"></script>
	</body>

<div id="wrapper">
	<footer class="footer">
		<div class="social">
			<a href="#" class="icon-facebook"></a>
			<a href="#" class="icon-twitter"></a>
			<a href="#" class="icon-gplus"></a>
			<a href="#" class="icon-vine"></a>
		</div>
		<p class="copy">&copy; Tec de madero 2017 - Todos los derechos reservados</p>
	</footer>
</div>
</html>


<!--
<div class="Calif" id="oieci">
				<table id="table">
					<tr>
						<th>Matricula alumno</th>
						<th>Asignatura</th>
						<th>Docente</th>
						<th>Hora</th>
					</tr>
						<?php
							$idUsuario = $_SESSION['matricula'];
							$sql = "SELECT matricula, asignatura, docente, hora FROM horario WHERE matricula='$idUsuario'";
							$resultado = $mysqli->query($sql);
							while ($calificaciones = $resultado-> fetch_array(MYSQLI_BOTH)) {
								echo '<tr>
										<td>'.$calificaciones['matricula'].'</td>
										<td>'.$calificaciones['asignatura'].'</td>
										<td>'.$calificaciones['docente'].'</td>
										<td>'.$calificaciones['hora'].'</td>
									 <tr>';
							}
						?>
					</table>
			</div>
			-->
							