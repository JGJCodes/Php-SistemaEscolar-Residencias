<?php 
    include("php/sesion.php");
    
    include("php/validaciones/val-usuario.php");
    
    $page_titulo = "Formulario de usuarios";
    include("html/header/head.html");
    include("html/header/header-usuario.html");
    
    include("html/forms/form-usuario.html");
    
    include("html/footer.html");
    
?>