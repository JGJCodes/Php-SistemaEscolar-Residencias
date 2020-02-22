<?php		

    $codError = "";
    $GrupoId = "";

    if(!empty($_GET['id'])){ //Verifica si existe el registro
    
        $id = $_REQUEST['id'];
	$GrupoId = $id;
    }
    
    require('modelo/Database.php');
    $sql=mysqli_query($dbc,"select * from estudiantes where id_grupo='$GrupoId'");
    $registros = mysqli_num_rows($sql);
    $promedio=0;
    
    if($registros!=0){
	while($res=mysqli_fetch_array($sql)){
	    $promedio = $promedio + $res["promedio_escolar"];
	}
	$promedio = $promedio / $registros;
    }
    
    
    mysqli_free_result($sql);
    mysqli_close($dbc);
    
    require('modelo/Database.php');
    $q = "UPDATE grupos SET promedio='$promedio' WHERE id_grupo='$GrupoId'";
    $r = mysqli_query($dbc, $q);
                
    header("Location: ../admin-grupos.php");
    
    
    
?>