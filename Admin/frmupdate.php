<?php
    require "Conexion.php";
    $Mascotas = new Conexion();
    $NOMBRE=$_GET['Usuario'];
    $array = array();

    $lista = $Mascotas->filtrado("Doc_Mascotas", $NOMBRE);
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
					<img src="logo.jpg" class="cotas" width="280" height="70" onclick="location.href='home.html'"> 
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
				<h2>Mascotas:</h2>
                <div class="dropdown-divider"></div> 
                <?php
                    foreach($lista as $index)
                    {
                ?>

				<h3>Actualizar datos de <?php echo $index["Usuario_Mascota"] ?></h3>
                <div class="container card-body" style="margin: auto">

                    <div class="container">
                        <div class="col-md-6" style="margin: auto">
                            <form method="POST">

                                <div class="form-group">
                                    <input class="form-control" type="text" v-model="Nombre" name="Nombre" id="" placeholder="Nombre de la mascota" value=<?php echo $index["Nombre"] ?> required autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" v-model="NombreUsuario" name="Usuario" value=<?php echo $index["Usuario_Mascota"] ?> hidden>
                                </div>
                                <div class="form-group">
                                    Sexo
                                    <select class="form-control" name="Sexo" id="" v-model="Sexo" autofocus required>
                                        <option value="<?php echo $index["Sexo"] ?>"><?php echo $index["Sexo"] ?></option>
                                        <option value="macho">Macho</option>
                                        <option value="hembra">Hembra</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    Raza
                                    <select class="form-control" name="Raza" id="" v-model="Raza" autofocus required>
                                        <option value="<?php echo $index["Raza"] ?>"><?php echo $index["Raza"] ?></option>
                                        <option value="Chihuahua">Chihuahua</option>
                                        <option value="Pastor Aleman">Pastor Aleman</option>
                                        <option value="Pastor Alaska">Pastor Alaska</option>
                                        <option value="Pitbul">Pitbul</option>
                                        <option value="Salchicha">Salchicha</option>
                                        <option value="Doberman">Doberman</option>
                                        <option value="Husky">Husky</option>
                                        <option value="Wolfdog">Wolfdog</option>
                                        <option value="Desconocido">Desconocido</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    Tamaño
                                    <select class="form-control" name="Tam" id="" v-model="Tam" autofocus required>
                                        <option value="<?php echo $index["Tamanio"] ?>"><?php echo $index["Tamanio"] ?></option>
                                        <option value="Grande">Grande</option>
                                        <option value="Mediano">Mediano</option>
                                        <option value="Chico">Chico</option>
                                    </select>
                                </div>

                                <input class="btn" type="reset" value="Restablecer">
                                <input class="btn btn-success" name="btnactualizar" type="submit" value="Actualizar">
                                <?php
                                    }
                                ?>
                                
                                <br><br>
                                <a class="nav-link" href="mascotas.php">Cancelar</a>
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
        $User=$_REQUEST["Usuario"];
        $Sex=$_REQUEST["Sexo"];
        $Raza=$_REQUEST["Raza"];
        $Tam=$_REQUEST["Tam"];

        $Mascotas->updateMascota("Doc_Mascotas",$User,$Nom,$Raza,$Tam,$Sex);

        echo (
            '<script>
                alert("Datos actualizados correctamente");
                window.location="mascotas.php";
            </script>'
        );

    }

?>