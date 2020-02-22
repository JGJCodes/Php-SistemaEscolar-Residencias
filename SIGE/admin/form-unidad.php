<?php 
    include("php/sesion.php");
    
    include("php/validaciones/val-unidades.php");
    
    $page_titulo = "Formulario de unidades de asignatura";
    include("html/header/head.html");
    include("html/header/header-usuario.html"); 
    
    include ("html/forms/form-unidad.html");
    
    include("html/footer.html");
    
?>