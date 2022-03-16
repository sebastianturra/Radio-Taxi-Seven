<?php
include_once('../../Modelo/Personal.php');
session_start();

setlocale(LC_ALL,"es_ES");
$fecha=strftime("%Y-%m-%d");

//Instasicion del las clases de los modelos
$per = new Personal();
$per_id = $_GET['id'];
$getper = $per->getper($per_id);
?>

<html lang="en">
<head>
<title>Radio Taxi Seven</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- css -->
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css"> 
        <link rel="stylesheet" href="../../css/styleint.css"/>
        <!-- jquery -->
        <script src="jquery-3.6.0.min.js" type="text/javascript"></script>
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
<style>
   #uno{
        border:1px solid black;  
  width:100%;
  display:inline-block;
  margin:auto;
  height:auto;
  background-color:ghostwhite;
        margin-bottom: 5px;
    }
 td { 
                padding: 5px 10px;
                text-align: center;
                border: 1px solid #999;
                font-size: 15px;
                font-weight: bold;
                    background-color:white;
            }
  
    th{
        text-align: center;
    }

.botones{
  margin-bottom: 20px;
}
</style>
</head>
<body>
<div class="container">
        <img style="height: 100px;margin: 0px 0px 0px auto;" src="../../assets/img/taxi.png"><br>
        <center>
          <h1>Creación Dueño - Radio Taxi Seven N°<?php echo $getper[0]['id'] ?></h1>
        </center>
      <form method="post" action="../../controlador/ctrlpersonal/ctrlpersonal.php" enctype="multipart/form-data">
      <input type="hidden" name="funcion" value="crear">
      <div id="uno">
        <table style="width:100%">
            <tr>
              <td style="text-align: right;">Rut:</td>
              <td style="background-color: white;">
              <input style="width:100%" name="rut" id="rut" value="<?php echo $getper[0]['rut'] ?>" placeholder="Sin puntos y sin guión" required>
              <td style="text-align: right;">Nombre:</td>  
              <td style="background-color: white;">
              <input style="width:100%" type="text" id="nombre" name="nombre" value="<?php echo $getper[0]['nombre'] ?>" placeholder="Primer nombre y apellidos"required></td>
            </tr>
            <tr>  
              <td style="text-align: right;">Dirección:</td>
              <td style="background-color: white;">
              <input style="width:100%;padding: 0;" type="text" id="dir" name="dir" value="<?php echo $getper[0]['direccion'] ?>" placeholder="Ingrese la dirección"></td>  
              <td style="text-align: right;">Dirección Opcional:</td>
              <td style="background-color: white;">
              <input style="width:100%;padding: 0;"type="text" id="diropc" name="diropc" value="<?php echo $getper[0]['direccion2'] ?>" placeholder="Ingrese la dirección"></td>
            </tr>
            <tr>  
              <td style="text-align: right;">Correo:</td>  
              <td style="background-color: white;">
              <input style="width:100%;padding: 0;" type="text" id="correo" name="correo" value="<?php echo $getper[0]['correo'] ?>" placeholder="Ingrese el correo"></td>
              <td style="text-align: right;">Ciudad:</td>
              <td style=";background-color: white; margin:0;">
              <input style="width:100%;padding: 0;" type="text" id="ciudad" name="ciudad" value="<?php echo $getper[0]['ciudad'] ?>" placeholder="Indique ciudad natal"></td>
            </tr>
            <tr>  
              <td style="text-align: right;">Fono:</td>
              <td style="background-color: white;">
              <input style="width:100%;padding: 0" type="text" id="fono" name="fono" value="<?php echo $getper[0]['fono'] ?>" placeholder="Ingrese el telefono"></td>
              <td style="text-align: right;">Telefono:</td>
              <td style="width: auto;background-color: white"> 
              <input style="width:100%;padding: 0" type="text" id="telefono" name="telefono" value="<?php echo $getper[0]['telefono'] ?>" placeholder="Ingrese el telefono" >    
              </td>  
            </tr>
            <tr>  
              <td style="text-align: right;">Sexo:</td>  
              <td style="background-color: white;">
              <input style="width:100%;padding: 0" type="text" id="sexo" name="sexo" value="<?php echo $getper[0]['sexo'] ?>" placeholder="Indique sexo"></td>
              <td style="text-align: right;">Cargo:</td>
              <td style="background-color: white; margin:0;">
              <input style="width:100%;padding: 0" style="padding: 0;" type="text" id="cargo" name="cargo" value="<?php echo $getper[0]['cargo'] ?>" placeholder="Indicar Cargo"></td>
            </tr>
            <tr>  
              <td style="text-align: right;">Fecha de Nacimiento:</td>
              <td style="background-color: white;">
              <input style="width:100%;padding: 0" type="date" id="fechanac" name="fechanac" value="<?php echo $getper[0]['fechanac'] ?>" placeholder="Indique fecha de nacimiento"required></td>
              <input style="padding: 0;" type="hidden" id="fecha" name="fecha" value="<?php echo $fecha?>">
 
            </tr>
          </table>  
        </div>
      <div class="botones">
      <center>      
      <button type="button" class="form-submit" onclick="window.location.href='index.php'">Volver al listado</button>
        <button type="button" class="form-submit" onclick="window.location.href='../menuprincipal/menuprincipal.php'">Volver al Menu</button>
      </center>
    </div>
    <div id="errores">  
    </div> 
  </form>   
</div>
     <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../js/main.js"></script>
</body>
</html>