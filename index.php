<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "Nombres";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}

?>
<div style="margin-right: 200px; margin-left: 150px; margin-top: 150px; margin-bottom: 150px;" align="center">
		<h1>USUARIOS</h1><br>
	<table class="table">
		<thead class="thead-dark">
			
			<th>Nombre</th>
			<th>Apellido</th>
		</thead>
		<?php foreach ($conn->query('SELECT * from usuarios') as $row){ ?>
			<tr>
				
			    <td><?php echo $row['nombre'] ?></td>
			    <td><?php echo $row['apellido'] ?></td>
		 	</tr>

		 	<?php
				}
                $conn -> close();
			?>
	</table><br>
	  <p>
      <a class="btn btn-primary mb-2" href="nuevo.php" type="submit">Agregar Nuevo</a> 
  	</p>
  	</div>
</body>
</html>