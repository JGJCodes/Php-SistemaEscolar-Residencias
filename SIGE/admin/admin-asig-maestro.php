<?php 
    include("php/sesion.php");
    
    $codError = "";
    $AsigId = "";
    $AsigNombre = "";

    if(!empty($_GET['id'])){ //Verifica si existe el registro
    
        $id = $_REQUEST['id'];
        $titulo = "";
	
	require('php/modelo/Database.php');
	$q = "SELECT * FROM asignaturas WHERE id_asignatura='$id'";
	$r = mysqli_query($dbc, $q);
	  
	if($r){//si hay resultado entonces
	
            while($registro = mysqli_fetch_array($r)){ //recupera los datos del usuario
	      $titulo = $registro["titulo"]; 
            }
            
            //muestra los datos del usuario en el formulario
            $AsigId = $id;
            $AsigNombre = $titulo;
            
            mysqli_free_result($r);
            
        }
        else{
	    
            $codError = '<p class="text-danger"> Lo sentimos la pagina ha tenido un inconveniente</p> <br />';	
            $codError .= '<p class="text-danger">' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p> <br/ ></main>';
        }      
         mysqli_close($dbc);
	
    }
    

    $page_titulo = "Administrar asignaturas con maestros";
    include("html/header/head.html");
    include("html/header/header-usuario.html");
    
    $page_subtitulo = $AsigNombre.": maestros";
    $linkagregar = "form-asig-maestro.php";
    $linkpdf = "php/reportes/reporte-asigmast-pdf.php";
    $linkword = "php/reportes/reporte-asigmast-word.php";
    $linkexcel = "php/reportes/reporte-asigmast-excel.php";
    include("html/main/main-titulo.html");
    
    if($codError!=""){
	echo $codError;
    }
    
    $fila1 = "Identificador";
    $fila2 = "Clave de grupo";
    $fila3 = "Clave de maestro";
    $tabla = "asignatura_maestro";
    $tbf1 = "id_asignaturaconmaestros";
    $tbf2 = "id_grupo";
    $tbf3 = "id_maestro";
    $query = "id";
    $llave = "id_asignatura";
    $Id = $AsigId;
    $btnBorrar = "borrar-registro.php";
    $btnEditar = "form-asig-maestro.php";
    include("html/main/main-tabla.html");
    
    include("html/footer.html");
?>