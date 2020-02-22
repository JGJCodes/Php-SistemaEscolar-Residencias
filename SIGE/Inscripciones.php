<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Registro para Aspirantes</title>        
        <link rel="stylesheet" type="text/css" href="css/Formularioscss.css">
    </head>  


<body>

<div class="container">
            <div class="">
                <h2>PROCESO DE <span> INSCRIPCIONES</span></h2>
            </div>
            <div class="Calif" >
	    <center>
		<?php
		  include('conn.php');
		  $query = "SELECT * FROM sistema where nombre='inscripcion'";
		  $resultado = $mysqli->query($query);
		  while($row = $resultado->fetch_assoc()){
		 ?>

	      <h2><?php echo $row['descripcion'] ?></h2>
	      <img  src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?>" width="800px" height="1000px">
	      <?php
		}
	      ?>
	      </center>
	    </div>
 </div>

    </body>
</html>