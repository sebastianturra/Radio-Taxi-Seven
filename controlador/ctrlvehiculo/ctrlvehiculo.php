<?php  
include_once("../../modelo/Vehiculo.php");

$veh = new Vehiculo();
$funcion=$_POST["funcion"];

if($funcion == "crear"){

  $id_persona=$_POST["id_persona"];
  $matricula=$_POST["matricula"];
  $modelo=$_POST["modelo"];
  $marca=$_POST["marca"];
  $color=$_POST["color"];
  $tipo=$_POST["tipo"];
  $anio=$_POST["anio"];
  $fecha=$_POST["fecha"];
  $radio=$_POST["radio"];
  $veh_vis='1';

  $resultado = $veh->creveh($id_persona,$matricula,$modelo,$marca,$color,$tipo,
  $anio,$fecha,$veh_vis,$radio);
  if($resultado == true){
    echo 'Creado Correctamente';
    echo "<meta http-equiv='Refresh' content='2;URL=../../vista/vehiculo/index.php'>";
  }else{
    echo 'Fallo al crear';
    echo "<meta http-equiv='Refresh' content='2;URL=../../vista/vehiculo/index.php'>";
  }
}else if($funcion == "modificar"){

  $veh_id = $_POST["id"];
  $PER_ID=$_POST["id_persona"];
  $veh_matricula=$_POST["matricula"];
  $veh_modelo=$_POST["modelo"];
  $veh_marca=$_POST["marca"];
  $veh_color=$_POST["color"];
  $veh_tipo=$_POST["tipo"];
  $veh_anio=$_POST["anio"];
  $veh_fecha=$_POST["fecha"];
  $radio=$_POST["radio"];

  $resultado = $veh->modveh($PER_ID,$veh_matricula,$veh_modelo,$veh_marca,$veh_color,$veh_tipo,
  $veh_anio,$veh_fecha,$radio,$veh_id);
  if($resultado == true){
    echo 'Modificado Correctamente';
    echo "<meta http-equiv='Refresh' content='2;URL=../../vista/vehiculo/index.php'>";
  }else{
    echo 'Fallo al Modificar';
    echo "<meta http-equiv='Refresh' content='2;URL=../../vista/vehiculo/index.php'>";
  }
}else if($funcion == "eliminar"){

  $id = $_POST["id"];

  $resultado = $veh->eliminarvehiculo($id);
  if($resultado == true){
    echo 'Eliminado Correctamente';
    echo "<meta http-equiv='Refresh' content='2;URL=../../vista/vehiculo/index.php'>";
  }else{
    echo 'Fallo al Eliminar';
    echo "<meta http-equiv='Refresh' content='2;URL=../../vista/vehiculo/index.php'>";
  }
}else{
  echo 'Función no encontrada';
  echo "<meta http-equiv='Refresh' content='2;URL=../../vista/vehiculo/index.php'>";
}





?>