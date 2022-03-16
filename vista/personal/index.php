<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location:../../index.php");
}
if($_SESSION['tipo']=='3'){
   echo '<script language="javascript">alert("Personal no autorizado, consultar a la gerencia");</script>';
   header("Location: ../../vista/menuprincipal/menuprincipal.php");
}
include_once('../../Modelo/Conexion.php');
include_once('../../Modelo/Personal.php');

$personal = new Personal();
$getpersonal = $personal->listarpersonal();

//var_dump($getpersonal);

setlocale(LC_ALL,"es_ES");
$fecha=strftime("%Y-%m-%d");
?>
<html lang="en">
<head>
    <!-- Font Icon -->
    <!--<link rel="stylesheet" href="../../../fonts/material-icon/css/material-design-iconic-font.min.css"> -->
   <!-- <link rel="shortcut icon" type="image/x-icon" href="../../../img/logopestanaico.ico" />  -->   
   <title>Radio Taxi Seven</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- css -->
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css"> 
        <link rel="stylesheet" href="../../css/styleint.css"/>
        <!-- jquery -->
        <script src="../../jquery-3.6.0.min.js" type="text/javascript"></script>
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
<title>Listar - Radio Taxi Seven</title>
<script  type="text/javascript">
  $(document).ready(function() {
    $("#tipocot").val("0");
    $("#estado").val("0");
    $("#datobuscar").val("0");
          
    document.getElementById("text").disabled = true;
      $("#datobuscar").change(function(){
        if( $("#datobuscar").val() == 0) {
          $('#text').val('');
          $('#text').prop( "disabled", true );
        }else{ 
          $('#text').val('');      
          $('#text').prop( "disabled", false );
        }
      });
    });
</script>
<style>
 table{
        table-layout: auto;
        widtd:100%;
        max-widtd: 100%;
        
            }
               td:ntd-child(1) {
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
 td{
        text-align: center;
    }
</style>
</head>
<body>
  <div class="container">
    <img style="height: 100px;margin: 0px 0px 0px auto;" src="../../assets/img/taxi.png"><br>
    <center>
      <h1>Listado de Dueños</h1>
    </center>
    <form id="formcrecot" action ="">
      <div id="menu">
        <center><table style="width:auto; max-width: 100%;">
          <input type="hidden" id="fechaactual" name="fechaactual" value="<?php echo $fecha ?>">
          <input type="hidden" id="estado" name="estado" value="0">
        <tr>              
          <td style="widtd:auto;text-align:right;background-color: skyblue; color: white; font-weight: bold"> Dato a buscar:</td>
          <td style="background-color: white;widtd: auto"> <select name="datobuscar" id="datobuscar" style="widtd: 180px; border-color: black" class="btn btn-block busqueda">
            <option value="0">Seleccione Dato</option>
            <option value="a.COT_CODIGO">Rut</option>
            <option value="a.COT_RUT">Nombre</option>
            <option value="a.COT_EMPRESA">Telefono</option>
            <option value="a.COT_FECHA">Correo</option> 
            </select> 
          </td>       
          <td style="widtd:auto;  background-color: white">
            <input type="text" name="text" id="text" placeholder="Escriba el Dato a buscar" style="widtd: auto">
          </td>   
          <td style="background-color: white;padding:1 0 0 5;">
            <input type="button" name="volver" id="volver" class="form-submit" 
            onclick="window.location.href='../menuprincipal/menuprincipal.php'" value="Volver Menu" style=" margin-top: 3; margin-bottom: 3;widtd:98%; padding-top: 10px; padding-bottom: 10px;"/>
            <input type="button" name="volver" id="volver" class="form-submit"
             onclick="window.location.href='creper.php'" value="Agregar Dueño" style=" margin-top: 3; margin-bottom: 3;widtd:98%; padding-top: 10px; padding-bottom: 10px;"/>
           </td> 
        </tr>             
      </table>
    </center>
  </div> 
   <div name="tabla-contenido" id="tabla-contenido">
          <table id="tabladatos" style="width: 100%; max-width: 100%;">
          <tr>
            <td>N°</td>
            <td>Rut</td>
            <td>Nombre</td>
            <td>Telefono</td>
            <td>Correo</td>
            <td>Operaciones</td>
          </tr>
          <?php 
            foreach($getpersonal AS $key => $value){
              echo "<tr>";
              echo "<td>".($key+1)."</td>".
                  "<td>".$getpersonal[$key]['rut']."</td>".
                  "<td>".$getpersonal[$key]['nombre']."</td>".
                  "<td>".$getpersonal[$key]['telefono']."</td>".
                  "<td>".$getpersonal[$key]['correo']."</td>".
                  "<td>".
                  "<a href='getper.php?id=".$getpersonal[$key]['id']."'  ".
                  "class='btn' style='margin: 0 3 0 0'><img src='../../assets/img/view.png' widtd= 15px' ". 
                  "height= 15px'></a>".
                  "<a href='modper.php?id=".$getpersonal[$key]['id']."'  ".
                  "class='btn' style='margin: 0 3 0 0'><img src='../../assets/img/edit.png' ' widtd= 15px' ".
                  "height= 15px'></a>".
                  "<a href='impper.php?id=".$getpersonal[$key]['id']."'  ". 
                  "class='btn' style='margin: 0 3 0 0'><img src='../../assets/img/imp.png' widtd= 15px' ".
                  "height= 15px'></a>".
                  "<a href='elimper.php?id=".$getpersonal[$key]['id']."'  ". 
                  "class='btn' style='margin: 0 3 0 0'><img src='../../assets/img/delete.png' widtd= 15px' ".
                  "height= 15px'></a>". 
                  "</td>";
              echo "</tr>";
              $key++;
            }    
          ?>      
        </table>
    </div>       
</form>  
     <!-- JS -->
<script src="../../bootstrap/js/bootstrap.bundle.min.js"></script> 
</body>
</html>