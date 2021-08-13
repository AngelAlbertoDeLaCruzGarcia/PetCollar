<?php
    require "Conexion.php";
    $USUARIOS = new Conexion();
    $array = array();

    $lista = $USUARIOS->listado("Doc_Clientes");
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
				<h2>Clientes:</h2>
				<div class="dropdown-divider"></div> 

				<input class="btn btn-outline-success" v-on:click="showlistado" type="button" value="Listado">
				<input class="btn btn-outline-success" v-on:click="showcreate" type="button" value="Agregar nuevo Cliente">

				<div v-if="btnlistado==true" class="container">
					<div class="row">
						<table class="table table-bordered table-hover" style="text-align: center; font-size: 15px">
							<thead class="thead-dark">
								<tr>
									<td>Nombre</td>
									<td>Usuario</td>
									<td>Telefono</td>
									<td>Email</td>
									<td>Codigo Postal</td>
									<td>Direccion</td>
									<td>Acciones</td>
								</tr>
							</thead>
							<tbody>
							<?php
								foreach($lista as $index)
								{
							?>

								<tr>
									<td><?php echo $index['Nombre'] ?> <?php echo $index['APaterno'] ?> <?php echo $index['AMaterno'] ?></td>
									<td><?php echo $index["Usuario"] ?></td>
									<td><?php echo $index['Tel'] ?></td>
									<td><?php echo $index['Email'] ?></td>
									<td><?php echo $index['CodPostal'] ?></td>
									<td><?php echo $index['Localidad'] ?></td>
									<td>
										<div class="row m-lg-auto">
											<a href="frmupdateCliente.php?Usuario=<?php echo $index['Usuario'] ?>" class="btn btn-info mr-xl-1" style="font-size: 15px;">Actualizar</a>
											<a href="confirmarCliente.php?Usuario=<?php echo $index['Usuario'] ?>" class="btn btn-danger" style="font-size: 15px;">Eliminar</a>
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

				<div v-if="btncreate==true" class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="card-body">

								<form method="POST">
									<div class="form-group">
										<input class="form-control" type="text" v-model="Nombre" name="Nombre" placeholder="Nombre" required autofocus>
									</div>
									<div class="form-group">
										<input class="form-control" type="text" v-model="ap" name="ap" placeholder="Apellido Paterno" required autofocus>
									</div>
									<div class="form-group">
										<input class="form-control" type="text" v-model="am" name="am" placeholder="Apellido Materno" required autofocus>
									</div>
									<div class="form-group">
										<input class="form-control" type="text" v-model="NombreUsuario" name="Usuario" placeholder="Nombre de usuario" required>
									</div>
										<div class="form-group"><input class="form-control" type="text" v-model="Tel" name="Tel" placeholder="Telefono" required>
									</div>
									<div class="form-group">
										<input class="form-control" type="email" v-model="email" name="email" placeholder="Correo electronico" required>
									</div>
									<div class="form-group">
										<input class="form-control" type="text" v-model="cp" name="cp" placeholder="Codigo postal" required>
									</div>
									<div class="form-group">
										<input class="form-control" v-model="direccion" type="text" name="direccion" placeholder="Direccion" required>
									</div>
									<input class="btn btn-success" name="btnsave" type="submit" value="Agregar">
								</form>
							</div>
						</div>

						<div class="col-md-6 mt-4">
							<div class="card border-left-primary shadow py-2">
								<div class="card-header py-3">
									<h6 class="m-0 font-weight-bold text-primary">Datos del nuevo Cliente</h6>
									</div>
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col">
											<div class="mb-1 small">Nombre del cliente</div>
										</div>
										<div class="col">
											<div class="mb-1 small">{{Nombre}}</div>
										</div>
									</div>
									<div class="dropdown-divider"></div> 
									<div class="row align-items-center">
										<div class="col">
											<div class="mb-1 small">Apellido Paterno</div>
										</div>
										<div class="col">
											<div class="mb-1 small">{{ap}}</div>
										</div>
									</div>
									<div class="dropdown-divider"></div> 
									<div class="row align-items-center">
										<div class="col">
											<div class="mb-1 small">Apellido Materno</div>
										</div>
										<div class="col">
											<div class="mb-1 small">{{am}}</div>
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
											<div class="mb-1 small">Numero de Telefono</div>
										</div>
										<div class="col">
											<div class="mb-1 small">{{Tel}}</div>
										</div>
									</div>
									<div class="dropdown-divider"></div> 
									<div class="row align-items-center">
										<div class="col">
											<div class="mb-1 small">Correo Electronico</div>
										</div>
										<div class="col">
											<div class="mb-1 small">{{email}}</div>
										</div>
									</div>
									<div class="dropdown-divider"></div> 
									<div class="row align-items-center">
										<div class="col">
											<div class="mb-1 small">Codigo Postal</div>
										</div>
										<div class="col">
											<div class="mb-1 small">{{cp}}</div>
										</div>
									</div>
									<div class="dropdown-divider"></div> 
									<div class="row align-items-center">
										<div class="col">
											<div class="mb-1 small">Direccion</div>
										</div>
										<div class="col">
											<div class="mb-1 small">{{direccion}}</div>
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
				ap: "",
				am: "",
				NombreUsuario: "",
				Tel: "",
				email: "",
				cp: "",
				direccion: ""
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
        $ap=$_REQUEST["ap"];
        $am=$_REQUEST["am"];
        $User=$_REQUEST["Usuario"];
        $Tel=$_REQUEST["Tel"];
        $Email=$_REQUEST["email"];
        $Cp=$_REQUEST["cp"];
        $Dir=$_REQUEST["direccion"];

		$USUARIOS->insertCliente("Doc_Clientes",$User,$ap,$am,$Nom,$Tel,$Email,$Cp,$Dir);
    }

?>