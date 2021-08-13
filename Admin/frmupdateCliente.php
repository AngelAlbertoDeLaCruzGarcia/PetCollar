<?php
    require "Conexion.php";
    $Mascotas = new Conexion();
    $NOMBRE=$_GET['Usuario'];
    $array = array();

    $lista = $Mascotas->filtradoCliente("Doc_Clientes", $NOMBRE);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Actualizar Datos Mascota</title>
        <meta charset="utf8">
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/listado.css" rel="stylesheet">
        <link href="../css/ESTILOPRINCIPAL.css" rel="stylesheet">
        <link href="../css/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    </head>

    <script src="../vue.js"></script>

    <body class="container-fluid">

	  <div>

		<header>
			<div row grid-divider>
				<div class="header" style="display: inline-block;">
					<img src="logo.jpg" class="cotas" width="280" height="70" onclick="location.href='home.php'"> 
				</div> 
				<div class="NombreEmpresa">
					PET COLLAR
				</div>
				<div class="dropdown DetallesCuenta" style="display: inline-block;">
					<img src="img.JPG" class="iconUser dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"> 
					<Label class="nameuser">Angel</Label>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="../login.html">Cerrar sesión</a> 
						<div class="dropdown-divider"></div> 
						<a class="dropdown-item" href="cuenta.html">Cuenta</a> 
					</div>
				</div>
			</div>
		</header>
	
		<main style="padding-top: 10px;">
			<nav class="navbar" style="width: 18%; position: absolute; display: inline-block;">
				<ul class="navbar-nav">
					<li class="nav-item active">
						<a class="nav-link btn my-2 my-sm-1" href="home.php">Home
						<span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item active">
						<a style="color: white;" class="nav-link btn btn-primary my-2 my-sm-1" href="ventas.html">Ventas
						<span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a style="color: white;" class="nav-link btn btn-primary my-2 my-sm-1" href="productos.html">Productos</a>
					</li>
					<li class="nav-item">
						<a style="color: white;" class="nav-link btn btn-primary my-2 my-sm-1" href="clientes.php">Clientes</a>
					</li>
					<li class="nav-item">
						<a style="color: white;" class="nav-link btn btn-primary my-2 my-sm-1" href="mascotas.php">Mascotas</a>
					</li>
				</ul>
			</nav>

			<!-- Vista home -->
	
			<div class="mainseparador Principal">
				<h2>Clientes:</h2>
                <div class="dropdown-divider"></div> 
                <?php
                    foreach($lista as $index)
                    {
                ?>

				<h3>Actualizar datos de <?php echo $index["Usuario"] ?></h3>
                <div class="container card-body" style="margin: auto">

                    <div class="container">
                        <div class="col-md-6" style="margin: auto">

                            <form method="POST">
                                <div class="form-group">
                                    <input class="form-control" type="text" value=<?php echo $index["Nombre"] ?> name="Nombre" placeholder="Nombre" required autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" value=<?php echo $index["APaterno"] ?> name="ap" placeholder="Apellido Paterno" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="am" value=<?php echo $index["AMaterno"] ?> placeholder="Apellido Materno" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="Usuario"  value=<?php echo $index["Usuario"] ?> required hidden>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="Tel" value=<?php echo $index["Tel"] ?> placeholder="Telefono" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="email" name="email" value=<?php echo $index["Email"] ?> placeholder="Correo electronico" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="cp" value=<?php echo $index["CodPostal"] ?> placeholder="Codigo postal" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="direccion" value=<?php echo $index["Localidad"] ?> placeholder="Direccion" required>
                                </div>

                                <input class="btn" type="reset" value="Restablecer">
                                <input class="btn btn-success" name="btnactualizar" type="submit" value="Actualizar">
                                <?php
                                    }
                                ?>

                                <br><br>
                                <a class="nav-link" href="clientes.php">Cancelar</a>
                            </form>
                        </div>
                    </div>
				</div>
			</div>
		</main>

      </div>
      
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/scripts.js"></script>
  </body>

</html>

<?php
    
    if(isset($_REQUEST["btnactualizar"])){
        $Nom=$_REQUEST["Nombre"];
        $ap=$_REQUEST["ap"];
        $am=$_REQUEST["am"];
        $User=$_REQUEST["Usuario"];
        $Tel=$_REQUEST["Tel"];
        $Email=$_REQUEST["email"];
        $Cp=$_REQUEST["cp"];
        $Dir=$_REQUEST["direccion"];

		$Mascotas->updateCliente("Doc_Clientes",$User,$ap,$am,$Nom,$Tel,$Email,$Cp,$Dir);

        echo (
            '<script>
                alert("Datos actualizados correctamente");
                window.location="clientes.php";
            </script>'
        );
    }

?>