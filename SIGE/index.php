<?php
	require('conn.php');
	session_start();
	if (isset($_SESSION['matricula'])) {
		header("location: pruebaMenu.php");
	}
	elseif (isset($_SESSION['Usuario'])) {
		header("location: PaginaMaestros.php");
	}

	if(isset($_POST['Ingresar'])){
		$matricula = mysqli_real_escape_string($mysqli,$_POST['matricula']);
		$pass = mysqli_real_escape_string($mysqli,$_POST['pass']);
		$error = '';
		$sql = "SELECT * FROM usuarios WHERE id_usuario = '$matricula' OR email='$matricula'";
		$resultado = $mysqli->query($sql);
		$rows = $resultado->num_rows;

		if ($rows >0) {
			$row = $resultado->fetch_assoc();
			if ($row['tipo']=="estudiante") {
				if ($row['estatus']==1) {
					$pass3 = $row['pass'];
					if(password_verify($pass, $pass3)){
						$_SESSION['matricula']=$row['id_usuario'];
						header("location: pruebaMenu.php");
					}else{
						$error = "La contraseña es incorrecta";
					}
				}else{
						$error = "Su cuenta se encuentra desactivada por el momento";
					}
			}
			else{
				$error = "Su cuenta es de tipo Maestro no de Estudiante";
			}
		}
		else{
			$error = "La matricula o password son incorrectos";
		}

	}

	if(isset($_POST['Go'])){
		$usuario = mysqli_real_escape_string($mysqli,$_POST['usuario']);
		$pass2 = mysqli_real_escape_string($mysqli,$_POST['passw']);
		$error2 = '';
		$sql2 = "SELECT * FROM usuarios WHERE id_usuario = '$usuario' OR email='$usuario'";
		$resultado2 = $mysqli->query($sql2);
		$rows2 = $resultado2->num_rows;

		if ($rows2 >0) {
			$row2 = $resultado2->fetch_assoc();
			if ($row2['tipo']=="maestro") {
				if ($row2['estatus']==1) {
					$pass3 = $row2['pass'];
					if(password_verify($pass2, $pass3)){
						$_SESSION['Usuario']=$row2['id_usuario'];
						header("location: PaginaMaestros.php");
					}else{
						$error = "La contraseña es incorrecta";
					}
				}else{
						$error = "Su cuenta se encuentra desactivada por el momento";
					}
			}
			else{
				$error = "Su cuenta es de tipo Estudiante no de Maestro";
			}
			
		}
		else{
			$error2 = "El usuario o password son incorrectos";
		}

	}
?>


<!DOCTYPE html>
<html lang="es-mx">
<head>
	<meta charset="UTF-8">
	<title>Pagina Inicial</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">	
	
	<link href="https://file.myfontastic.com/wjwtMNXFpRMkFCC5NmJP9K/icons.css" rel="stylesheet">
	
		<script type="text/javascript">
		function Mostrar() {
		  document.getElementById("caja").style.display ="none";
		 }
		 function Ocultar() {
		  document.getElementById("caja2").style.display ="none";
		  document.getElementById("caja").style.display ="block";
		 }

		 function Mostrar_Ocultar(){
		  var caja = document.getElementById("caja");
		  if (caja.style.display == "block") {
		   Mostrar();
		   
		  }
		  else{
		   Ocultar();		   
		  }
		}	
	</script>

	<script type="text/javascript">
		function Mostrar2() {
		  document.getElementById("caja2").style.display ="none";
		 }
		 function Ocultar2() {
		  document.getElementById("caja").style.display ="none";
		  document.getElementById("caja2").style.display ="block";
		 }

		 function Mostrar_Ocultar2(){
		  var caja2 = document.getElementById("caja2");
		  if (caja2.style.display == "block") {
		   Mostrar2();
		   
		  }
		  else{
		   Ocultar2();		   
		  }
		}
	</script>

</head>
<body>
	<header class="header">
		<div class="contenedor">
			<h1 class="logo"></h1>			
			
		</div>
	</header>
	<div class="banner">
		<div class="banner__img" >				
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
		<div class="contenedor">	
		
	</div>
	</div>
	<main class="main">
		<div class="contenedor">
			<section class="info">
				<article class="info__columna">		
					<a href="#" class="info__titulo" onclick="Mostrar_Ocultar2()" >MAESTROS</a>											
				</article>
				<article class="info__columna">		
					<a href="#" class="info__titulo" onclick="Mostrar_Ocultar()" >ALUMNOS</a>													
				</article>
				<article class="info__columna">				
					<a href="registroAspirantes.php" class="info__titulo">ASPIRANTES</a>										
				</article>
				<article class="info__columna">		
					<a href="Inscripciones.php" class="info__titulo" >INSCRIPCIONES</a>											
				</article>
			</section>
			
			<div id="caja">
			
				<form class="form__reg" method="post" action="index.php">					
					<input class="inp" type="text" name="matricula" placeholder="Matricula o email">
					<input class="inp" type="password" name="pass" placeholder="Contraseña">
					<input type="submit" name="Ingresar" value="Ingresar" class="bnt-ingresar">
				</form>			
			</div>
			
			<div id="caja2">
				<form class="form__reg" method="post" action="index.php">
					<input class="inp" type="text" name="usuario" placeholder="Matricula o email">
					<input class="inp" type="password" name="passw" placeholder="Contraseña">
					<input class="bnt-ingresar" type="submit" name="Go" value="Ingresar">
				</form>
			</div>
			
			<div id="div_centro"> <?php echo isset($error)? utf8_decode($error) : ''; ?></div>
			<div id="div_centro"> <?php echo isset($error2)? utf8_decode($error2) : ''; ?></div>
			<!--
			<section class="cursos">
				<h2 class="section__titulo">Nuestros cursos</h2>
				<div class="cursos__columna">
					<img src="img/alumnos.jpg" alt="" class="cursos__img">
					<div class="cursos__descripcion">
						<h3 class="cursos__titulo">Titulo 1</h3>
						<p class="cursos__txt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet, hic?</p>
					</div>
				</div>
				<div class="cursos__columna">
					<img src="img/alumnos.jpg" alt="" class="cursos__img">
					<div class="cursos__descripcion">
						<h3 class="cursos__titulo">Titulo 2</h3>
						<p class="cursos__txt">Itaque ea nulla debitis voluptatem, quia, non est qui earum.</p>
					</div>
				</div>
				<div class="cursos__columna">
					<img src="img/alumnos.jpg" alt="" class="cursos__img">
					<div class="cursos__descripcion">
						<h3 class="cursos__titulo">Titulo 3</h3>
						<p class="cursos__txt">Odio accusantium voluptate, libero at quam explicabo dolorum, mollitia cupiditate.</p>
					</div>
				</div>
				<div class="cursos__columna">
					<img src="img/alumnos.jpg" alt="" class="cursos__img">
					<div class="cursos__descripcion">
						<h3 class="cursos__titulo">Titulo 4</h3>
						<p class="cursos__txt">Vel expedita velit, minus harum itaque voluptates! Enim, rem aliquid!</p>
					</div>
				</div>
			</section>
			-->
		</div>
	</main>
	
	</body>
	<footer class="footer">
		<div class="social">
			<a href="#" class="icon-facebook"></a>
			<a href="#" class="icon-twitter"></a>
			<a href="#" class="icon-gplus"></a>
			<a href="#" class="icon-vine"></a>
		</div>
		<p class="copy">&copy; Tec de madero 2017 - Todos los derechos reservados</p>
	</footer>
	<script type="text/javascript" src="js/menu.js"></script>

</html>