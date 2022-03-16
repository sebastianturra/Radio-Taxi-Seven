<?php
include_once('../../Modelo/Vehiculo.php');
include_once('../../Modelo/Personal.php');

session_start();

setlocale(LC_ALL,"es_ES");
$fecha=strftime("%Y-%m-%d");

//Instasicion del las clases de los modelos

$per = new Personal();
$veh = new Vehiculo();

$id=$_GET["veh_id"];

//getdatavehiculo
$getdatavehiculo = $veh->getveh($id);
$dataper = $per->getlistadopersonal();

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
<meta http-equiv="refresh" content="1; url=index.php"> 
</head>
<body onload="window.print();">
<div class="container">
    <img style="height: 100px;margin: 0px 0px 0px auto;" src="../../assets/img/taxi.png"><br>
        <center>
          <h1>Ver Vehiculo - Radio Taxi Seven N° <?php echo $id?></h1>
        </center>
      <form method="post" action="../../controlador/ctrlvehiculo/ctrlvehiculo.php" enctype="multipart/form-data">
      <input type="hidden" name="funcion" value="crear">
      <input type="hidden" name="id" value="<?php echo $id ?>">
      <div id="uno">
        <table style="width:100%">
            <tr>
              <td style="text-align: right;">Usuario:</td>
              <td style="background-color: white;"><select name="id_persona" id="id_persona" disabled>
                <?php
                    echo "<option value='".$getdatavehiculo[0]["id_persona"]."' SELECTED>".$getdatavehiculo[0]["nombre"]."</option>";
                    foreach($dataper as $key=>$data){
                        echo "<option value='".$dataper[$key]["perid"]."'>".$dataper[$key]["nombre"]."</option>";
                    }
                ?>
              </select>
              <input type="hidden" name="empnombre" id="empnombre">
              <input type="hidden" name="empcodigo" id="empcodigo"></td>
              <td style="text-align: right;">Fecha:</td>  
              <td style="background-color: white;"><input type="date" id="fecha" name="fecha" value="<?php echo $getdatavehiculo[0]['fecha']?>" disabled></td>
            </tr>
            <tr>  
              <td style="text-align: right;">Matricula:</td>
              <td style="background-color: white;"><input style="padding: 0;" type="text" id="matricula" name="matricula" placeholder="Ingrese Rut De la Empresa" value="<?php echo $getdatavehiculo[0]['matricula'] ?>" disabled></td>  
              <td style="text-align: right;">Modelo:</td>
              <td style="background-color: white;">
              <input style="padding: 0;"type="text" id="modelo" name="modelo" placeholder="Ingrese Responsable De la Empresa" value="<?php echo $getdatavehiculo[0]['modelo'] ?>" disabled></td>
            </tr>
            <tr>  
              <td style="text-align: right;">Marca:</td>  
              <td style="background-color: white;padding:0;"><input type="text" id="marca" name="marca" value="<?php echo $getdatavehiculo[0]['marca']?>" disabled></td>
              <td style="text-align: right;">Color:</td>
              <td style="background-color: white; margin:0;"><input style="padding: 0;" type="text" id="color" name="color" value="<?php echo $getdatavehiculo[0]['color']?>" disabled></td>
            </tr>
            <tr>  
              <td style="text-align: right;">Tipo:</td>
              <td style="background-color: white;"><input style="padding: 0" type="text" id="tipo" name="tipo" value="<?php echo $getdatavehiculo[0]['tipo']?>" disabled></td>
              <input style="padding: 0;" type="hidden" id="cemp" name="OCOM_TGIRO" value="-">
              <td style="width: auto;">Año:</td>
              <td style="width: auto;background-color: white"> 
              <input style="padding: 0;" type="text" id="anio" name="anio" placeholder="Ingrese Rut De la Empresa" value="<?php echo $getdatavehiculo[0]['anio']?>" disabled>    
              </td>  
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