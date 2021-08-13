<?php
    require "Conexion.php";
    $USUARIOS = new Conexion();
    $array = array();

    $lista = $USUARIOS->listado("Doc_Mascotas");
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
	<link href="../css/listado.css" rel="stylesheet">
	<link href="../css/ESTILOPRINCIPAL.css" rel="stylesheet">
	<link href="../css/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="../css/sb-admin-2.min.css" rel="stylesheet">
  </head>
  
  <script src="../vue.js"></script>

  <body class="container-fluid">

	  <div id="aplication">

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
						<a class="dropdown-item" href="">Cerrar sesión</a> 
						<div class="dropdown-divider"></div> 
						<a class="dropdown-item" href="">Cuenta</a> 
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

				<input class="btn btn-outline-success" v-on:click="showlistado" type="button" value="Listado">
				<input class="btn btn-outline-success" v-on:click="showcreate" type="button" value="Agregar nueva mascota">

				<!-- Vista Listado -->

				<div v-if="btnlistado==true" class="container">
					<div class="row">
						<table class="table table-bordered table-hover" style="text-align: center; font-size: 15px">
							<thead class="thead-dark">
								<tr>
									<td>Usuario Mascota</td>
									<td>Nombre</td>
									<td>Raza</td>
									<td>Tamaño</td>
									<td>Sexo</td>
									<td>Fecha de Nacimiento</td>
									<td>Acciones</td>
								</tr>
							</thead>
							<tbody>
							<?php
								foreach($lista as $index)
								{
							?>

								<tr>
									<td><?php echo $index["Usuario_Mascota"] ?></td>
									<td><?php echo $index['Nombre'] ?></td>
									<td><?php echo $index['Raza'] ?></td>
									<td><?php echo $index['Tamanio'] ?></td>
									<td><?php echo $index['Sexo'] ?></td>
									<td><?php echo $index['FechaNacimiento'] ?></td>
									<td>
										<div class="row m-lg-auto">
											<a href="frmupdate.php?Usuario=<?php echo $index['Usuario_Mascota'] ?>" class="btn btn-info mr-xl-1" style="font-size: 15px;">Actualizar</a>
											<a href="confirmar.php?Usuario=<?php echo $index['Usuario_Mascota'] ?>" class="btn btn-danger" style="font-size: 15px;">Eliminar</a>
										</div>
									</td>
								</tr>

							<?php
								}
							?>
							</tbody>
						</table>
					</div>
				</div>

				<!-- Vista Create Mascota -->

				<div v-if="btncreate==true" class="container">
					<div class="row">
					  	<div class="col-md-6">
							<div class="card-body">
				  
								<form method="POST">
									<div class="form-group">
										<input class="form-control" type="text" v-model="Nombre" name="Nombre" id="" placeholder="Nombre de la mascota" required autofocus>
									</div>
									<div class="form-group">
										<input class="form-control" type="text" v-model="NombreUsuario" name="Usuario" id="" placeholder="Nombre de usuario para la mascota" required>
									</div>
									<div class="form-group">
										Sexo
										<select class="form-control" name="Sexo" id="" v-model="Sexo" autofocus required>
											<option value="macho">Macho</option>
											<option value="hembra">Hembra</option>
										</select>
									</div>
									<div class="form-group">
										Raza
										<select class="form-control" name="Raza" id="" v-model="Raza" autofocus required>
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
											<option value="Grande">Grande</option>
											<option value="Mediano">Mediano</option>
											<option value="Chico">Chico</option>
										</select>
									</div>
									<div class="form-group">
										<input class="form-control" v-model="Fecha" type="date" name="Fecha" id="" required>
									</div>

									<input class="btn btn-success" name="btnsave" type="submit" value="Agregar">
								</form>
							</div>
						</div>

						<div class="col-md-6 mt-4">
							<div class="card border-left-primary shadow py-2">
								<div class="card-header py-3">
									<h6 class="m-0 font-weight-bold text-primary">Datos de la Nueva Mascota</h6>
								  </div>
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col">
											<div class="mb-1 small">Nombre de la mascota</div>
										</div>
										<div class="col">
											<div class="mb-1 small">{{Nombre}}</div>
										</div>
									</div>
									<div class="dropdown-divider"></div> 
									<div class="row align-items-center">
										<div class="col">
											<div class="mb-1 small">Nombre de usuario</div>
										</div>
										<div class="col">
											<div class="mb-1 small">{{NombreUsuario}}</div>
										</div>
									</div>
									<div class="dropdown-divider"></div> 
									<div class="row align-items-center">
										<div class="col">
											<div class="mb-1 small">Sexo</div>
										</div>
										<div class="col">
											<div class="mb-1 small">{{Sexo}}</div>
										</div>
									</div>
									<div class="dropdown-divider"></div> 
									<div class="row align-items-center">
										<div class="col">
											<div class="mb-1 small">Raza</div>
										</div>
										<div class="col">
											<div class="mb-1 small">{{Raza}}</div>
										</div>
									</div>
									<div class="dropdown-divider"></div> 
									<div class="row align-items-center">
										<div class="col">
											<div class="mb-1 small">Tamaño</div>
										</div>
										<div class="col">
											<div class="mb-1 small">{{Tam}}</div>
										</div>
									</div>
									<div class="dropdown-divider"></div> 
									<div class="row align-items-center">
										<div class="col">
											<div class="mb-1 small">Fecha de nacimiento</div>
										</div>
										<div class="col">
											<div class="mb-1 small">{{Fecha}}</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
			
		</main>

	  </div>

	<script>
		var app = new Vue({
			el: "#aplication",
			data:{
				btnlistado: true,
				btncreate: false,
				Nombre: "",
				NombreUsuario: "",
				Sexo: "_",
				Raza: "_",
				Tam: "_",
				Fecha: "_"
			},
			methods: {
				showlistado : function(){
					if(this.btnlistado==false)
						this.btnlistado=!this.btnlistado;
						this.btncreate=false;
				},
				showcreate : function(){
					if(this.btncreate==false)
						this.btncreate=!this.btncreate;
						this.btnlistado=false;
				},
			}
		})
	</script>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/scripts.js"></script>
  </body>
</html>

<?php
    
    if(isset($_REQUEST["btnsave"])){
        $Nom=$_REQUEST["Nombre"];
        $User=$_REQUEST["Usuario"];
        $Sex=$_REQUEST["Sexo"];
        $Raza=$_REQUEST["Raza"];
        $Tam=$_REQUEST["Tam"];
        $Fecha=$_REQUEST["Fecha"];

        $USUARIOS->insertMascota("Doc_Mascotas",$User,$Nom,$Raza,$Tam,$Fecha,$Sex);
    }

?>