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
        <script src="../../bootstrap/jquery/jquery-3.6.0.min.js" type="text/javascript"></script>
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
<title>Radio Taxi Seven</title>
</head>
<body style="background:#ECF6E8">
  <form action="../../controlador/ctrllogin/ctrllogin.php" method="GET" enctype='multipart/form-data'>
    <input type="hidden" value="login" name="funcion">
    <div class="container-fluid">
     <div class="row no-gutter">
      <div class="d-none d-md-flex col-md-4 col-lg-6"><img src="../../assets/taxilogin.jpg" style="width: 120%;height:auto;margin: 12px 0px 0px 0px;border-radius: 10px"></div>
       <div class="col-md-8 col-lg-6">
        <div class="login d-flex align-items-center py-5">
          <div class="container">
            <div class="row">
              <div class="col-md-9 col-lg-8 mx-auto" >
                  <center><img style="margin-bottom: 0px;" src="../../assets/img/taxi.png" width="100%" height="35%"></center>  
                  <h4 style="margin: 0 0 0 0" class="login-heading mb-4"><strong>Intranet</strong></h4> <div style="color: #0000ff;"><b>Ingrese sus datos por favor</b></div>
			        <hr>
                  <div class="form-label-group">
                    <label for="inputEmail">Correo Electronico</label>
                    <input type="email" id="inputEmail" name="usuario" class="form-control" placeholder="Ingrese su correo electronico"  >
                  </div>

                  <div class="form-label-group">
                    <label for="inputPassword">Contraseña</label>
                    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Ingrese su contraseña" >
                  </div>

                  <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Ingresar</button>
              </form>    
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 </form>  

        <div id="errores">  
        </div>
  <!-- script -->
  <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script> 
</body>
</html>