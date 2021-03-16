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
    if (isset($_POST["Agregar"])) {
        $nombre=$_POST["nombre"];
		$apellido=$_POST["apellido"];

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "Nombres";
		$table="usuarios";


		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}

        $sql = "INSERT INTO usuarios(nombre,apellido) VALUES ('".$nombre."','".$apellido."')";
        if ($conn->query($sql)===TRUE) {
            $sql="SELECT id FROM ".$table." WHERE nombre= '".$nombre."'";
            $result=$conn->query($sql);
            $row=$result->fetch_assoc();
            header("Location: index.php?id=".$row['id']);
        }
        else{
            echo "Error: ".$sql."<br>". $conn->error;
        }

        if (mysqli_query($conn,$sql)) {
            echo '<script language="javascript">alert("Registrado");</script>';

        }
        else{
            echo '<script language="javascript">alert("No registrado");</script>';
            echo 'Error' .$sql.'<br>'. mysqli_error($conn);

        }

        $conn -> close();

    }
?>

<form style="margin-right: 500px; margin-left: 500px; margin-top: 50px" action="nuevo.php" method="POST">

			<h1>INGRESE NUEVO USUARIO</h1><br><br>
			
			<h3>Nombre</h3>
				<input class="form-control" type="text" id="nombre" name="nombre" placeholder="Nombre"><br><br>
			<h3>Apellido</h3>
				<input class="form-control" type="text" id="apellido" name="apellido" placeholder="Apellido"><br><br>
            <input class="btn btn-primary mb-2" name="Agregar" type="submit" value="Agregar usuario">
</form>
    
</body>
</html>