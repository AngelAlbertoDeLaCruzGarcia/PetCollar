<?php
    require "Conexion.php";
    $USUARIOS = new Conexion();
    $User=$_GET['Usuario'];
    $array = array();
    $lista = $USUARIOS->filtradoCliente("Doc_Clientes", $User);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Confirmar Eliminacion</title>
        <meta charset="utf8">
        <link href="confirmar.css"
              rel="stylesheet">
        <script language="Javascript" src="validaciones.js" type="text/javascript"></script>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/listado.css" rel="stylesheet">
        <link href="../css/ESTILOPRINCIPAL.css" rel="stylesheet">
        <link href="../css/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    </head>
    <body>
        <main class="main">
            <br><br>
            <div class="container col-md-9">
                <?php
                    foreach($lista as $index)
                    {
                ?>
                <form>

                    <h1>Todos los datos de <?php echo $index['Usuario']?> seran eliminados</h1>
                    <br>
                    <div class="card col-md-6 p-5" style="margin: auto;"> 
                        Nombre:<h4><?php echo $index['Nombre']?></h4>
                        <input name="User" type="text" value=<?php echo $index["Usuario"]?> hidden>

                        Numero de telefono:<h4><?php echo $index['Tel']?></h4>

                        Correo Electronico:<h4><?php echo $index['Email']?></h4>

                        <br>
                        <div class="row" style="margin: auto">

                            <a class="nav-link" href="clientes.php" >Cancelar</a>
                            <input class="btn btn-danger" autofocus name="btndelete" type="submit" value="Confirmar">

                        </div>
                        
                    </div>
                </form>
                
                <?php
                    }
                ?>
            </div><br><br>
        </main>
        <footer>
        </footer>
    </body>
</html>

<?php
    if(isset($_REQUEST["btndelete"])){
        $User=$_REQUEST["User"];

        $USUARIOS->deleteCliente("Doc_Clientes",$User);
        header('Location:clientes.php');
    }
?>