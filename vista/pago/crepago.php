<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location:../../index.php");
}
include_once('../../Modelo/Pagos.php');
include_once('../../Modelo/Vehiculo.php');

setlocale(LC_ALL,"es_ES");
$fecha=strftime("%Y-%m-%d");

//Instasicion del las clases de los modelos

$pago = new Pagos();
$veh = new Vehiculo();

$datapago = $pago->getlastpago();
$dataveh = $veh->listarvehiculo();
$id = $_SESSION['id'];
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
        <script src="../../bootstrap/Jquery/jquery-3.6.0.min.js" type="text/javascript"></script>
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
<style>
  table{
            table-layout: auto;
        width:50%;
        max-width: 100%;
        
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
  <h1>Creación Pago - Radio Taxi Seven N°<?php echo $datapago ?></h1>
  </center>
  <form method="post" action="../../controlador/ctrlpago/ctrlpago.php" enctype="multipart/form-data">
  <input type="hidden" name="funcion" value="crear">
  <div>
      <table style="margin: 0 auto;width:auto;margin-bottom: 20px;">
        <tr>
          <td style="text-align: right;">Vehiculo:</td>
          <td style="background-color: white;">
            <select style="width: 100%" name="id_veh" id="id_veh">
              <?php
                foreach($dataveh as $key=>$data){
                  echo "<option value='".$dataveh[$key]["id"]."'>".$dataveh[$key]["matricula"]."</option>";
                }
              ?>  
            </select> 
          </td>
          <td style="text-align: right;">Fecha:</td>
          <td>
            <input type="date" id="fecha" name="fecha" value="<?php echo $fecha?>" disabled>
            <input type="hidden" id="usu_id" name="usu_id" value="<?php echo $id?>">   </td> 
        </tr>
      </table>  
    </div>
    <div class="botones">
      <center>    
        <button id="acot" type="submit" class="form-submit">Crear Pago</button>   
        <button type="button" class="form-submit" onclick="window.location.href='index.php'">Volver al listado</button>
        <button type="button" class="form-submit" onclick="window.location.href='../menuprincipal/menuprincipal.php'">Volver al Menu</button>
      </center>
    </div>
  </form>   
</div>
<script src="../../bootstrap/js/bootstrap.bundle.min.js"></script> 
</body>
</html>