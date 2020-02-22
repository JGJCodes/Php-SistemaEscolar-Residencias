<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Registro para Aspirantes</title>        
        <link rel="stylesheet" type="text/css" href="css/Formularioscss.css">
    </head>  


<body>

<?php
include("conexion.php");
if (isset($_POST['enviar'])) {
    if (isset($_POST['nombres']) && !empty($_POST['nombres']&&        
        isset($_POST['apellidoPaterno']) && !empty($_POST['apellidoPaterno'])&&
        isset($_POST['apellidoMaterno']) && !empty($_POST['apellidoMaterno'])&&
        isset($_POST['curp']) && !empty($_POST['curp']) && 
        isset($_POST['genero']) && !empty($_POST['genero']) && 
        isset($_POST['fechaNacimiento']) && !empty($_POST['fechaNacimiento']) &&  
        isset($_POST['direccion']) && !empty($_POST['direccion']) && 
        isset($_POST['telefono']) && !empty($_POST['telefono']) &&
        isset($_POST['email']) && !empty($_POST['email']) &&        
        isset($_POST['escuelaProcedencia']) && !empty($_POST['escuelaProcedencia']) &&
		isset($_POST['promedio']) && !empty($_POST['promedio']) &&
        isset($_POST['grado_aspira']) && !empty($_POST['grado_aspira']) &&
        isset($_POST['nombre_padre']) && !empty($_POST['nombre_padre']) &&
        isset($_POST['nombre_madre']) && !empty($_POST['nombre_madre']))) {

		$nombres = trim($_POST['nombres']);
		$paterno = trim($_POST['apellidoPaterno']);
		$materno = trim($_POST['apellidoMaterno']);
		$curp = trim($_POST['curp']);
		$genero = trim($_POST['genero']);
		$fecha = trim($_POST['fechaNacimiento']);
		$direccion = trim($_POST['direccion']);
		$telefono = trim($_POST['telefono']);
		$email = trim($_POST['email']);
		$escuela = trim($_POST['escuelaProcedencia']);
		$promedio = trim($_POST['promedio']);
		$grado = trim($_POST['grado_aspira']);
		$padre = trim($_POST['nombre_padre']);
		$madre = trim($_POST['nombre_madre']);
		$curp = strtoupper($curp);

        $con = mysql_connect($host,$user,$pw)or die ("Problemas al conectar");
        mysql_select_db($db,$con);

		$q = "INSERT INTO aspirantes (nombres,apellido_paterno,apellido_materno,curp,genero,fecha_nacimiento,direccion,telefono,";
	    $q .= "email,escuela_procedencia,grado_aspira,nombre_padre,nombre_madre,fecha_registro,promedio_procedencia) VALUES(";
	    $q .= "'$nombres','$paterno','$materno','$curp','$genero','$fecha','$direccion','$telefono','$email',";
	    $q .= "'$escuela','$grado','$padre','$madre',NOW(),$promedio)";

        mysql_query($q,$con);
        echo "<a href='index.php'><h6><span>¡Datos enviados correctamente! CLICK AQUÍ</span></h6></a>";
    }
    else{      
        echo "<h6>Campos Vacios";
    }
}
?>

<div class="container">
            <div class="">
                <h2>Registro<span> Aspirantes</span></h2>
            </div>
            <form action="registroAspirantes.php" class="form__reg" method="post" id="t">                                                                                 
                    
					<input type="text" class="input" name="nombres" placeholder="Nombre(s)">              
                   
                    <input type="text" class="input" name="apellidoPaterno" placeholder="Apellido paterno">              
                   
                    <input type="text" class="input" name="apellidoMaterno" placeholder="Apellido materno">            
                   
                    <input type="text" class="input" name="curp" placeholder="Curp" maxlength="18">

                   <label><span>&nbsp Genero</span></label>
						<select name="genero" class='input'>
							<option value="F"  >Femenino</option>
							<option value="M"  >Masculino</option>
							<option value="O"  >Otro</option>
					</select>

                    <label><span>&nbsp Fecha de nacimiento</span></label>                                
                    <input type="date" class="input" name="fechaNacimiento" placeholder="Fecha de nacimiento (AAAA-MM-DD)">
                
                    <input type="text" class="input" name="direccion" placeholder="Direccion">

                    <input type="int" class="input" name="telefono" placeholder="Telefono" maxlength="10">
                
                    <input type="email" class="input" name="email" placeholder="Email">
                                                    
                    <input type="text" class="input" name="escuelaProcedencia" placeholder="Escuela de procedencia">
					<label><span>&nbsp Promedio escolar:</span></label>
					<input type="int" class="input" name="promedio" placeholder="7.4">
					<label><span>&nbsp Grado escolar al que aspira:</span></label>
                    <input type="int" class="input" name="grado_aspira" placeholder="3">

                    <input type="text" class="input" name="nombre_padre" placeholder="Nombre completo del padre">

                    <input type="text" class="input" name="nombre_madre" placeholder="Nombre completo de la madre">

            <div class="btn__form">
                <input type="submit" name="enviar" class="btn__submit" value="Registrar" id="s">
                <input type="submit" name="reset" class="btn__reset" value="Limpiar" id="s">
            </div>
            
        </form>
        </div>





    </body>
</html>