<?php 
    include("php/sesion.php");
    
    include("php/validaciones/val-maestros.php");
    
    $page_titulo = "Formulario de maestros";
    include("html/header/head.html");
    include("html/header/header-usuario.html");
    
    include ("html/forms/form-maestros.html");
    
    include("html/footer.html");
    
?>