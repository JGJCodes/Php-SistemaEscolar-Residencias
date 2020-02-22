<?php 
    include("php/sesion.php");
    
    include("php/validaciones/val-grupos.php");
    
    $page_titulo = "Formulario de grupos escolares";
    include("html/header/head.html");
    include("html/header/header-usuario.html");
    
    include("html/forms/form-grupos.html");
    
    include("html/footer.html");
    
?>