<?php
  session_start();
  if (isset($_SESSION['logged'])=== FALSE) {
	  header("Location: ./index.php");
  }
  $usuario = $_SESSION['usuario'];
  $idusuario = $_SESSION['id'];
  
  $query = "";
  $nombre="";
  $btnextra1="";
  $btnextra2="";
  $btnextra3="";
  $btnextra4="";
  $tbf2 = "";
?>