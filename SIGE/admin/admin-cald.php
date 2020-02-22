<?php 
    include("php/sesion.php");
    
    $id = 2;
    
    include("php/validaciones/val-config.php");
    
    $page_titulo = "Formulario de configuraciones";
    include("html/header/head.html");
    include("html/header/header-usuario.html");
    
    $formTit = "el calendario escolar";
    
    include("html/forms/form-config.html");
    
    include("html/footer.html");
?>