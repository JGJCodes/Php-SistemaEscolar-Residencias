<?php
    
    $error = '';
    
    if(isset($_REQUEST['iniciar'])){
		$usuario = trim($_POST["logemail"]); 
		$pass = trim($_POST["logpass"]);
		$id = "";
		$pass2 = "";
		require ('php/modelo/Database.php');
		$sql = "SELECT * FROM usuarios WHERE email='$usuario'";
		$res = mysqli_query($dbc, $sql);
		$registros = mysqli_num_rows($res);
		
		if ($registros > 0) {
		    while($registro = mysqli_fetch_array($res)){
			$id = $registro['id_usuario'];
			$pass2 = $registro['pass'];
			$tipo = $registro['tipo'];
			$estatus = $registro['estatus'];
		    }
		    
		    if($tipo=="admin"){
		      if($estatus==1){
			if(password_verify($pass, $pass2)){
			    $_SESSION['logged'] = "Logged";
			    $_SESSION['usuario'] = $usuario;
			    $_SESSION['id']= $id;
			    
			    header("location: admin-inicio.php");
			  
			}else{
			    $error = "*el email o contraseña son incorrectos";	 
			}
		      }else{
			$error = "*La cuenta se encuentra deshabilitada.";
		      }
		    }else{
			$error = "*Su cuenta no es de tipo ADMINISTRADOR";	
		    }
			
		    
		    mysqli_free_result($res);
		}
		else{
			$error = "*el email: '$usuario' no se encuentra registrado.";
			
		}

    }
?>