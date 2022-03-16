<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location:../../index.php");
}
error_reporting(E_ALL & ~E_NOTICE);
error_reporting(0);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
include_once('../../Modelo/Conexion.php');
$yearActual=date("Y");
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
<script  type="text/javascript">
  $(document).ready(function() {
                                
    $("#Imprimir").click(function() {
                                var mes =$("#mes").val();                            
                                 var anio = $("#anio").val();
                                 if( mes!=0 && anio!=0){
                                 document.getElementById('tabla-contenido').innerHTML="<iframe src='../../controlador/ctrlresumenpago/ctrl_generarPDFest.php?mes="+mes+"&&anio="+anio+"' style='margin:0 5%;width:90%;height:100%;border:0;'></iframe>";
                                }else{
                                    alert("Complete los campos Para generar el PDF");
                                }    
                            });                                                     
});
</script>

<style>

 table{
        table-layout: auto;
        width:100%;
        max-width: 100%;
        
            }
               td:nth-child(1) {
    background-color:whitesmoke;
    font-weight: bold;
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
    .logo{
    height: 65px;
    margin-top: 20px;
    margin-right: auto;
    margin-left: 0px;
}

</style>
   
</head>
<body>
  <div class="container">
    <img style="height: 100px;margin: 0px 0px 0px auto;" src="../../assets/img/taxi.png"><br>
    <center>   
    <h1>Resumen estado de pago </h1>
    </center>
      <center>
     <!-- <form method="POST" action="../../controlador/ctrlresumenpago/ctrlresumenpago.php" enctype="multipart/form-data">   -->
      <div id="menu2">
        <table>
          <tr> 
            <td style="width: 11%;background-color: skyblue; color: white; font-weight: bold;">MES</td>
            <td style="background-color: white;"><select name="mes" id="mes"   style="width: 100%; border-color: black" class="btn btn-block">
              <option value="0">Seleccione un Mes</option> 
              <option value="1">Enero</option>
              <option value="2">Febrero</option>
              <option value="3">Marzo</option>
              <option value="4">Abril</option>
              <option value="5">Mayo</option>
              <option value="6">Junio</option>
              <option value="7">Julio</option>
              <option value="8">Agosto</option>
              <option value="9">Septiembre</option>
              <option value="10">Octubre</option>
              <option value="11">Noviembre</option>
              <option value="12">Diciembre</option>
            </select></td>
            <td style="width: 11%;background-color: skyblue; color: white; font-weight: bold;">AÑO</td>
            <td style="background-color: white;"><select name="anio" id="anio"  style="width: 100%; border-color: black" class="btn btn-block">
            <?php
              echo "<option value=".$yearActual." SELECTED>".$yearActual."</option>";
              $i=0;
              while($i<=0){
                $yearActual++;
                echo "<option value=".$yearActual.">".$yearActual."</option>";
                $i++;
              }
             ?>
              </select></td>    
          </tr>   
        </table>  
      </div>
      <table>
        <tr>
          <input type="button" name="Imprimir" id="Imprimir" class="form-submit"  value="Generar PDF"  style=" margin-top: 3; margin-bottom: 3; padding-top: 10px; padding-bottom: 10px; margin-right: 3px;"/>
          <input type="button" name="Volver" id="Volver" onclick="window.location.href='../menuprincipal/menuprincipal.php'" class="form-submit"  value="Volver"  style=" margin-top: 3; margin-bottom: 3; padding-top: 10px; padding-bottom: 10px;  "/>
          </td>               
        </tr>
      </table>
    </center>
<!--  </form>  -->
  <div name="tabla-contenido" id="tabla-contenido" style="height: auto;">  
  </div>         
</div>
     <!-- JS -->
     <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script> 
</body>
</html>