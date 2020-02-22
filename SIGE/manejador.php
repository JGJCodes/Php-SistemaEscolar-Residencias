<?php
require('conn.php');


$idUsuario = $_POST['id_estudiante'];

							if (isset($_POST['Actualizar'])) {
								
							    if (isset($_POST['nombres']) && !empty($_POST['nombres']&&        
							        isset($_POST['apellido_paterno']) && !empty($_POST['apellido_paterno'])&&
							        isset($_POST['apellido_materno']) && !empty($_POST['apellido_materno'])&&
							        isset($_POST['curp']) && !empty($_POST['curp']) && 							    
							        isset($_POST['fecha_nacimiento']) && !empty($_POST['fecha_nacimiento']) && 
							        isset($_POST['genero']) && !empty($_POST['genero']) &&  
							        isset($_POST['direccion']) && !empty($_POST['direccion']) && 
							        isset($_POST['telefono']) && !empty($_POST['telefono']) &&
							       isset($_POST['escuela_procedencia']) && !empty($_POST['escuela_procedencia']))) {

							    	$nombres = trim($_POST['nombres']);
							    	$apellido_paterno = trim($_POST['apellido_paterno']);
							    	$apellido_materno = trim($_POST['apellido_materno']);
							    	$curp = trim($_POST['curp']);
							    	$fecha_nacimiento = trim($_POST['fecha_nacimiento']);
							    	$genero = trim($_POST['genero']);
							    	$direccion = trim($_POST['direccion']);
							    	$telefono = trim($_POST['telefono']);
							    	$curp = strtoupper($curp);
								$escuela_procedencia = trim($_POST['escuela_procedencia']);							    							      			


							       $result = $mysqli->query("UPDATE estudiantes SET nombres= '$nombres', apellido_paterno='$apellido_paterno', apellido_materno='$apellido_materno', curp='$curp', direccion='$direccion', telefono='$telefono', escuela_procedencia='$escuela_procedencia', genero='$genero', fecha_nacimiento='$fecha_nacimiento' WHERE id_estudiante='$idUsuario'");
								       if ($result) {								       		
								       		echo "<a href='pruebaMenu.php'><h6><span>¡Operacion exitosa! CLICK AQUÍ</span></h6></a>";
								       		require('pruebaMenu.php');	       
								    	}								       
								}
									    else{   									    	
									    	echo "<a href='pruebaMenu.php'><h6>No se pudo Actualizar! CLICK AQUÍ</h6></a>";   		
									    	require('pruebaMenu.php');	       				

										}
							}									    					


						?>