<?php 
    include("php/sesion.php");
    
    include("php/validaciones/val-ficha.php");
    
    $page_titulo = "Formulario de ficha medica";
    include("html/header/head.html");
    include("html/header/header-usuario.html");
    
    include ("html/forms/form-ficha.html");
    
    include("html/footer.html");
    
?>