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
    
    $page_titulo = "Administrar unidades";
    include("html/header/head.html");
    include("html/header/header-usuario.html");
    
    $page_subtitulo = $AsigNombre.": unidades";
    $linkagregar = "form-unidad.php";
    $linkpdf = "php/reportes/reporte-unidad-pdf.php";
    $linkword = "php/reportes/reporte-unidad-word.php";
    $linkexcel = "php/reportes/reporte-unidad-excel.php";
    include("html/main/main-titulo.html");
    
    if($codError!=""){
	echo $codError;
    }
    
    $fila1 = "Identificador";
    $fila2 = "Clave de asignatura";
    $fila3 = "Tema";
    $tabla = "unidades";
    $tbf1 = "id_unidad";
    $tbf2 = "id_asignatura";
    $tbf3 = "tema";
    $query = "id";
    $llave = "id_asignatura";
    $Id = $AsigId;
    $btnBorrar = "borrar-registro.php";
    $btnEditar = "form-unidad.php";
    include("html/main/main-tabla.html");
    
    include("html/footer.html");
?>