<?php 
    include("php/sesion.php");
    
    $page_titulo = "Administrar administradores";
    include("html/header/head.html");
    include("html/header/header-usuario.html");
    
    $page_subtitulo = "Administradores";
    $linkagregar = "form-usuarios.php";
    $linkpdf = "php/reportes/reporte-admin-pdf.php";
    $linkword = "php/reportes/reporte-admin-word.php";
    $linkexcel = "php/reportes/reporte-admin-excel.php";
    include("html/main/main-titulo.html");
    
    $fila1 = "Identificador";
    $fila2 = "Nombre de usuario";
    $fila3 = "Correo electrónico";
    $tabla = "usuarios";
    $query = "id";
    $llave = "tipo";
    $Id = "'admin'";
    $tbf1 = "id_usuario";
    $tbf2 = "nombre";
    $tbf3 = "email";
    $btnBorrar = "borrar-registro.php";
    $btnEditar = "form-usuarios.php";
    include("html/main/main-tabla.html");
    
    include("html/footer.html");
?>