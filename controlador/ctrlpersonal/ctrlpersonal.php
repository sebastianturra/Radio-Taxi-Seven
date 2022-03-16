<?php  
include_once("../../modelo/Personal.php");

$per = new Personal();
$funcion=$_POST["funcion"];

if($funcion == "crear"){

  $PER_RUT=$_POST["rut"];
  $PER_NOMBRE=$_POST["nombre"];
  $PER_DIRECCION=$_POST["dir"];
  $PER_DIRECCION2=$_POST["diropc"];
  $PER_CORREO=$_POST["correo"];
  $PER_CIUDAD=$_POST["ciudad"];
  $PER_FONO=$_POST["fono"];
  $PER_TELEFONO=$_POST["telefono"];
  $PER_SEXO=$_POST["sexo"];
  $PER_CARGO=$_POST["cargo"];
  $PER_FECHANAC=$_POST["fechanac"];
  $PER_FECHA=$_POST["fecha"];
  $PER_VIS='1';

  $resultado = $per->creper($PER_RUT,$PER_NOMBRE,$PER_DIRECCION,$PER_DIRECCION2,$PER_CORREO,$PER_CIUDAD,
  $PER_FONO,$PER_TELEFONO,$PER_SEXO,$PER_CARGO,$PER_FECHANAC,$PER_FECHA);
  if($resultado == true){
    echo 'Creado Correctamente';
    echo "<meta http-equiv='Refresh' content='2;URL=../../vista/personal/index.php'>";
  }else{
    echo 'Fallo al crear';
    echo "<meta http-equiv='Refresh' content='2;URL=../../vista/personal/index.php'>";
  }
}else if($funcion == "modificar"){

  $PER_ID=$_POST["id"];
  $PER_RUT=$_POST["rut"];
  $PER_NOMBRE=$_POST["nombre"];
  $PER_DIRECCION=$_POST["dir"];
  $PER_DIRECCION2=$_POST["diropc"];
  $PER_CORREO=$_POST["correo"];
  $PER_CIUDAD=$_POST["ciudad"];
  $PER_FONO=$_POST["fono"];
  $PER_TELEFONO=$_POST["telefono"];
  $PER_SEXO=$_POST["sexo"];
  $PER_CARGO=$_POST["cargo"];
  $PER_FECHANAC=$_POST["fechanac"];

  $resultado = $per->modper($PER_RUT,$PER_NOMBRE,$PER_DIRECCION,$PER_DIRECCION2,$PER_CORREO,$PER_CIUDAD,
  $PER_FONO,$PER_TELEFONO,$PER_SEXO,$PER_CARGO,$PER_FECHANAC,$PER_ID);
  if($resultado == true){
    echo 'Modificado Correctamente';
    echo "<meta http-equiv='Refresh' content='2;URL=../../vista/personal/index.php'>";
  }else{
    echo 'Fallo al Modificar';
    echo "<meta http-equiv='Refresh' content='2;URL=../../vista/personal/index.php'>";
  }
}else if($funcion == "eliminar"){

  $id = $_POST["id"];

  $resultado = $per->eliminarpersonal($id);
  if($resultado == true){
    echo 'Eliminado Correctamente';
   // echo "<meta http-equiv='Refresh' content='2;URL=../../vista/personal/index.php'>";
  }else{
    echo 'Fallo al Eliminar';
   // echo "<meta http-equiv='Refresh' content='2;URL=../../vista/personal/index.php'>";
  }
}else{
  echo 'Función no encontrada';
  echo "<meta http-equiv='Refresh' content='2;URL=../../menuprincipal/menuprincipal.php'>";
}

?>