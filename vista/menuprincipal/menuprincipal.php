<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location:../../index.php");
}
$usuario=explode("@",$_SESSION['usuario']);
?>
<html lang="en">
<head>
<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Radio Taxi Seven</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- css -->
        <link rel="stylesheet" href="../../css/styleint.css"/>
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css"> 
        <!-- jquery -->
        <script src="jquery-3.6.0.min.js" type="text/javascript"></script>
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>  
        <script>
        $("#Imprimir").click(function() {
                                var mes =$("#mes").val();                            
                                 var anio = $("#anio").val();
                                 if( mes!=0 && anio!=0){
                                 document.getElementById('tabla-contenido').innerHTML="<iframe src='../../controlador/ctrlresumenpago/ctrl_generarPDFest.php?mes="+mes+"&&anio="+anio+"' style='margin:0 5%;width:90%;height:100%;border:0;'></iframe>";
                                }else{
                                    alert("Complete los campos Para generar el PDF");
                                }    
                            });
        </script>                        
 <style type="text/css">

  .containerdetalle{
    background: #ffffff;
    padding: 20px;
  }
  .contenidointranet{
    margin: 10px;
  }

  .row{
    bottom: 10px;
  }

  .card{
    background-color: #ff9900;
    border: #ff9900; 
    color: white;
  }
    </style>
<title>Radio Taxi Seven</title>
</head>
<body style="background:#ECF6E8">
<div class="container-fluid nav-principal" style="background-color: #F8F9FA">
  <nav id="nav-principal" class="navbar navbar-expand-md navbar-light bg-light" >
    <a class="navbar-brand" href="">INICIO</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>    
          <div class="collapse navbar-collapse" style="text-align: right;">
      <ul class="navbar-nav ml-auto">
          <li class="nav-item">
          <a class="nav-link" href="#">PERSONAL</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="#">VEHICULO</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="#">PAGOS</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="#">RESUMEN DE PAGOS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" id="contacto">Bienvenido <?php echo $usuario[0] ?></a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="../../controlador/ctrllogin/ctrllogin.php?funcion=logout" style="float:right"  id="contacto">CERRAR SESIÓN</a>
        </li>
          </ul>
    </div>
  </nav>
</div>  
  <div style="margin: 40px auto 0px auto" class="container containerdetalle">
    <div class="row"><!-- Inicio de row -->
      <div class="col-12 col-md-4 col-lg-4">
        <div  class="card contenidointranet">
          <div class="card-block">
            <div  class="card-body">
              <h5 class="card-title">Dueños</h5>
              <hr>
              <p class="card-text">Gestión para los dueños de los Vehiculos.</p>
              <a href="../personal/index.php" class="stretched-link"></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-4 col-lg-4">
        <div  class="card contenidointranet">
          <div class="card-block">
            <div  class="card-body">
              <h5 class="card-title">Vehiculo</h5>
              <hr>
              <p class="card-text">Gestión de los Vehiculos.</p>
              <a href="../vehiculo/index.php" class="stretched-link"></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-4 col-lg-4">
        <div  class="card contenidointranet">
          <div class="card-block">
            <div  class="card-body">
              <h5 class="card-title">Pagos</h5>
              <hr>
              <p class="card-text">Gestión de Pagos</p>
              <a href="../pago/index.php" class="stretched-link"></a>
            </div>
          </div>
        </div>
      </div> 
    </div><!-- fin de row -->
    <div class="row"><!-- Inicio de row -->
      <div class="col-12 col-md-4 col-lg-4">
        <div  class="card contenidointranet">
          <div class="card-block">
            <div  class="card-body">
              <h5 class="card-title">Resumen de Pagos</h5>
              <hr>
              <p class="card-text">Generación del Estado de Pago.</p>
              <a href="../resumenpago/index.php" class="stretched-link"></a>
            </div>
          </div>
        </div>
      </div>
    </div><!-- fin de row -->
                   
  <!-- script -->
  <script src="js/bootstrap.bundle.min.js"></script> 
</body>
</html>
      
    

