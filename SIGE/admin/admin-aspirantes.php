<?php 
    include("php/sesion.php");

    $page_titulo = "Administrar aspirantes";
    include("html/header/head.html");
    include("html/header/header-usuario.html");    
    
    $page_subtitulo = "Aspirantes";
    $linkagregar = "form-aspirante.php";
    $linkpdf = "php/reportes/reporte-aspi-pdf.php";
    $linkword = "php/reportes/reporte-aspi-word.php";
    $linkexcel = "php/reportes/reporte-aspi-excel.php";
    include("html/main/main-titulo.html");
    
    $fila1 = "Identificador";
    $fila2 = "Nombre completo";
    $fila3 = "Promedio";
    $tabla = "aspirantes";
    $tbf1 = "id_aspirante";
    $nombre = "completo";
    $tbf3 = "promedio_procedencia";
    $btnBorrar = "borrar-registro.php";
    $btnEditar = "form-aspirante.php";
    
    $btnextra1 = true;
    $btnext1href = "php/reportes/ficha-aspirante.php";
    $btnext1label = "ficha de inscripción";
    $btnextra2 = true;
    $btnext2href = "#";
    $btnext2label = "subir nivel";
    
    include("html/main/main-tabla.html");
    
    include("html/footer.html");
?>

