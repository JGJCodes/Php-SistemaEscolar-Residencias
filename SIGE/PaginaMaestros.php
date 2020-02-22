<?php
session_start();
require('conn.php');

if (!isset($_SESSION['Usuario'])) {
	hearder("Location: index.php");

	$idUsuario = $_SESSION['Usuario'];
}

?>
<script type="text/javascript">	
		function inicio(){		
			document.getElementById("Calendario").style.display ="none";
			document.getElementById("inicio").style.display ="block";	
			document.getElementById("informacionPersonal").style.display ="none";
			document.getElementById("subirCalif").style.display ="none"	;
			document.getElementById("listas").style.display ="none";
			document.getElementById("Alumnos").style.display ="none";
			document.getElementById("Asignaturas").style.display ="none";
		}		
		
		function Calificaciones(){
			document.getElementById("subirCalif").style.display ="block";
			document.getElementById("informacionPersonal").style.display ="none";
			document.getElementById("inicio").style.display ="none";
			document.getElementById("Calendario").style.display ="none";			
			document.getElementById("listas").style.display ="none"	;
			document.getElementById("Alumnos").style.display ="none";
		}		
		
		function listas(){
			document.getElementById("listas").style.display ="block";
			document.getElementById("subirCalif").style.display ="none";
			document.getElementById("Calendario").style.display ="none";
			document.getElementById("informacionPersonal").style.display ="none";
			document.getElementById("inicio").style.display ="none";
			document.getElementById("Alumnos").style.display ="none";
			document.getElementById("Asignaturas").style.display ="none";
		}
		
		function personal(){
			document.getElementById("informacionPersonal").style.display ="block";
			document.getElementById("listas").style.display ="none";
			document.getElementById("subirCalif").style.display ="none";
			document.getElementById("Calendario").style.display ="none";
			document.getElementById("inicio").style.display ="none";
			document.getElementById("Alumnos").style.display ="none";
			document.getElementById("Asignaturas").style.display ="none";
		}
		
		function calendario(){
			document.getElementById("Calendario").style.display ="block";
			document.getElementById("informacionPersonal").style.display ="none";
			document.getElementById("listas").style.display ="none";
			document.getElementById("subirCalif").style.display ="none";
			document.getElementById("inicio").style.display ="none";
			document.getElementById("Alumnos").style.display ="none";
			document.getElementById("Asignaturas").style.display ="none";
		}
		
		function alumnos(){
			document.getElementById("Alumnos").style.display ="block";
			document.getElementById("Calendario").style.display ="none";
			document.getElementById("informacionPersonal").style.display ="none";
			document.getElementById("listas").style.display ="none";
			document.getElementById("subirCalif").style.display ="none";
			document.getElementById("inicio").style.display ="none";
			document.getElementById("Asignaturas").style.display ="none";
		}
		
		function asignaturas(){
			document.getElementById("Asignaturas").style.display ="block";
			document.getElementById("Alumnos").style.display ="none";
			document.getElementById("Calendario").style.display ="none";
			document.getElementById("informacionPersonal").style.display ="none";
			document.getElementById("listas").style.display ="none";
			document.getElementById("subirCalif").style.display ="none";
			document.getElementById("inicio").style.display ="none";							
		}

</script>



<!DOCTYPE html>
	<html lang="es-mx">
	<head>
		<meta charset="UTF-8">
		<title>Pagina Maestros</title>
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
					<li class="submenu"><a href="#">Informacion de grupos<span class="icon-angle-down"></span> </a>
						<ul>
							<li><a href="#" onclick="listas()">Asistencias</a></li>
							<li><a href="#" onclick="alumnos()">Listas de alumnos</a></li>
							<li><a href="#" onclick="Calificaciones()">Subir calificaciones</a></li>
						</ul>
					</li>
					<li class="submenu"><a href="#">Datos personales<span class="icon-angle-down"></span></a>
						<ul>							
							<li><a href="#" onclick="personal()">Actualizar datos</a></li>
							
						</ul>
					</li>
					<li><a class="submenu" href="#" onclick="asignaturas()" >Asignaturas</a></li>
					<li><a class="submenu" href="#" onclick="calendario()" >Calendario escolar</a></li>
					<li><a href="log_out.php">Cerrar sesion</a></li>
				</ul>
			</nav>
		</header>
		<main class="main">

			<div class="inicio" id="inicio">				
					<h5>Bienvenido Docente</h5>
					<?php
						$idUsuario = $_SESSION['Usuario'];
						echo "<h5>$idUsuario</h5>"
					?>
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
							
							$idUsuario = $_SESSION['Usuario'];	
							$query = $mysqli->query("SELECT * FROM maestros WHERE id_maestro='$idUsuario'");
							$row = $query-> fetch_assoc();
												
						?>
			        <form action="maestrodatos.php" class="form__reg" method="post" id="t">   
						<label><span>&nbsp Matricula:</span></label>
						<input type='text' class='input' name='id_maestro' placeholder='Matricula' value="<?php echo $row['id_maestro'] ?>" readonly>
						<label><span>&nbsp Nombre(s):</span></label>
						<input type='text' class='input' name='nombres' placeholder='Nombres' value="<?php echo $row['nombres'] ?>" maxlength='40'>
						<label><span>&nbsp Apellido paterno:</span></label>
						<input type='text' class='input' name='apellido_paterno' placeholder='Apellido paterno' value="<?php echo $row['apellido_paterno'] ?>">
						<label><span>&nbsp Apellido materno:</span></label>
						<input type='text' class='input' name='apellido_materno' placeholder='Apellido materno' value="<?php echo $row['apellido_materno'] ?>">
						<label><span>&nbsp CURP:</span></label>
						<input type='text' class='input' name='curp' placeholder='Curp' value="<?php echo $row['curp'] ?>" maxlength='18'>
						<label><span>&nbsp RFC:</span></label>
						<input type='text' class='input' name='rfc' placeholder='Rfc' value="<?php echo $row['rfc'] ?>" maxlength='13'>
						<label><span>&nbsp Dirección:</span></label>
						<input type='text' class='input' name='direccion' placeholder='Direccion' value="<?php echo $row['direccion'] ?>" maxlength='100'>
						<label><span>&nbsp Teléfono:</span></label>
						<input type='int' class='input' name='telefono' placeholder='Telefono' value="<?php echo $row['telefono'] ?>" maxlength='10'>
						<label><span>&nbsp Numero de seguro social:</span></label>
						<input type='text' class='input' name='imss' placeholder='Numero del IMSS' value="<?php echo $row['imss'] ?>">
						<label><span>&nbsp Fecha de nacimiento</span></label>
						<input type='date' class='input' name='fecha_nacimiento' placeholder='Fecha de nacimiento' value="<?php echo $row['fecha_nacimiento'] ?>">
						<label><span>&nbsp Genero</span></label>
						<select name="genero" class='input'>
							<option value="F" <?php if($row['genero'] == "F"){ echo "selected";}?> >Femenino</option>
							<option value="M" <?php if($row['genero'] == "M"){ echo "selected";}?> >Masculino</option>
							<option value="O" <?php if($row['genero'] == "O"){ echo "selected";}?> >Otro</option>
						</select>
						<label><span>&nbsp Titulo escolar:</span></label>
						<input type='text' class='input' name='titulo' placeholder='Titulo de estudios' value="<?php echo $row['titulo'] ?>" readonly>
						<label><span>&nbsp Escuela de egreso:</span></label>
						<input type='text' class='input' name='escuela' placeholder='Escuela de egreso' value="<?php echo $row['escuela_titulo'] ?>" readonly>
						<label><span>&nbsp SAT:</span></label>
						<input type='text' class='input' name='sat' placeholder='Numero del SAT' value="<?php echo $row['sat'] ?>" >
									                              			           			              	           			               			                       			              
			            <div class="btn__form">
			                <input type="submit" name="Actualizar" class="btn__submit" value="Actualizar" id="s">			                
			            </div>			            
			        </form>
			</div>

			<div class="calif" id="Alumnos">
                <h2>Listas de <span> Alumnos</span></h2>
            
            <table id="table">	
						<tr>
							<th class="encabezado">Matricula del maestro</th>
							<th class="encabezado">Grupo</th>
							<th class="encabezado">Asignatura</th>
							<th class="encabezado">Listas de alumnos</th>						
						</tr>
						<?php						
							$idUsuario = $_SESSION['Usuario'];
							
							$sql = "SELECT grupos.id_grupo,grupos.etiqueta,asignaturas.titulo,maestros.nombres,maestros.apellido_materno,maestros.apellido_paterno FROM asignatura_maestro ";
							$sql .= "inner join asignaturas on asignatura_maestro.id_asignatura=asignaturas.id_asignatura ";
							$sql .= "inner join maestros on asignatura_maestro.id_maestro=maestros.id_maestro ";
							$sql .= "inner join grupos on asignatura_maestro.id_grupo=grupos.id_grupo ";
							$sql .= "WHERE asignatura_maestro.id_maestro = '$idUsuario'";
							$resultado = $mysqli->query($sql);
							while ($calificaciones = $resultado-> fetch_array(MYSQLI_BOTH)) {
								echo '<tr>
										<td>'.$idUsuario.'</td>	
										<td>'.$calificaciones['etiqueta'].'</td>
										<td>'.$calificaciones['titulo'].'</td>										
										<td><a href="admin/php/reportes/lista-alumnos-grupo.php?id='.$calificaciones["id_grupo"].'">Descargar</a> </td>
									 <tr>'; 
							}							
						?>
					</table>
		</div>
			
		
		<div class="calif" id="Asignaturas">
                <h2>Lista de las <span> Asignaturas</span></h2>
            
            <table id="table">	
						<tr>
							<th class="encabezado">Clave</th>
							<th class="encabezado">Nombre</th>
							<th class="encabezado">Programa de estudios</th>						
						</tr>
						<?php						
							$idUsuario = $_SESSION['Usuario'];
							
							$sql = "SELECT * FROM asignatura_maestro ";
							$sql .= "inner join asignaturas on asignatura_maestro.id_asignatura=asignaturas.id_asignatura ";
							$sql .= "WHERE asignatura_maestro.id_maestro = '$idUsuario'";
							$resultado = $mysqli->query($sql);
							while ($calificaciones = $resultado-> fetch_array(MYSQLI_BOTH)) {
								echo '<tr>
										<td>'.$idUsuario.'</td>	
										<td>'.$calificaciones['titulo'].'</td>									
										<td><a href="admin/php/reportes/programa-asig.php?id='.$calificaciones["id_asignatura"].'">Descargar</a> </td>
									 <tr>'; 
							}							
						?>
					</table>
		</div>
		
		
			<div class="form__reg2" id="subirCalif">
                <h2>Seleccionar<span> Grupo</span></h2>
            
            <form action="actualizar_registros.php" class="form__reg" method="post" id="t">   
            		<?php
						$idUsuario = $_SESSION['Usuario'];						
					?>  
            <input type="text" name="id_docente" value="<?php echo $idUsuario ?>" class="input" readonly>              
            		<label>Grupo</label>
                    <select name="Grupo" class="input">
                        <?php           
                        require('conn.php');
							$idUsuario = $_SESSION['Usuario'];                                     
                            $sql = "SELECT * FROM asignatura_maestro ";
							$sql .= "inner join grupos on asignatura_maestro.id_grupo=grupos.id_grupo ";
							$sql .= "WHERE asignatura_maestro.id_maestro='$idUsuario'";
                            $resultado = $mysqli->query($sql);
                            while ($alumnos = $resultado-> fetch_array(MYSQLI_BOTH)) {
                                echo '<option value="'.$alumnos['id_grupo'].'">'.$alumnos['etiqueta'].'</option>';
                            }                           
                        ?>
                    </select>
                    <label>Asignatura</label>
                    <select name="Asignatura" class="input">
                        <?php           
                        require('conn.php');
							$idUsuario = $_SESSION['Usuario'];                                     
                            $sql = "SELECT * FROM asignatura_maestro ";
							$sql .= "inner join asignaturas on asignatura_maestro.id_asignatura=asignaturas.id_asignatura ";
                            $sql .= "WHERE id_maestro='$idUsuario'";
							$resultado = $mysqli->query($sql);
                            while ($alumnos = $resultado-> fetch_array(MYSQLI_BOTH)) {
                                echo '<option value="'.$alumnos['id_asignatura'].'">'.$alumnos['titulo'].'</option>';
                            }                           
                        ?>
                    </select>
                         

            <div class="btn__form">
                <input type="submit" name="Buscar" class="btn__submit" value="Buscar" id="s">                
            </div>
            
        </form>
</div>
			<?php

			if(isset($_POST['actualizar']))
			{
				foreach ($_POST['idalu'] as $ids) 
				{
					$editID=mysqli_real_escape_string($mysqli, $_POST['idalu2'][$ids]);
					$editNom=mysqli_real_escape_string($mysqli, $_POST['nom'][$ids]);					
					$editPa1=mysqli_real_escape_string($mysqli, $_POST['pa1'][$ids]);
					$editPa2=mysqli_real_escape_string($mysqli, $_POST['pa2'][$ids]);
					$editPa3=mysqli_real_escape_string($mysqli, $_POST['pa3'][$ids]);
					$editGru=mysqli_real_escape_string($mysqli, $_POST['gru'][$ids]);

					$promedio= ($editPa1 + $editPa2 + $editPa3)/3;

					$actualizar=$mysqli->query("UPDATE calificaciones SET primer_parcial='$editPa1', segundo_parcial='$editPa2',tercer_parcial='$editPa3', cal_final='$promedio' WHERE id_calificacion='$ids'");
				}

				if($actualizar==true)
				{
					echo "<a href='PaginaMaestros.php'><h6><span>¡Operacion exitosa! CLICK AQUÍ</span></h6></a>";
				}

				else
				{
					echo "<h6>No se pudo completar la operacion!</h6>";
				}
			}
			elseif (isset($_POST['volver'])) {
				echo "<a href='PaginaMaestros.php'><h6><span>CLICK AQUÍ</span></h6></a>";
			}

			?>

<div class="form__reg2" id="listas">
                <h2>Seleccionar<span> Grupo</span></h2>
            
            <form action="listas.php" class="form__reg" method="post" id="">   
            		<?php
						$idUsuario = $_SESSION['Usuario'];						
					?>  
            <input type="text" name="id_docente" value="<?php echo $idUsuario ?>" class="input" readonly>          
            		<label>Grupo</label>
                    <select name="Grupo" class="input">
                        <?php           
                        require('conn.php');
							$idUsuario = $_SESSION['Usuario'];                                     
                            $sql = "SELECT * FROM asignatura_maestro ";
							$sql .= "inner join grupos on asignatura_maestro.id_grupo=grupos.id_grupo ";
							$sql .= "WHERE asignatura_maestro.id_maestro='$idUsuario'";
                            $resultado = $mysqli->query($sql);
                            while ($alumnos = $resultado-> fetch_array(MYSQLI_BOTH)) {
                                echo '<option value="'.$alumnos['id_grupo'].'">'.$alumnos['etiqueta'].'</option>';
                            }                          
                        ?>
                    </select>

                    <label>Asignatura</label>
                    <select name="Asignatura" class="input">
                        <?php           
                        require('conn.php');
							$idUsuario = $_SESSION['Usuario'];                                     
                            $sql = "SELECT * FROM asignatura_maestro ";
							$sql .= "inner join asignaturas on asignatura_maestro.id_asignatura=asignaturas.id_asignatura ";
                            $sql .= "WHERE id_maestro='$idUsuario'";
							$resultado = $mysqli->query($sql);
                            while ($alumnos = $resultado-> fetch_array(MYSQLI_BOTH)) {
                                echo '<option value="'.$alumnos['id_asignatura'].'">'.$alumnos['titulo'].'</option>';
                            }                            
                        ?>
                    </select>

                  
                                                                                                         
            <div class="btn__form">
                <input type="submit" name="Buscar2" class="btn__submit" value="Buscar" id="s">                
            </div>
            
        </form>
</div>

<?php

			if(isset($_POST['Lista']))
			{
				foreach ($_POST['idalu1'] as $ids) 
				{
					$editID=mysqli_real_escape_string($mysqli, $_POST['idalu2'][$ids]);												
					$nom=mysqli_real_escape_string($mysqli, $_POST['nom'][$ids]);
					$apeP=mysqli_real_escape_string($mysqli, $_POST['apeP'][$ids]);
					$apeM=mysqli_real_escape_string($mysqli, $_POST['apeM'][$ids]);
					$asig=mysqli_real_escape_string($mysqli, $_POST['asig'][$ids]);								
					$gru=mysqli_real_escape_string($mysqli, $_POST['gru'][$ids]);	
					$sele=mysqli_real_escape_string($mysqli, $_POST['sel'][$ids]);											
					$fecha = date("Y-m-d");		
					


					$actualizar=$mysqli->query("INSERT INTO asistencias(fecha,asist,id_grupo,id_asignatura,id_estudiante) VALUES('$fecha','$sele','$gru','$asig','$editID')");
				}

				if($actualizar==true)
				{
					echo "<a href='PaginaMaestros.php'><h6><span>¡Operacion exitosa! CLICK AQUÍ</span></h6></a>";
				}

				else
				{
					echo "<h6>No se pudo completar la operacion!</h6>";
				}
			}
			elseif (isset($_POST['volver'])) {
				echo "<a href='PaginaMaestros.php'><h6><span>CLICK AQUÍ</span></h6></a>";
			}

			?>



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