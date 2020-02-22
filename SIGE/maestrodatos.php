<?php
require('conn.php');


$idUsuario = $_POST['id_maestro'];

							if (isset($_POST['Actualizar'])) {
								
							    if (isset($_POST['nombres']) && !empty($_POST['nombres']&&        
							        isset($_POST['apellido_paterno']) && !empty($_POST['apellido_paterno'])&&
							        isset($_POST['apellido_materno']) && !empty($_POST['apellido_materno'])&&
							        isset($_POST['curp']) && !empty($_POST['curp']) && 							    
							        isset($_POST['fecha_nacimiento']) && !empty($_POST['fecha_nacimiento']) && 
							        isset($_POST['genero']) && !empty($_POST['genero']) &&  
							        isset($_POST['direccion']) && !empty($_POST['direccion']) && 
							        isset($_POST['telefono']) && !empty($_POST['telefono']) &&
							        isset($_POST['rfc']) && !empty($_POST['rfc']) &&
									isset($_POST['imss']) && !empty($_POST['imss']) &&
									isset($_POST['sat']) && !empty($_POST['sat']) &&
							        isset($_POST['titulo']) && !empty($_POST['titulo']) &&
									isset($_POST['escuela']) && !empty($_POST['escuela']))) {

							    	$nombres = trim($_POST['nombres']);
							    	$apellido_paterno = trim($_POST['apellido_paterno']);
							    	$apellido_materno = trim($_POST['apellido_materno']);
							    	$curp = trim($_POST['curp']);
							    	$fecha_nacimiento = trim($_POST['fecha_nacimiento']);
							    	$genero = trim($_POST['genero']);
							    	$direccion = trim($_POST['direccion']);
							    	$telefono = trim($_POST['telefono']);
							    	
									$imss = trim($_POST['imss']);
							    	$sat = trim($_POST['sat']);
									$rfc = trim($_POST['rfc']);
									$titulo = trim($_POST['titulo']);
									$escuela = trim($_POST['escuela']);							    							      			


							       $result = $mysqli->query("UPDATE maestros SET titulo='$titulo', imss='$imss', sat='$sat', rfc='$rfc', nombres= '$nombres', apellido_paterno='$apellido_paterno', apellido_materno='$apellido_materno', curp='$curp', direccion='$direccion', telefono='$telefono', escuela_titulo='$escuela', genero='$genero', fecha_nacimiento='$fecha_nacimiento' WHERE id_maestro='$idUsuario'");
								       if ($result) {								       		
								       		echo "<a href='paginaMaestros.php'><h6><span>¡Operacion exitosa! CLICK AQUÍ</span></h6></a>";
								       		require('paginaMaestros.php');	       
								    	}								       
								}
									    else{   									    	
									    	echo "<a href='paginaMaestros.php'><h6>No se pudo Actualizar! CLICK AQUÍ</h6></a>";   		
									    	require('paginaMaestros.php');	       				

										}
							}									    					


						?>