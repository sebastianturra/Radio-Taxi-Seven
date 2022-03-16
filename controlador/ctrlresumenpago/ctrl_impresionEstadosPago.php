<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
if (!isset($_SESSION['usuario'])) {
    header("Location: ../../login/login.php");
}
include_once("../../modelo/Pagos.php");
$pago = new Pagos();
$anio = $_GET['anio'];
$mes = $_GET['mes'];
$inicio = $anio."-".$mes."-01";
$lastday = $pago->selectlastday($inicio);
$diafinal = $lastday[0]['ultimidia'];
$fin=$diafinal;
$fechafinal = explode("-", $fin);
$diafin=$fechafinal[1];

$totalcontado = $pago->sumatotal($inicio,$fin);
//echo $totalcontado[0]['pago'];
$pagototalcontado = $totalcontado[0]['pago']*5000;
//echo "<br>pago total contado".$pagototalcontado;
//echo "inicio".$inicio;
//echo "<br>";
//echo "dia fin".$diafin;

$vehiculos = $pago->selectvehiculos();
var_dump($vehiculos);
foreach($vehiculos AS $key=>$value){
  $veh_id=$vehiculos[$key]['id'];
  $pagoporvehiculo = $pago->totalporvehiculo($inicio,$fin,$veh_id);
  echo "<br>".$pagoporvehiculo[0]['contador']."<br>";   

$cp = 5000;
  switch($fechafinal[1]){
    case '01':
      $mes="Enero";
    break;
    case 02:
      $mes="Febrero";
    break;
    case 03:
      $mes="Marzo";
    break;
    case 04:
      $mes="Abril";
    break;
    case 05:
      $mes="Mayo";
    break;
    case 06:
      $mes="Junio";
    break;
    case 07:
      $mes="Julio";
    break;
    case 10:
      $mes="Octubre";
    break;
    case 11:
      $mes="Noviembre";
    break;
    case 12:
      $mes="Diciembre";
    break; 
    case 8:
      $mes="Agosto"; 
    case 9:
      $mes="Septiembre";
  }

  setlocale(LC_ALL,"es_ES");
$fecha=strftime("%Y-%m-%d");
}  
?>
<html>
    <head>
    <title>Radio Taxi Seven</title>
        <!-- Favicon-->
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
                width:100%;
                max-width: 100%;
                border-collapse: collapse;
                }
                
                table, td, th {
  border: 1px solid black;
  text-align: center;
                }
        </style>         
    </head>
    <body>
        <div class="container">
          <img style="height: 100px;margin: 0px 0px 0px auto;" src="../../assets/img/taxi.png"><br>
          <table>
            <tr>
                <th style="margin: 0 auto;width:100%;"> 
                Estado De Pago Mensual - Radio Taxi Seven
                </th>
            </tr>
          </table>
          <br>
          <table>
            <tr>
                <th style="margin: 0 auto;width: 25%;"> 
                Año y Mes:
                </th>
                <td style="width: 25%"> 
                <?php echo $fechafinal[0]."-".$mes ?>
                </td>
                <th style="width: 25%"> 
                Fecha:
                </th>
                <td style="width: 25%"> 
                <?php echo $fecha; ?>
                </td>
            </tr>
          </table>
          <br>
          <table>
            <tr>
                <th style='margin: 0 auto;width: 60%;'> 
                Vehiculo
                </th>
                <th style='margin: 0 auto;width: 40%';> 
                Pago
              </th>
            </tr>
            <?php   
            foreach($vehiculos AS $key=>$value){
                $veh_id=$vehiculos[$key]['id'];
                $pagoporvehiculo = $pago->totalporvehiculo($inicio,$fin,$veh_id);
               // echo "<br>".$pagoporvehiculo[0]['contador']."<br>";
               echo "<tr>";
               echo " <td style='margin: 0 auto;width: 60%;'>"; 
               echo " ".$vehiculos[$key]['matricula'].":";
               echo " </td>";
               echo " <td style='width: 40%'> ";
               echo " $".number_format(($pagoporvehiculo[0]['contador']*$cp),0,",",".")."";
               echo " </td>";
               echo "</tr>";
            } 
            ?>
          </table>
          <br>
          <table>
            <tr>
                <th style="margin: 0 auto;width: 60%;"> 
                Total Pagado:
                </th>
                <td style="width: 40%"> 
                <?php echo "$".number_format(($totalcontado[0]['pago']*$cp),0,",","."); ?>
                </td>
            </tr>
          </table>
          <br>
          <table>
            <tr>
                <td style="border:inset 0pt"><br>
                <br>
                <p style="text-align:center;  margin-left: 0; margin-right: 0">______________________________________________</p>
                <span style="text-align:center;">Firma del Responsable De Estado de Pago</span>
                <br>
                <?php 
                $usuario = $_SESSION["usuario"];
                $fechafinal = explode("@", $usuario);
                ?>
                <span style="text-align:center;">Operario: <?php echo $fechafinal[0]; ?>
                </span>          
                </td>
                <td style="border:inset 0pt"><br>
                <br>
                <p  style="text-align:  center;  margin-left: 0; margin-right: 0">______________________________________________</p>
                <span style="text-align:  center;">Firma del Interesado</span>
                <br>  
                <span style="text-align:  center;">Nombre: 
                </span>            
                </td>
            </tr>
          </table> 
        <br>
        </div>
 <!-- <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script> -->
    </body>
</html>