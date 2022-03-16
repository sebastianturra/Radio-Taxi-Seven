<?php  
include_once("../../modelo/Pagos.php");

$pago = new Pagos();
$anio = $_POST['anio'];
$mes = $_POST['mes'];
$inicio = $anio."-".$mes."-01";
$lastday = $pago->selectlastday($inicio);
$diafinal = $lastday[0]['ultimidia'];
$fin=$diafinal;
$diafin=substr($fin, -2);

$totalcontado = $pago->sumatotal($inicio,$fin);
echo $totalcontado[0]['pago'];
$pagototalcontado = $totalcontado[0]['pago']*5000;
echo "<br>pago total contado".$pagototalcontado;
//echo "inicio".$inicio;
//echo "<br>";
// "fin".$fin;
//echo "dia fin".$diafin;

$vehiculos = $pago->selectvehiculos();
//var_dump($vehiculos);
foreach($vehiculos AS $key=>$value){
  $veh_id=$vehiculos[$key]['id'];
  $pagoporvehiculo = $pago->totalporvehiculo($inicio,$fin,$veh_id);
  echo "<br>".$pagoporvehiculo[0]['contador']."<br>";
}

/*
$funcion=$_POST["funcion"];

if($funcion == "crear"){

  $id_persona=$_POST["id_persona"];

  $resultado = $veh->creveh($id_persona,$matricula,$modelo,$marca,$color,$tipo,
  $anio,$fecha,$veh_vis,$radio);
  if($resultado == true){
    echo 'Creado Correctamente';
    echo "<meta http-equiv='Refresh' content='2;URL=../../vista/vehiculo/index.php'>";
  }else{
    echo 'Fallo al crear';
    echo "<meta http-equiv='Refresh' content='2;URL=../../vista/vehiculo/index.php'>";
  }
} */

?>