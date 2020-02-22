<?php 
    include("php/sesion.php");

    $page_titulo = "Administrar maestros";
    include("html/header/head.html");
    include("html/header/header-usuario.html");
    
    $page_subtitulo = "Maestros";
    $linkagregar = "form-usuarios.php";
    $linkpdf = "php/reportes/reporte-maestros-pdf.php";
    $linkword = "php/reportes/reporte-maestros-word.php";
    $linkexcel = "php/reportes/reporte-maestros-excel.php";
    include("html/main/main-titulo.html");
    
    $fila1 = "Identificador";
    $fila2 = "Nombre de usuario";
    $fila3 = "Tipo de usuario";
    $tabla = "usuarios";
    $query = "id";
    $llave = "tipo";
    $Id = "'maestro'";
    $tbf1 = "id_usuario";
    $tbf2 = "nombre";
    $tbf3 = "tipo";
    
    $btnBorrar = "borrar-registro.php";
    $btnEditar = "form-usuarios.php";
    $btnextra1 = true;
    $btnext1href = "form-maestros.php";
    $btnext1label = "datos escolares";
    $btnextra2 = true;
    $btnext2href = "#";
    $btnext2label = "horario de trabajo";
    include("html/main/main-tabla.html");
    
    include("html/footer.html");
?>