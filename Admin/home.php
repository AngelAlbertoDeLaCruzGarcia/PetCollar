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

				<div class="row">

					<div class="col-xl-3 col-md-6 mb-4">
					  <div class="card border-left-primary shadow h-100 py-2">
						<div class="card-body">
						  <div class="row no-gutters align-items-center">
							<div class="col mr-2">
							  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total de ventas</div>
							  <div class="h5 mb-0 font-weight-bold text-gray-800">260</div>
							</div>
							<div class="col-auto">
								<i class="fas fa-store fa-2x text-gray-300"></i>
							</div>
						  </div>
						</div>
					  </div>
					</div>
		
					<div class="col-xl-3 col-md-6 mb-4">
					  <div class="card border-left-success shadow h-100 py-2">
						<div class="card-body">
						  <div class="row no-gutters align-items-center">
							<div class="col mr-2">
							  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total de ganancia</div>
							  <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
							</div>
							<div class="col-auto">
							  <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
							</div>
						  </div>
						</div>
					  </div>
					</div>
		
					<div class="col-xl-3 col-md-6 mb-4">
					  <div class="card border-left-info shadow h-100 py-2">
						<div class="card-body">
						  <div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Mascotas</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
							</div>
							<div class="col-auto">
							  <i class="fas fa-dog fa-2x text-gray-300"></i>
							</div>
						  </div>
						</div>
					  </div>
					</div>
		
					<div class="col-xl-3 col-md-6 mb-4">
					  <div class="card border-left-warning shadow h-100 py-2">
						<div class="card-body">
						  <div class="row no-gutters align-items-center">
							<div class="col mr-2">
							  <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Clientes</div>
							  <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
							</div>
							<div class="col-auto">
							  <i class="fas fa-users fa-2x text-gray-300"></i>
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
				btnhome: true,
				btnestadistic: false,
				btnubicacion: false,
				btnconten: false,
				btndep: false,
				btnnot: false
			},
			methods: {
				showhome : function(){
					if(this.btnhome==false)
						this.btnhome=!this.btnhome;
						this.btnestadistic=this.btnubicacion=this.btnconten=this.btndep=this.btnnot=false;
				},
				showestadist : function(){
					if(this.btnestadistic==false)
						this.btnestadistic=!this.btnestadistic;
						this.btnhome=this.btnubicacion=this.btnconten=this.btndep=this.btnnot=false;
				},
				showubicacion : function(){
					if(this.btnubicacion==false)
						this.btnubicacion=!this.btnubicacion;
						this.btnhome=this.btnestadistic=this.btnconten=this.btndep=this.btnnot=false;
				},
				showconten : function(){
					if(this.btnconten==false)
						this.btnconten=!this.btnconten;
						this.btnhome=this.btnestadistic=this.btnubicacion=this.btndep=this.btnnot=false;
				},
				showdep : function(){
					if(this.btndep==false)
						this.btndep=!this.btndep;
						this.btnhome=this.btnestadistic=this.btnubicacion=this.btnconten=this.btnnot=false;
				},
				shownot : function(){
					if(this.btnnot==false)
						this.btnnot=!this.btnnot;
						this.btnhome=this.btnestadistic=this.btnubicacion=this.btnconten=this.btndep=false;
				}
			}
		})
	</script>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/scripts.js"></script>
  </body>
</html>