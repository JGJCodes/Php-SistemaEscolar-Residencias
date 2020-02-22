<?php 
    include("php/sesion.php");
    
    $page_titulo = "Administrar padres";
    include("html/header/head.html");
    include("html/header/header-usuario.html");
    
    $page_subtitulo = "Padres";
    $linkagregar = "forms-padres.php";
    $linkpdf = "php/reportes/reporte-padre-pdf.php";
    $linkword = "php/reportes/reporte-padre-word.php";
    $linkexcel = "php/reportes/reporte-padre-excel.php";
    include("html/main/main-titulo.html");
    
    $fila1 = "Identificador";
    $fila2 = "Nombre completo";
    $fila3 = "Correo electrónico";
    $tabla = "padres";
    $tbf1 = "id_padre";
    $nombre = "completo";
    $tbf3 = "email";
    $btnBorrar = "borrar-registro.php";
    $btnEditar = "forms-padres.php";
    include("html/main/main-tabla.html");
    
    include("html/footer.html");
?>