<?php
include_once('../../Modelo/Vehiculo.php');
include_once('../../Modelo/Personal.php');

session_start();

setlocale(LC_ALL,"es_ES");
$fecha=strftime("%Y-%m-%d");

//Instasicion del las clases de los modelos

$per = new Personal();
$veh = new Vehiculo();

$dataper = $per->getlistadopersonal();
$dataveh = $veh->getlastveh();
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
          <h1>Creación Vehiculo - Radio Taxi Seven N°<?php echo $dataveh ?></h1>
        </center>
      <form method="post" action="../../controlador/ctrlvehiculo/ctrlvehiculo.php" enctype="multipart/form-data">
      <input type="hidden" name="funcion" value="crear">
      <input type="hidden" name="OCOM_NUMERO" value="<?php echo 2 ?>">
      <div id="uno">
        <table style="width:100%">
            <tr>
              <td style="text-align: right;">Usuario:</td>
              <td style="background-color: white;">
              <select style="width:100%;" name="id_persona" id="id_persona">
                <?php
                    foreach($dataper as $key=>$data){
                        echo "<option value='".$dataper[$key]["perid"]."'>".$dataper[$key]["nombre"]."</option>";
                    }
                ?>
              </select>
              <input type="hidden" id="fecha" name="fecha" value="<?php echo $fecha?>">
              <td style="text-align: right;">Matricula:</td>
              <td style="background-color: white;">
              <input style="width:100%;padding: 0;" type="text" id="matricula" name="matricula" placeholder="Ingrese matricula"></td>  
            </tr>
            <tr>   
              <td style="text-align: right;">Modelo:</td>
              <td style="background-color: white;">
              <input style="width:100%;padding: 0;"type="text" id="modelo" name="modelo" placeholder="Ingrese el modelo"></td>
              <td style="text-align: right;">Marca:</td>  
              <td style="background-color: white;">
              <input style="width:100%;" type="text" id="marca" name="marca" value="" placeholder="Ingrese la marca"></td>
            </tr>
            <tr>  
              <td style="text-align: right;">Color:</td>
              <td style="background-color: white; margin:0;">
              <input style="width:100%;padding: 0;" type="text" id="color" name="color" placeholder="Ingrese el color"></td>
              <td style="text-align: right;">Tipo:</td>
              <td style="background-color: white;">
              <input style="width:100%;padding: 0" type="text" id="tipo" name="tipo" placeholder="Ingrese el tipo de vehiculo" ></td>
            </tr>
            <tr>  
              <td style="text-align:right;"> Año:</td>
              <td style="width: auto;background-color: white"> 
              <input style="width:100%;padding: 0;" type="text" id="anio" name="anio" placeholder="Ingrese al año" >    
              </td> 
              <td style="text-align: right;">Radio Frecuencia:</td>  
              <td style="background-color: white;"> 
              <input style="width:100%;"type="text" id="radio" name="radio" value="" placeholder="Nombre radio frecuencia" ></td> 
            </tr>
            <tr>  
              
            </tr>
          </table>  
        </div>
      <div class="botones">
      <center>    
      <button id="acot" type="submit" class="form-submit">Crear Vehiculo</button>   
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